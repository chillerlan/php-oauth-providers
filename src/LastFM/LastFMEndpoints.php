<?php
/**
 * Class LastFMEndpoints
 *
 * @filesource   LastFMEndpoints.php
 * @created      08.04.2018
 * @package      chillerlan\OAuth\Providers\LastFM
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\LastFM;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://www.last.fm/api
 *
 * @todo hellooo??? https://twitter.com/codemasher/status/982315427308146689
 */
class LastFMEndpoints extends EndpointMap{

	/**
	 * @link https://www.last.fm/api/show/album.addTags
	 */
	protected array $albumAddTags = [
		'path'   => 'album.addTags',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'album', 'artist', 'tags'],
	];

	/**
	 * @link https://www.last.fm/api/show/album.getInfo
	 */
	protected array $albumGetInfo = [
		'path'   => 'album.getInfo',
		'method' => 'GET',
		'query'  => ['mbid', 'album', 'artist', 'username', 'lang', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/album.getTags
	 */
	protected array $albumGetTags = [
		'path'   => 'album.getTags',
		'method' => 'GET',
		'query'  => ['mbid', 'album', 'artist', 'user', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/album.getTopTags
	 */
	protected array $albumGetTopTags = [
		'path'   => 'album.getTopTags',
		'method' => 'GET',
		'query'  => ['mbid', 'album', 'artist', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/album.removeTag
	 */
	protected array $albumRemoveTag = [
		'path'   => 'album.removeTag',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'album', 'artist', 'tag'],
	];

	/**
	 * @link https://www.last.fm/api/show/album.search
	 */
	protected array $albumSearch = [
		'path'   => 'album.search',
		'method' => 'GET',
		'query'  => ['album', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.addTags
	 */
	protected array $artistAddTags = [
		'path'   => 'artist.addTags',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'tags'],
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getCorrection
	 */
	protected array $artistGetCorrection = [
		'path'   => 'artist.getCorrection',
		'method' => 'GET',
		'query'  => ['artist'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getInfo
	 */
	protected array $artistGetInfo = [
		'path'   => 'artist.getInfo',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'username', 'lang', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getSimilar
	 */
	protected array $artistGetSimilar = [
		'path'   => 'artist.getSimilar',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'limit', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getTags
	 */
	protected array $artistGetTags = [
		'path'   => 'artist.getTags',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'user', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getTopAlbums
	 */
	protected array $artistGetTopAlbums = [
		'path'   => 'artist.getTopAlbums',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'autocorrect', 'page', 'limit'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getTopTags
	 */
	protected array $artistGetTopTags = [
		'path'   => 'artist.getTopTags',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getTopTracks
	 */
	protected array $artistGetTopTracks = [
		'path'   => 'artist.getTopTracks',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'autocorrect', 'page', 'limit'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.removeTag
	 */
	protected array $artistRemoveTag = [
		'path'   => 'artist.removeTag',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'tag'],
	];

	/**
	 * @link https://www.last.fm/api/show/artist.search
	 */
	protected array $artistSearch = [
		'path'   => 'artist.search',
		'method' => 'GET',
		'query'  => ['artist', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/chart.getTopArtists
	 */
	protected array $chartGetTopArtists = [
		'path'   => 'chart.getTopArtists',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/chart.getTopTags
	 */
	protected array $chartGetTopTags = [
		'path'   => 'chart.getTopTags',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/chart.getTopTracks
	 */
	protected array $chartGetTopTracks = [
		'path'   => 'chart.getTopTracks',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/geo.getTopArtists
	 */
	protected array $geoGetTopArtists = [
		'path'   => 'geo.getTopArtists',
		'method' => 'GET',
		'query'  => ['country', 'location', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/geo.getTopTracks
	 */
	protected array $geoGetTopTracks = [
		'path'   => 'geo.getTopTracks',
		'method' => 'GET',
		'query'  => ['country', 'location', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/library.getArtists
	 */
	protected array $libraryGetArtists = [
		'path'   => 'library.getArtists',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getInfo
	 */
	protected array $tagGetInfo = [
		'path'   => 'tag.getInfo',
		'method' => 'GET',
		'query'  => ['tag', 'lang'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getSimilar
	 */
	protected array $tagGetSimilar = [
		'path'   => 'tag.getSimilar',
		'method' => 'GET',
		'query'  => ['tag'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getTopAlbums
	 */
	protected array $tagGetTopAlbums = [
		'path'   => 'tag.getTopAlbums',
		'method' => 'GET',
		'query'  => ['tag', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getTopArtists
	 */
	protected array $tagGetTopArtists = [
		'path'   => 'tag.getTopArtists',
		'method' => 'GET',
		'query'  => ['tag', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getTopTags
	 */
	protected array $tagGetTopTags = [
		'path'   => 'tag.getTopTags',
		'method' => 'GET',
		'query'  => [],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getTopTracks
	 */
	protected array $tagGetTopTracks = [
		'path'   => 'tag.getTopTracks',
		'method' => 'GET',
		'query'  => ['tag', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getWeeklyChartList
	 */
	protected array $tagGetWeeklyChartList = [
		'path'   => 'tag.getWeeklyChartList',
		'method' => 'GET',
		'query'  => ['tag'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.addTags
	 */
	protected array $trackAddTags = [
		'path'   => 'track.addTags',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track', 'tags'],
	];

	/**
	 * @link https://www.last.fm/api/show/track.getCorrection
	 */
	protected array $trackGetCorrection = [
		'path'   => 'track.getCorrection',
		'method' => 'GET',
		'query'  => ['artist', 'track'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.getInfo
	 */
	protected array $trackGetInfo = [
		'path'   => 'track.getInfo',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'track', 'username', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.getSimilar
	 */
	protected array $trackGetSimilar = [
		'path'   => 'track.getSimilar',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'track', 'autocorrect', 'limit'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.getTags
	 */
	protected array $trackGetTags = [
		'path'   => 'track.getTags',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'track', 'autocorrect', 'user'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.getTopTags
	 */
	protected array $trackGetTopTags = [
		'path'   => 'track.getTopTags',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'track', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.love
	 */
	protected array $trackLove = [
		'path'   => 'track.love',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track'],
	];

	/**
	 * @link https://www.last.fm/api/show/track.removeTag
	 */
	protected array $trackRemoveTag = [
		'path'   => 'track.removeTag',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track', 'tag'],
	];

	/**
	 * @link https://www.last.fm/api/show/track.search
	 */
	protected array $trackSearch = [
		'path'   => 'track.search',
		'method' => 'GET',
		'query'  => ['artist', 'track', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.unlove
	 */
	protected array $trackUnlove = [
		'path'   => 'track.unlove',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track'],
	];

	/**
	 * @link https://www.last.fm/api/show/track.updateNowPlaying
	 */
	protected array $trackUpdateNowPlaying = [
		'path'   => 'track.updateNowPlaying',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track', 'album', 'trackNumber', 'context', 'duration', 'albumArtist'],
	];

	/**
	 * @link https://www.last.fm/api/show/user.getArtistTracks
	 */
	protected array $userGetArtistTracks = [
		'path'   => 'user.getArtistTracks',
		'method' => 'GET',
		'query'  => ['user', 'artist', 'limit', 'page', 'startTimestamp', 'endTimestamp'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getFriends
	 */
	protected array $userGetFriends = [
		'path'   => 'user.getFriends',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'recenttracks'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getInfo
	 */
	protected array $userGetInfo = [
		'path'   => 'user.getInfo',
		'method' => 'GET',
		'query'  => ['user'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getLovedTracks
	 */
	protected array $userGetLovedTracks = [
		'path'   => 'user.getLovedTracks',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getPersonalTags
	 */
	protected array $userGetPersonalTags = [
		'path'   => 'user.getPersonalTags',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'tag', 'taggingtype'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getRecentTracks
	 */
	protected array $userGetRecentTracks = [
		'path'   => 'user.getRecentTracks',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'from', 'to', 'extended'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getTopAlbums
	 */
	protected array $userGetTopAlbums = [
		'path'   => 'user.getTopAlbums',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'period'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getTopArtists
	 */
	protected array $userGetTopArtists = [
		'path'   => 'user.getTopArtists',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'period'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getTopTags
	 */
	protected array $userGetTopTags = [
		'path'   => 'user.getTopTags',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getWeeklyAlbumChart
	 */
	protected array $userGetWeeklyAlbumChart = [
		'path'   => 'user.getWeeklyAlbumChart',
		'method' => 'GET',
		'query'  => ['user', 'from', 'to'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getWeeklyArtistChart
	 */
	protected array $userGetWeeklyArtistChart = [
		'path'   => 'user.getWeeklyArtistChart',
		'method' => 'GET',
		'query'  => ['user', 'from', 'to'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getWeeklyTrackChart
	 */
	protected array $userGetWeeklyTrackChart = [
		'path'    => '',
		'method'  => 'GET',
		'query'   => ['user', 'from', 'to'],
		'body'    => null,
		'headers' => [],
	];

}
