<?php
/**
 * Spotify new releases - proof of concept (The Friday-Script)
 *
 * Crawls the releases of the artists the user follows and looks for new releases for a given date range.
 *
 * @link https://twitter.com/codemasher/status/974755990053834752
 *
 * @created      16.03.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Providers\Spotify;

use chillerlan\HTTP\Utils\MessageUtil;
use Exception;
use function array_chunk;
use function array_column;
use function array_map;
use function array_shift;
use function array_values;
use function count;
use function date;
use function explode;
use function implode;
use function krsort;
use function mktime;
use function sprintf;
use function strtolower;
use function strtotime;
use function time;
use function usleep;

/**
 * @var \chillerlan\OAuth\Providers\Spotify $spotify
 * @var \Psr\Log\LoggerInterface $logger
 */

require_once __DIR__.'/spotify-common.php';

$me            = MessageUtil::decodeJSON($spotify->request('/v1/me'));
$market        = $me->country; // market???
$now           = time();
$since         = ($now - 7 * 86400); // last week
$until         = ($now - 0 * 86400); // adjust to your likes

#$prev_yr       = 2010;
#$since         = mktime(0, 0, 0, 1, 1, $prev_yr);
#$until         = mktime(23, 59, 59, 12, 31, $prev_yr);

$datestr       = date('d.m.Y', $since).' - '.date('d.m.Y', $until);
$sleeptimer    = 250000; // sleep between requests (µs)
$minTracks     = 1; // minimum number of tracks per album (1 = single releases)
$skipAppearsOn = true;

$artists       = [];
$newalbums     = [];
$newtracks     = [];
$releaseinfo   = [];
$after         = null;

// fetch the artists you're following
while($after !== ''){

	$meFollowing = $spotify->request('/v1/me/following', [
		'type'  => 'artist',
		'limit' => 50, // API max = 50 artists
		'after' => $after,
	]);

	$data = MessageUtil::decodeJSON($meFollowing);

	if($meFollowing->getStatusCode() === 200){

		foreach($data->artists->items as $artist){
			$logger->info('+ '.$artist->name);
			$artists[] = $artist->id;
		}

		$after = ($data->artists->cursors->after ?? '');
	}
	elseif(isset($data->error)){
		$logger->error($data->error->message.' ('.$data->error->status.')');
	}

	usleep($sleeptimer);
}

$logger->info(count($artists).' artists');

// now crawl the artists' new releases
foreach($artists as $id){
	// WTB bulk endpoint /artists/albums?ids=artist_id1,artist_id2,...
	$artistAlbums = $spotify->request(sprintf('/v1/artists/%s/albums', $id), ['market' => $market]);
	$data         = MessageUtil::decodeJSON($artistAlbums);

	foreach(($data->items ?? []) as $album){
		$rdate = strtotime($album->release_date);

		if($album->release_date_precision === 'day' && $rdate >= $since && $rdate <= $until){

			// skip the "Various Artists" samplers
			if(isset($album->artists) && !empty($album->artists) && strtolower($album->artists[0]->name) === 'various artists'){
				continue;
			}

			if($skipAppearsOn && $album->album_group === 'appears_on'){
				continue;
			}

			if($album->total_tracks < $minTracks){
				continue;
			}

			$newalbums[$album->id] = $album->id;

			$releaseinfo[date('Y-m-d', $rdate)][$album->id] = $album;

			$logger->info('* '.$album->name);
		}
	}

	usleep($sleeptimer);
}

// fetch the album tracks (why aren't the tracks in the artistsIdAlbums response???)
foreach(array_chunk(array_values($newalbums), 20, true) as $chunk){ // API max = 20 albums
	$albums = $spotify->request('/v1/albums', ['ids' => implode(',', $chunk), 'market' => $market]);
	$data   = MessageUtil::decodeJSON($albums);

	foreach(($data?->albums ?? []) as $album){
		$tracks = array_column($album->tracks->items, 'id');
		$id     = array_shift($tracks);

		$newtracks[$id] = $id;
	}

	usleep($sleeptimer);
}

// create a new playlist
$createPlaylist = $spotify->request(
	sprintf('/v1/users/%s/playlists', $me->id),
	null,
	'POST',
	[
		'name'          => 'new releases '.$datestr,
		'public'        => false,
		'collaborative' => false,
		'description'   => 'new releases by the artists i\'m following, '.$datestr,
	],
	['Content-Type' => 'application/json'],
);

if($createPlaylist->getStatusCode() !== 201){
	throw new Exception('could not create a new playlist');
}

$playlist = MessageUtil::decodeJSON($createPlaylist);

$logger->info(
	sprintf(
		'created playlist: new releases %s (%s tracks, spotify:user:%s:playlist:%s)',
		$datestr,
		count($newtracks),
		$me->id,
		$playlist->id
	)
);

// add the tracks to the playlist
$uris = array_chunk(
	array_map(fn(string $t):string => 'spotify:track:'.$t , array_values($newtracks)), // why not just ids???
	100 // API max = 100 track URIs
);

foreach($uris as $i => $chunk){
	$playlistAddTracks = $spotify->request(
		sprintf('/v1/playlists/%s/tracks', $playlist->id),
		null,
		'POST',
		['uris' => $chunk],
		['Content-Type' => 'application/json'],
	);

	($playlistAddTracks->getStatusCode() === 201)
		? $logger->info('added tracks '.(++$i).'/'.count($uris).' ['.MessageUtil::decodeJSON($playlistAddTracks)->snapshot_id.']')
		: $logger->error($playlistAddTracks->getStatusCode()); // idc
}

// sort the $releaseinfo array by release date (descending)
krsort($releaseinfo);

foreach($releaseinfo as $date => $releases){
	[$year, $month, $day] = explode('-', $date);

	$logger->info('');
	$logger->info('--- '.date('l, jS F Y\:', mktime(0, 0, 0, (int)$month, (int)$day, (int)$year)).' ---');
	$logger->info('');

	$id = 0;

	foreach($releases as $release){
		$logger->info('['.(++$id).'] '.implode(', ', array_column($release->artists, 'name')).' - '.$release->name);
	}

}

exit;
