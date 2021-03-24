<?php
/**
 * Class LastFMEndpoints (auto created)
 *
 * @link    https://www.last.fm/api
 * @created 24.03.2021
 * @license MIT
 */

namespace chillerlan\OAuth\Providers\LastFM;

use chillerlan\OAuth\MagicAPI\EndpointMap;

class LastFMEndpoints extends EndpointMap{

	/**
	 * Tag an album using a list of user supplied tags.
	 *
	 * @link https://www.last.fm/api/show/album.addTags
	 */
	protected array $albumAddTags = [
		'path'   => 'album.addTags',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['album', 'artist', 'tags'],
	];

	/**
	 * Get the metadata and tracklist for an album on Last.fm using the album name or a musicbrainz id.
	 *
	 * @link https://www.last.fm/api/show/album.getInfo
	 */
	protected array $albumGetInfo = [
		'path'   => 'album.getInfo',
		'method' => 'GET',
		'query'  => ['album', 'artist', 'autocorrect', 'lang', 'mbid', 'username'],
		'body'   => null,
	];

	/**
	 * Get the tags applied by an individual user to an album on Last.fm. To retrieve the list of top tags applied to an album by all users use album.getTopTags.
	 *
	 * @link https://www.last.fm/api/show/album.getTags
	 */
	protected array $albumGetTags = [
		'path'   => 'album.getTags',
		'method' => 'GET',
		'query'  => ['album', 'artist', 'autocorrect', 'mbid', 'user'],
		'body'   => null,
	];

	/**
	 * Get the top tags for an album on Last.fm, ordered by popularity.
	 *
	 * @link https://www.last.fm/api/show/album.getTopTags
	 */
	protected array $albumGetTopTags = [
		'path'   => 'album.getTopTags',
		'method' => 'GET',
		'query'  => ['album', 'artist', 'autocorrect', 'mbid'],
		'body'   => null,
	];

	/**
	 * Remove a user's tag from an album.
	 *
	 * @link https://www.last.fm/api/show/album.removeTag
	 */
	protected array $albumRemoveTag = [
		'path'   => 'album.removeTag',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['album', 'artist', 'tag'],
	];

	/**
	 * Search for an album by name. Returns album matches sorted by relevance.
	 *
	 * @link https://www.last.fm/api/show/album.search
	 */
	protected array $albumSearch = [
		'path'   => 'album.search',
		'method' => 'GET',
		'query'  => ['album', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * Tag an artist with one or more user supplied tags.
	 *
	 * @link https://www.last.fm/api/show/artist.addTags
	 */
	protected array $artistAddTags = [
		'path'   => 'artist.addTags',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['artist', 'tags'],
	];

	/**
	 * Use the last.fm corrections data to check whether the supplied artist has a correction to a canonical artist
	 *
	 * @link https://www.last.fm/api/show/artist.getCorrection
	 */
	protected array $artistGetCorrection = [
		'path'   => 'artist.getCorrection',
		'method' => 'GET',
		'query'  => ['artist'],
		'body'   => null,
	];

	/**
	 * Get the metadata for an artist. Includes biography, truncated at 300 characters.
	 *
	 * @link https://www.last.fm/api/show/artist.getInfo
	 */
	protected array $artistGetInfo = [
		'path'   => 'artist.getInfo',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'lang', 'mbid', 'username'],
		'body'   => null,
	];

	/**
	 * Get all the artists similar to this artist
	 *
	 * @link https://www.last.fm/api/show/artist.getSimilar
	 */
	protected array $artistGetSimilar = [
		'path'   => 'artist.getSimilar',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'limit', 'mbid'],
		'body'   => null,
	];

