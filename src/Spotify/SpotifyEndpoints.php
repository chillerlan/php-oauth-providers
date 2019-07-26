<?php
/**
 * Class SpotifyEndpoints
 *
 * @filesource   SpotifyEndpoints.php
 * @created      06.04.2018
 * @package      chillerlan\OAuth\Providers\Spotify
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Spotify;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://beta.developer.spotify.com/documentation/web-api/reference/
 *
 * Note: the endpoints are ordered by the api docs (against any logical pattern)
 */
class SpotifyEndpoints extends EndpointMap{

	protected $API_BASE = '/v1';

	/**
	 * Albums
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/albums/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/albums/get-album/
	 */
	protected $album = [
		'path'          => '/albums/%1$s',
		'method'        => 'GET',
		'query'         => ['market'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/albums/get-albums-tracks/
	 */
	protected $albumTracks = [
		'path'          => '/albums/%1$s/tracks',
		'method'        => 'GET',
		'query'         => ['limit', 'offset', 'market'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/albums/get-several-albums/
	 */
	protected $albums = [
		'path'          => '/albums',
		'method'        => 'GET',
		'query'         => ['ids', 'market'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Artists
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/artists/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/artists/get-artist/
	 */
	protected $artist = [
		'path'          => '/artists/%1$s',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/artists/get-artists-albums/
	 */
	protected $artistAlbums = [
		'path'          => '/artists/%1$s/albums',
		'method'        => 'GET',
		'query'         => ['album_type', 'limit', 'offset', 'market'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/artists/get-artists-top-tracks/
	 */
	protected $artistTopTracks = [
		'path'          => '/artists/%1$s/top-tracks',
		'method'        => 'GET',
		'query'         => ['country'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/artists/get-related-artists/
	 */
	protected $artistRelatedArtists = [
		'path'          => '/artists/%1$s/related-artists',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/artists/get-several-artists/
	 */
	protected $artists = [
		'path'          => '/artists',
		'method'        => 'GET',
		'query'         => ['ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Browse
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/browse/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/browse/get-category/
	 */
	protected $category = [
		'path'          => '/browse/categories/%1$s',
		'method'        => 'GET',
		'query'         => ['locale', 'country'],
		'path_elements' => ['category_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/browse/get-categorys-playlists/
	 */
	protected $categoryPlaylists = [
		'path'          => '/browse/categories/%1$s/playlists',
		'method'        => 'GET',
		'query'         => ['locale', 'country'],
		'path_elements' => ['category_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/browse/get-list-categories/
	 */
	protected $categories = [
		'path'          => '/browse/categories',
		'method'        => 'GET',
		'query'         => ['locale', 'country', 'limit', 'offset'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/browse/get-list-featured-playlists/
	 */
	protected $featuredPlaylists = [
		'path'          => '/browse/featured-playlists',
		'method'        => 'GET',
		'query'         => ['locale', 'country', 'timestamp', 'limit', 'offset'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/browse/get-list-new-releases/
	 */
	protected $newReleases = [
		'path'          => '/browse/new-releases',
		'method'        => 'GET',
		'query'         => ['locale', 'country', 'limit', 'offset'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/browse/get-recommendations/
	 */
	protected $recommendations = [
		'path'          => '/recommendations',
		'method'        => 'GET',
		'query'         => ['limit', 'market', 'seed_artists', 'seed_genres', 'seed_tracks', 'max_*', 'min_*', 'target_*'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Follow
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/follow/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/follow/check-current-user-follows/
	 */
	protected $meFollowingContains = [
		'path'          => '/me/following/contains',
		'method'        => 'GET',
		'query'         => ['type', 'ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/follow/check-user-following-playlist/
	 */
	protected $userPlaylistFollowersContains = [
		'path'          => '/users/%1$s/playlists/%2$s/followers/contains',
		'method'        => 'GET',
		'query'         => ['ids'],
		'path_elements' => ['owner_id', 'playlist_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/follow/follow-artists-users/
	 */
	protected $follow = [
		'path'          => '/me/following',
		'method'        => 'PUT',
		'query'         => ['ids', 'type'],
		'path_elements' => null,
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/follow/follow-playlist/
	 */
	protected $followPlaylist = [
		'path'          => '/users/%1$s/playlists/%2$s/followers',
		'method'        => 'PUT',
		'query'         => null,
		'path_elements' => ['owner_id', 'playlist_id'],
		'body'          => ['public'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/follow/get-followed/
	 */
	protected $meFollowing = [
		'path'          => '/me/following',
		'method'        => 'GET',
		'query'         => ['type', 'after', 'limit'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/follow/unfollow-artists-users/
	 */
	protected $unfollow = [
		'path'          => '/me/following',
		'method'        => 'DELETE',
		'query'         => ['ids', 'type'],
		'path_elements' => null,
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/follow/unfollow-playlist/
	 */
	protected $unfollowPlaylist = [
		'path'          => '/users/%1$s/playlists/%2$s/followers',
		'method'        => 'DELETE',
		'query'         => null,
		'path_elements' => ['owner_id', 'playlist_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * User Library
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/check-users-saved-albums/
	 */
	protected $meSavedAlbumsContains = [
		'path'          => '/me/albums/contains',
		'method'        => 'GET',
		'query'         => ['ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/check-users-saved-tracks/
	 */
	protected $meSavedTracksContains = [
		'path'          => '/me/tracks/contains',
		'method'        => 'GET',
		'query'         => ['ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/get-users-saved-albums/
	 */
	protected $meSavedAlbums = [
		'path'          => '/me/albums',
		'method'        => 'GET',
		'query'         => ['market', 'limit', 'offset'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/get-users-saved-tracks/
	 */
	protected $meSavedTracks = [
		'path'          => '/me/tracks',
		'method'        => 'GET',
		'query'         => ['market', 'limit', 'offset'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/remove-albums-user/
	 */
	protected $removeSavedAlbums = [
		'path'          => '/me/albums',
		'method'        => 'DELETE',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/remove-tracks-user/
	 */
	protected $removeSavedTracks = [
		'path'          => '/me/tracks',
		'method'        => 'DELETE',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/save-albums-user/
	 */
	protected $saveAlbums = [
		'path'          => '/me/albums',
		'method'        => 'PUT',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/library/save-tracks-user/
	 */
	protected $saveTracks = [
		'path'          => '/me/tracks',
		'method'        => 'PUT',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Personalization
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/personalization/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/personalization/get-users-top-artists-and-tracks/
	 */
	protected $meTop = [
		'path'          => '/me/top/%1$s',
		'method'        => 'GET',
		'query'         => ['time_range', 'limit', 'offset'],
		'path_elements' => ['type'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Player
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/get-a-users-available-devices/
	 */
	protected $devices = [
		'path'          => '/me/player/devices',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/get-information-about-the-users-current-playback/
	 */
	protected $playbackInfo = [
		'path'          => '/me/player',
		'method'        => 'GET',
		'query'         => ['market'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/get-recently-played/
	 */
	protected $recentlyPlayed = [
		'path'          => '/me/player/recently-played',
		'method'        => 'GET',
		'query'         => ['limit', 'offset', 'after', 'before'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/get-the-users-currently-playing-track/
	 */
	protected $nowPlaying = [
		'path'          => '/me/player/currently-playing',
		'method'        => 'GET',
		'query'         => ['market'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/pause-a-users-playback/
	 */
	protected $pause = [
		'path'          => '/me/player/pause',
		'method'        => 'PUT',
		'query'         => ['device_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/seek-to-position-in-currently-playing-track/
	 */
	protected $seek = [
		'path'          => '/me/player/seek',
		'method'        => 'PUT',
		'query'         => ['position_ms', 'device_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/set-repeat-mode-on-users-playback/
	 */
	protected $repeat = [
		'path'          => '/me/player/repeat',
		'method'        => 'PUT',
		'query'         => ['state', 'device_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/set-volume-for-users-playback/
	 */
	protected $volume = [
		'path'          => '/me/player/volume',
		'method'        => 'PUT',
		'query'         => ['volume_percent', 'device_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/skip-users-playback-to-next-track/
	 */
	protected $next = [
		'path'          => '/me/player/next',
		'method'        => 'POST',
		'query'         => ['device_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/skip-users-playback-to-previous-track/
	 */
	protected $previous = [
		'path'          => '/me/player/previous',
		'method'        => 'POST',
		'query'         => ['device_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/start-a-users-playback/
	 */
	protected $play = [
		'path'          => '/me/player/play',
		'method'        => 'PUT',
		'query'         => ['device_id'],
		'path_elements' => null,
		'body'          => ['context_uri', 'uris', 'offset'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/toggle-shuffle-for-users-playback/
	 */
	protected $shuffle = [
		'path'          => '/me/player/shuffle',
		'method'        => 'PUT',
		'query'         => ['state', 'device_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/player/transfer-a-users-playback/
	 */
	protected $transfer = [
		'path'          => '/me/player',
		'method'        => 'PUT',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['device_ids', 'play'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Playlists
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/add-tracks-to-playlist/
	 */
	protected $playlistAddTracks = [
		'path'          => '/users/%1$s/playlists/%2$s/tracks',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => ['uris', 'position'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/change-playlist-details/
	 */
	protected $playlistUpdateDetails = [
		'path'          => '/users/%1$s/playlists/%2$s',
		'method'        => 'PUT',
		'query'         => null,
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => ['name', 'description', 'public', 'collaborative'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/create-playlist/
	 */
	protected $playlistCreate = [
		'path'          => '/users/%1$s/playlists',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => ['user_id'],
		'body'          => ['name', 'description', 'public', 'collaborative'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/get-a-list-of-current-users-playlists/
	 */
	protected $mePlaylists = [
		'path'          => '/me/playlists',
		'method'        => 'GET',
		'query'         => ['limit', 'offset'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/get-list-users-playlists/
	 */
	protected $userPlaylists = [
		'path'          => '/users/%1$s/playlists',
		'method'        => 'GET',
		'query'         => ['limit', 'offset'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/get-playlist/
	 */
	protected $userPlaylist = [
		'path'          => '/users/%1$s/playlists/%2$s',
		'method'        => 'GET',
		'query'         => ['fields', 'market'],
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/get-playlist-cover/
	 */
	protected $userPlaylistImages = [
		'path'          => '/users/%1$s/playlists/%2$s/images',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/get-playlists-tracks/
	 */
	protected $userPlaylistTracks = [
		'path'          => '/users/%1$s/playlists/%2$s/tracks',
		'method'        => 'GET',
		'query'         => ['fields', 'market', 'limit', 'offset'],
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/remove-tracks-playlist/
	 */
	protected $playlistRemoveTracks = [
		'path'          => '/users/%1$s/playlists/%2$s/tracks',
		'method'        => 'DELETE',
		'query'         => null,
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => ['tracks', 'positions', 'snapshot_id'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/reorder-playlists-tracks/
	 */
	protected $playlistReorderTracks = [
		'path'          => '/users/%1$s/playlists/%2$s/tracks',
		'method'        => 'PUT',
		'query'         => null,
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => ['range_start', 'range_length', 'insert_before', 'snapshot_id'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/replace-playlists-tracks/
	 */
	protected $playlistReplaceTracks = [
		'path'          => '/users/%1$s/playlists/%2$s/tracks',
		'method'        => 'PUT',
		'query'         => null,
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => ['uris'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @todo PUT /users/{user_id}/playlists/{playlist_id}/images
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/playlists/upload-custom-playlist-cover/
	 */
	protected $playlistUploadImage = [
		'path'          => '/users/%1$s/playlists/%2$s/images',
		'method'        => 'PUT',
		'query'         => null,
		'path_elements' => ['user_id', 'playlist_id'],
		'body'          => null,
		'headers'       => ['Content-Type' => 'image/jpeg'], // Content-Encoding?
	];

	/**
	 * Search for an Item
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/search/search/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/search/search/
	 */
	protected $search = [
		'path'          => '/search',
		'method'        => 'GET',
		'query'         => ['q', 'type', 'market', 'limit', 'offset'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Tracks
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/tracks/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/tracks/get-audio-analysis/
	 */
	protected $audioAnalysis = [
		'path'          => '/audio-analysis/%1$s',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/tracks/get-audio-features/
	 */
	protected $audioFeatures = [
		'path'          => '/audio-features/%1$s',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/tracks/get-several-audio-features/
	 */
	protected $audioFeaturesAll = [
		'path'          => '/audio-features',
		'method'        => 'GET',
		'query'         => ['ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/tracks/get-several-tracks/
	 */
	protected $tracks = [
		'path'          => '/tracks',
		'method'        => 'GET',
		'query'         => ['ids', 'market'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/tracks/get-track/
	 */
	protected $track = [
		'path'          => '/tracks/%1$s',
		'method'        => 'GET',
		'query'         => ['market'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Users Profile
	 *
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/users-profile/
	 */

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/users-profile/get-current-users-profile/
	 */
	protected $me = [
		'path'          => '/me',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://beta.developer.spotify.com/documentation/web-api/reference/users-profile/get-users-profile/
	 */
	protected $user = [
		'path'          => '/users/%1$s',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => null,
	];

}
