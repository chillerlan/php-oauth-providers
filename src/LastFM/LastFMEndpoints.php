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
	protected $albumAddTags = [
		'path'   => 'album.addTags',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'album', 'artist', 'tags'],
	];

	/**
	 * @link https://www.last.fm/api/show/album.getInfo
	 */
	protected $albumGetInfo = [
		'path'   => 'album.getInfo',
		'method' => 'GET',
		'query'  => ['mbid', 'album', 'artist', 'username', 'lang', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/album.getTags
	 */
	protected $albumGetTags = [
		'path'   => 'album.getTags',
		'method' => 'GET',
		'query'  => ['mbid', 'album', 'artist', 'user', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/album.getTopTags
	 */
	protected $albumGetTopTags = [
		'path'   => 'album.getTopTags',
		'method' => 'GET',
		'query'  => ['mbid', 'album', 'artist', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/album.removeTag
	 */
	protected $albumRemoveTag = [
		'path'   => 'album.removeTag',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'album', 'artist', 'tag'],
	];

	/**
	 * @link https://www.last.fm/api/show/album.search
	 */
	protected $albumSearch = [
		'path'   => 'album.search',
		'method' => 'GET',
		'query'  => ['album', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.addTags
	 */
	protected $artistAddTags = [
		'path'   => 'artist.addTags',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'tags'],
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getCorrection
	 */
	protected $artistGetCorrection = [
		'path'   => 'artist.getCorrection',
		'method' => 'GET',
		'query'  => ['artist'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getInfo
	 */
	protected $artistGetInfo = [
		'path'   => 'artist.getInfo',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'username', 'lang', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getSimilar
	 */
	protected $artistGetSimilar = [
		'path'   => 'artist.getSimilar',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'limit', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getTags
	 */
	protected $artistGetTags = [
		'path'   => 'artist.getTags',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'user', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getTopAlbums
	 */
	protected $artistGetTopAlbums = [
		'path'   => 'artist.getTopAlbums',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'autocorrect', 'page', 'limit'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getTopTags
	 */
	protected $artistGetTopTags = [
		'path'   => 'artist.getTopTags',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.getTopTracks
	 */
	protected $artistGetTopTracks = [
		'path'   => 'artist.getTopTracks',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'autocorrect', 'page', 'limit'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/artist.removeTag
	 */
	protected $artistRemoveTag = [
		'path'   => 'artist.removeTag',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'tag'],
	];

	/**
	 * @link https://www.last.fm/api/show/artist.search
	 */
	protected $artistSearch = [
		'path'   => 'artist.search',
		'method' => 'GET',
		'query'  => ['artist', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/chart.getTopArtists
	 */
	protected $chartGetTopArtists = [
		'path'   => 'chart.getTopArtists',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/chart.getTopTags
	 */
	protected $chartGetTopTags = [
		'path'   => 'chart.getTopTags',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/chart.getTopTracks
	 */
	protected $chartGetTopTracks = [
		'path'   => 'chart.getTopTracks',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/geo.getTopArtists
	 */
	protected $geoGetTopArtists = [
		'path'   => 'geo.getTopArtists',
		'method' => 'GET',
		'query'  => ['country', 'location', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/geo.getTopTracks
	 */
	protected $geoGetTopTracks = [
		'path'   => 'geo.getTopTracks',
		'method' => 'GET',
		'query'  => ['country', 'location', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/library.getArtists
	 */
	protected $libraryGetArtists = [
		'path'   => 'library.getArtists',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getInfo
	 */
	protected $tagGetInfo = [
		'path'   => 'tag.getInfo',
		'method' => 'GET',
		'query'  => ['tag', 'lang'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getSimilar
	 */
	protected $tagGetSimilar = [
		'path'   => 'tag.getSimilar',
		'method' => 'GET',
		'query'  => ['tag'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getTopAlbums
	 */
	protected $tagGetTopAlbums = [
		'path'   => 'tag.getTopAlbums',
		'method' => 'GET',
		'query'  => ['tag', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getTopArtists
	 */
	protected $tagGetTopArtists = [
		'path'   => 'tag.getTopArtists',
		'method' => 'GET',
		'query'  => ['tag', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getTopTags
	 */
	protected $tagGetTopTags = [
		'path'   => 'tag.getTopTags',
		'method' => 'GET',
		'query'  => [],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getTopTracks
	 */
	protected $tagGetTopTracks = [
		'path'   => 'tag.getTopTracks',
		'method' => 'GET',
		'query'  => ['tag', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/tag.getWeeklyChartList
	 */
	protected $tagGetWeeklyChartList = [
		'path'   => 'tag.getWeeklyChartList',
		'method' => 'GET',
		'query'  => ['tag'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.addTags
	 */
	protected $trackAddTags = [
		'path'   => 'track.addTags',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track', 'tags'],
	];

	/**
	 * @link https://www.last.fm/api/show/track.getCorrection
	 */
	protected $trackGetCorrection = [
		'path'   => 'track.getCorrection',
		'method' => 'GET',
		'query'  => ['artist', 'track'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.getInfo
	 */
	protected $trackGetInfo = [
		'path'   => 'track.getInfo',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'track', 'username', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.getSimilar
	 */
	protected $trackGetSimilar = [
		'path'   => 'track.getSimilar',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'track', 'autocorrect', 'limit'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.getTags
	 */
	protected $trackGetTags = [
		'path'   => 'track.getTags',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'track', 'autocorrect', 'user'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.getTopTags
	 */
	protected $trackGetTopTags = [
		'path'   => 'track.getTopTags',
		'method' => 'GET',
		'query'  => ['mbid', 'artist', 'track', 'autocorrect'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.love
	 */
	protected $trackLove = [
		'path'   => 'track.love',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track'],
	];

	/**
	 * @link https://www.last.fm/api/show/track.removeTag
	 */
	protected $trackRemoveTag = [
		'path'   => 'track.removeTag',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track', 'tag'],
	];

	/**
	 * @link https://www.last.fm/api/show/track.search
	 */
	protected $trackSearch = [
		'path'   => 'track.search',
		'method' => 'GET',
		'query'  => ['artist', 'track', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/track.unlove
	 */
	protected $trackUnlove = [
		'path'   => 'track.unlove',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track'],
	];

	/**
	 * @link https://www.last.fm/api/show/track.updateNowPlaying
	 */
	protected $trackUpdateNowPlaying = [
		'path'   => 'track.updateNowPlaying',
		'method' => 'POST',
		'query'  => [],
		'body'   => ['mbid', 'artist', 'track', 'album', 'trackNumber', 'context', 'duration', 'albumArtist'],
	];

	/**
	 * @link https://www.last.fm/api/show/user.getArtistTracks
	 */
	protected $userGetArtistTracks = [
		'path'   => 'user.getArtistTracks',
		'method' => 'GET',
		'query'  => ['user', 'artist', 'limit', 'page', 'startTimestamp', 'endTimestamp'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getFriends
	 */
	protected $userGetFriends = [
		'path'   => 'user.getFriends',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'recenttracks'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getInfo
	 */
	protected $userGetInfo = [
		'path'   => 'user.getInfo',
		'method' => 'GET',
		'query'  => ['user'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getLovedTracks
	 */
	protected $userGetLovedTracks = [
		'path'   => 'user.getLovedTracks',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getPersonalTags
	 */
	protected $userGetPersonalTags = [
		'path'   => 'user.getPersonalTags',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'tag', 'taggingtype'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getRecentTracks
	 */
	protected $userGetRecentTracks = [
		'path'   => 'user.getRecentTracks',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'from', 'to', 'extended'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getTopAlbums
	 */
	protected $userGetTopAlbums = [
		'path'   => 'user.getTopAlbums',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'period'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getTopArtists
	 */
	protected $userGetTopArtists = [
		'path'   => 'user.getTopArtists',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page', 'period'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getTopTags
	 */
	protected $userGetTopTags = [
		'path'   => 'user.getTopTags',
		'method' => 'GET',
		'query'  => ['user', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getWeeklyAlbumChart
	 */
	protected $userGetWeeklyAlbumChart = [
		'path'   => 'user.getWeeklyAlbumChart',
		'method' => 'GET',
		'query'  => ['user', 'from', 'to'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getWeeklyArtistChart
	 */
	protected $userGetWeeklyArtistChart = [
		'path'   => 'user.getWeeklyArtistChart',
		'method' => 'GET',
		'query'  => ['user', 'from', 'to'],
		'body'   => null,
	];

	/**
	 * @link https://www.last.fm/api/show/user.getWeeklyTrackChart
	 */
	protected $userGetWeeklyTrackChart = [
		'path'    => '',
		'method'  => 'GET',
		'query'   => ['user', 'from', 'to'],
		'body'    => null,
		'headers' => [],
	];

}