	/**
	 * Get the tags applied by an individual user to an artist on Last.fm. If accessed as an authenticated service /and/ you don't supply a user parameter then this service will return tags for the authenticated user. To retrieve the list of top tags applied to an artist by all users use artist.getTopTags.
	 *
	 * @link https://www.last.fm/api/show/artist.getTags
	 */
	protected array $artistGetTags = [
		'path'   => 'artist.getTags',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'mbid', 'user'],
		'body'   => null,
	];

	/**
	 * Get the top albums for an artist on Last.fm, ordered by popularity.
	 *
	 * @link https://www.last.fm/api/show/artist.getTopAlbums
	 */
	protected array $artistGetTopAlbums = [
		'path'   => 'artist.getTopAlbums',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'limit', 'mbid', 'page'],
		'body'   => null,
	];

	/**
	 * Get the top tags for an artist on Last.fm, ordered by popularity.
	 *
	 * @link https://www.last.fm/api/show/artist.getTopTags
	 */
	protected array $artistGetTopTags = [
		'path'   => 'artist.getTopTags',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'mbid'],
		'body'   => null,
	];

	/**
	 * Get the top tracks by an artist on Last.fm, ordered by popularity
	 *
	 * @link https://www.last.fm/api/show/artist.getTopTracks
	 */
	protected array $artistGetTopTracks = [
		'path'   => 'artist.getTopTracks',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'limit', 'mbid', 'page'],
		'body'   => null,
	];

	/**
	 * Remove a user's tag from an artist.
	 *
	 * @link https://www.last.fm/api/show/artist.removeTag
	 */
	protected array $artistRemoveTag = [
		'path'   => 'artist.removeTag',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['artist', 'tag'],
	];

	/**
	 * Search for an artist by name. Returns artist matches sorted by relevance.
	 *
	 * @link https://www.last.fm/api/show/artist.search
	 */
	protected array $artistSearch = [
		'path'   => 'artist.search',
		'method' => 'GET',
		'query'  => ['artist', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * Get the top artists chart
	 *
	 * @link https://www.last.fm/api/show/chart.getTopArtists
	 */
	protected array $chartGetTopArtists = [
		'path'   => 'chart.getTopArtists',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * Get the top artists chart
	 *
	 * @link https://www.last.fm/api/show/chart.getTopTags
	 */
	protected array $chartGetTopTags = [
		'path'   => 'chart.getTopTags',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * Get the top tracks chart
	 *
	 * @link https://www.last.fm/api/show/chart.getTopTracks
	 */
	protected array $chartGetTopTracks = [
		'path'   => 'chart.getTopTracks',
		'method' => 'GET',
		'query'  => ['limit', 'page'],
		'body'   => null,
	];

	/**
	 * Get the most popular artists on Last.fm by country
	 *
	 * @link https://www.last.fm/api/show/geo.getTopArtists
	 */
	protected array $geoGetTopArtists = [
		'path'   => 'geo.getTopArtists',
		'method' => 'GET',
		'query'  => ['country', 'limit', 'page'],
		'body'   => null,
	];

	/**
	 * Get the most popular tracks on Last.fm last week by country
	 *
	 * @link https://www.last.fm/api/show/geo.getTopTracks
	 */
	protected array $geoGetTopTracks = [
		'path'   => 'geo.getTopTracks',
		'method' => 'GET',
		'query'  => ['country', 'limit', 'location', 'page'],
		'body'   => null,
	];

	/**
	 * A paginated list of all the artists in a user's library, with play counts and tag counts.
	 *
	 * @link https://www.last.fm/api/show/library.getArtists
	 */
	protected array $libraryGetArtists = [
		'path'   => 'library.getArtists',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'user'],
		'body'   => null,
	];

	/**
	 * Get the metadata for a tag
	 *
	 * @link https://www.last.fm/api/show/tag.getInfo
	 */
	protected array $tagGetInfo = [
		'path'   => 'tag.getInfo',
		'method' => 'GET',
		'query'  => ['lang', 'tag'],
		'body'   => null,
	];

	/**
	 * Search for tags similar to this one. Returns tags ranked by similarity, based on listening data.
	 *
	 * @link https://www.last.fm/api/show/tag.getSimilar
	 */
	protected array $tagGetSimilar = [
		'path'   => 'tag.getSimilar',
		'method' => 'GET',
		'query'  => ['tag'],
		'body'   => null,
	];

	/**
	 * Get the top albums tagged by this tag, ordered by tag count.
	 *
	 * @link https://www.last.fm/api/show/tag.getTopAlbums
	 */
	protected array $tagGetTopAlbums = [
		'path'   => 'tag.getTopAlbums',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'tag'],
		'body'   => null,
	];

	/**
	 * Get the top artists tagged by this tag, ordered by tag count.
	 *
	 * @link https://www.last.fm/api/show/tag.getTopArtists
	 */
	protected array $tagGetTopArtists = [
		'path'   => 'tag.getTopArtists',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'tag'],
		'body'   => null,
	];

	/**
	 * Fetches the top global tags on Last.fm, sorted by popularity (number of times used)
	 *
	 * @link https://www.last.fm/api/show/tag.getTopTags
	 */
	protected array $tagGetTopTags = [
		'path'   => 'tag.getTopTags',
		'method' => 'GET',
		'query'  => null,
		'body'   => null,
	];

	/**
	 * Get the top tracks tagged by this tag, ordered by tag count.
	 *
	 * @link https://www.last.fm/api/show/tag.getTopTracks
	 */
	protected array $tagGetTopTracks = [
		'path'   => 'tag.getTopTracks',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'tag'],
		'body'   => null,
	];

	/**
	 * Get a list of available charts for this tag, expressed as date ranges which can be sent to the chart services.
	 *
	 * @link https://www.last.fm/api/show/tag.getWeeklyChartList
	 */
	protected array $tagGetWeeklyChartList = [
		'path'   => 'tag.getWeeklyChartList',
		'method' => 'GET',
		'query'  => ['tag'],
		'body'   => null,
	];

	/**
	 * Tag an album using a list of user supplied tags.
	 *
	 * @link https://www.last.fm/api/show/track.addTags
	 */
	protected array $trackAddTags = [
		'path'   => 'track.addTags',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['artist', 'tags', 'track'],
	];

	/**
	 * Use the last.fm corrections data to check whether the supplied track has a correction to a canonical track
	 *
	 * @link https://www.last.fm/api/show/track.getCorrection
	 */
	protected array $trackGetCorrection = [
		'path'   => 'track.getCorrection',
		'method' => 'GET',
		'query'  => ['artist', 'track'],
		'body'   => null,
	];

	/**
	 * Get the metadata for a track on Last.fm using the artist/track name or a musicbrainz id.
	 *
	 * @link https://www.last.fm/api/show/track.getInfo
	 */
	protected array $trackGetInfo = [
		'path'   => 'track.getInfo',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'mbid', 'track', 'username'],
		'body'   => null,
	];

	/**
	 * Get the similar tracks for this track on Last.fm, based on listening data.
	 *
	 * @link https://www.last.fm/api/show/track.getSimilar
	 */
	protected array $trackGetSimilar = [
		'path'   => 'track.getSimilar',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'limit', 'mbid', 'track'],
		'body'   => null,
	];

	/**
	 * Get the tags applied by an individual user to a track on Last.fm. To retrieve the list of top tags applied to a track by all users use track.getTopTags.
	 *
	 * @link https://www.last.fm/api/show/track.getTags
	 */
	protected array $trackGetTags = [
		'path'   => 'track.getTags',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'mbid', 'track', 'user'],
		'body'   => null,
	];

	/**
	 * Get the top tags for this track on Last.fm, ordered by tag count. Supply either track & artist name or mbid.
	 *
	 * @link https://www.last.fm/api/show/track.getTopTags
	 */
	protected array $trackGetTopTags = [
		'path'   => 'track.getTopTags',
		'method' => 'GET',
		'query'  => ['artist', 'autocorrect', 'mbid', 'track'],
		'body'   => null,
	];

	/**
	 * Love a track for a user profile.
	 *
	 * @link https://www.last.fm/api/show/track.love
	 */
	protected array $trackLove = [
		'path'   => 'track.love',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['artist', 'track'],
	];

	/**
	 * Remove a user's tag from a track.
	 *
	 * @link https://www.last.fm/api/show/track.removeTag
	 */
	protected array $trackRemoveTag = [
		'path'   => 'track.removeTag',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['artist', 'tag', 'track'],
	];

	/**
	 * Search for a track by track name. Returns track matches sorted by relevance.
	 *
	 * @link https://www.last.fm/api/show/track.search
	 */
	protected array $trackSearch = [
		'path'   => 'track.search',
		'method' => 'GET',
		'query'  => ['artist', 'limit', 'page', 'track'],
		'body'   => null,
	];

	/**
	 * UnLove a track for a user profile.
	 *
	 * @link https://www.last.fm/api/show/track.unlove
	 */
	protected array $trackUnlove = [
		'path'   => 'track.unlove',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['artist', 'track'],
	];

	/**
	 * Used to notify Last.fm that a user has started listening to a track. Parameter names are case sensitive.
	 *
	 * @link https://www.last.fm/api/show/track.updateNowPlaying
	 */
	protected array $trackUpdateNowPlaying = [
		'path'   => 'track.updateNowPlaying',
		'method' => 'POST',
		'query'  => null,
		'body'   => ['album', 'albumArtist', 'artist', 'context', 'duration', 'mbid', 'track', 'trackNumber'],
	];

	/**
	 * Get a list of the user's friends on Last.fm.
	 *
	 * @link https://www.last.fm/api/show/user.getFriends
	 */
	protected array $userGetFriends = [
		'path'   => 'user.getFriends',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'recenttracks', 'user'],
		'body'   => null,
	];

	/**
	 * Get information about a user profile.
	 *
	 * @link https://www.last.fm/api/show/user.getInfo
	 */
	protected array $userGetInfo = [
		'path'   => 'user.getInfo',
		'method' => 'GET',
		'query'  => ['user'],
		'body'   => null,
	];

	/**
	 * Get the last 50 tracks loved by a user.
	 *
	 * @link https://www.last.fm/api/show/user.getLovedTracks
	 */
	protected array $userGetLovedTracks = [
		'path'   => 'user.getLovedTracks',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'user'],
		'body'   => null,
	];

	/**
	 * Get the user's personal tags
	 *
	 * @link https://www.last.fm/api/show/user.getPersonalTags
	 */
	protected array $userGetPersonalTags = [
		'path'   => 'user.getPersonalTags',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'tag', 'taggingtype[artist|album|track]', 'user'],
		'body'   => null,
	];

	/**
	 * Get a list of the recent tracks listened to by this user. Also includes the currently playing track with the nowplaying="true" attribute if the user is currently listening.
	 *
	 * @link https://www.last.fm/api/show/user.getRecentTracks
	 */
	protected array $userGetRecentTracks = [
		'path'   => 'user.getRecentTracks',
		'method' => 'GET',
		'query'  => ['extended', 'from', 'limit', 'page', 'to', 'user'],
		'body'   => null,
	];

	/**
	 * Get the top albums listened to by a user. You can stipulate a time period. Sends the overall chart by default.
	 *
	 * @link https://www.last.fm/api/show/user.getTopAlbums
	 */
	protected array $userGetTopAlbums = [
		'path'   => 'user.getTopAlbums',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'period', 'user'],
		'body'   => null,
	];

	/**
	 * Get the top artists listened to by a user. You can stipulate a time period. Sends the overall chart by default.
	 *
	 * @link https://www.last.fm/api/show/user.getTopArtists
	 */
	protected array $userGetTopArtists = [
		'path'   => 'user.getTopArtists',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'period', 'user'],
		'body'   => null,
	];

	/**
	 * Get the top tags used by this user.
	 *
	 * @link https://www.last.fm/api/show/user.getTopTags
	 */
	protected array $userGetTopTags = [
		'path'   => 'user.getTopTags',
		'method' => 'GET',
		'query'  => ['limit', 'user'],
		'body'   => null,
	];

	/**
	 * Get the top tracks listened to by a user. You can stipulate a time period. Sends the overall chart by default.
	 *
	 * @link https://www.last.fm/api/show/user.getTopTracks
	 */
	protected array $userGetTopTracks = [
		'path'   => 'user.getTopTracks',
		'method' => 'GET',
		'query'  => ['limit', 'page', 'period', 'user'],
		'body'   => null,
	];

	/**
	 * Get an album chart for a user profile, for a given date range. If no date range is supplied, it will return the most recent album chart for this user.
	 *
	 * @link https://www.last.fm/api/show/user.getWeeklyAlbumChart
	 */
	protected array $userGetWeeklyAlbumChart = [
		'path'   => 'user.getWeeklyAlbumChart',
		'method' => 'GET',
		'query'  => ['from', 'to', 'user'],
		'body'   => null,
	];

	/**
	 * Get an artist chart for a user profile, for a given date range. If no date range is supplied, it will return the most recent artist chart for this user.
	 *
	 * @link https://www.last.fm/api/show/user.getWeeklyArtistChart
	 */
	protected array $userGetWeeklyArtistChart = [
		'path'   => 'user.getWeeklyArtistChart',
		'method' => 'GET',
		'query'  => ['from', 'to', 'user'],
		'body'   => null,
	];

	/**
	 * Get a list of available charts for this user, expressed as date ranges which can be sent to the chart services.
	 *
	 * @link https://www.last.fm/api/show/user.getWeeklyChartList
	 */
	protected array $userGetWeeklyChartList = [
		'path'   => 'user.getWeeklyChartList',
		'method' => 'GET',
		'query'  => ['user'],
		'body'   => null,
	];

	/**
	 * Get a track chart for a user profile, for a given date range. If no date range is supplied, it will return the most recent track chart for this user.
	 *
	 * @link https://www.last.fm/api/show/user.getWeeklyTrackChart
	 */
	protected array $userGetWeeklyTrackChart = [
		'path'   => 'user.getWeeklyTrackChart',
		'method' => 'GET',
		'query'  => ['from', 'to', 'user'],
		'body'   => null,
	];

}
