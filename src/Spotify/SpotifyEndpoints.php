<?php
/**
 * Class SpotifyEndpoints (auto created)
 *
 * @link    https://developer.spotify.com/documentation/web-api/reference/
 * @created 23.03.2021
 * @license MIT
 */

namespace chillerlan\OAuth\Providers\Spotify;

use chillerlan\OAuth\MagicAPI\EndpointMap;

class SpotifyEndpoints extends EndpointMap{

	protected string $API_BASE = '/v1';

	/**
	 * Get Multiple Albums
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-multiple-albums
	 */
	protected array $albums = [
		'method'        => 'GET',
		'path'          => '/albums',
		'path_elements' => null,
		'query'         => ['ids', 'market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get an Album
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-album
	 */
	protected array $albumsId = [
		'method'        => 'GET',
		'path'          => '/albums/%1$s',
		'path_elements' => ['id'],
		'query'         => ['market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get an Album's Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-albums-tracks
	 */
	protected array $albumsIdTracks = [
		'method'        => 'GET',
		'path'          => '/albums/%1$s/tracks',
		'path_elements' => ['id'],
		'query'         => ['market', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Multiple Artists
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-multiple-artists
	 */
	protected array $artists = [
		'method'        => 'GET',
		'path'          => '/artists',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get an Artist
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-artist
	 */
	protected array $artistsId = [
		'method'        => 'GET',
		'path'          => '/artists/%1$s',
		'path_elements' => ['id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get an Artist's Albums
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-artists-albums
	 */
	protected array $artistsIdAlbums = [
		'method'        => 'GET',
		'path'          => '/artists/%1$s/albums',
		'path_elements' => ['id'],
		'query'         => ['include_groups', 'market', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get an Artist's Related Artists
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-artists-related-artists
	 */
	protected array $artistsIdRelatedArtists = [
		'method'        => 'GET',
		'path'          => '/artists/%1$s/related-artists',
		'path_elements' => ['id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get an Artist's Top Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-artists-top-tracks
	 */
	protected array $artistsIdTopTracks = [
		'method'        => 'GET',
		'path'          => '/artists/%1$s/top-tracks',
		'path_elements' => ['id'],
		'query'         => ['market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Audio Analysis for a Track
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-audio-analysis
	 */
	protected array $audioAnalysisId = [
		'method'        => 'GET',
		'path'          => '/audio-analysis/%1$s',
		'path_elements' => ['id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Audio Features for Several Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-several-audio-features
	 */
	protected array $audioFeatures = [
		'method'        => 'GET',
		'path'          => '/audio-features',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Audio Features for a Track
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-audio-features
	 */
	protected array $audioFeaturesId = [
		'method'        => 'GET',
		'path'          => '/audio-features/%1$s',
		'path_elements' => ['id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get All Categories
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-categories
	 */
	protected array $browseCategories = [
		'method'        => 'GET',
		'path'          => '/browse/categories',
		'path_elements' => null,
		'query'         => ['country', 'locale', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a Category
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-category
	 */
	protected array $browseCategoriesCategoryId = [
		'method'        => 'GET',
		'path'          => '/browse/categories/%1$s',
		'path_elements' => ['category_id'],
		'query'         => ['country', 'locale'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a Category's Playlists
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-categories-playlists
	 */
	protected array $browseCategoriesCategoryIdPlaylists = [
		'method'        => 'GET',
		'path'          => '/browse/categories/%1$s/playlists',
		'path_elements' => ['category_id'],
		'query'         => ['country', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get All Featured Playlists
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-featured-playlists
	 */
	protected array $browseFeaturedPlaylists = [
		'method'        => 'GET',
		'path'          => '/browse/featured-playlists',
		'path_elements' => null,
		'query'         => ['country', 'locale', 'timestamp', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get All New Releases
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-new-releases
	 */
	protected array $browseNewReleases = [
		'method'        => 'GET',
		'path'          => '/browse/new-releases',
		'path_elements' => null,
		'query'         => ['country', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Multiple Episodes
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-multiple-episodes
	 */
	protected array $episodes = [
		'method'        => 'GET',
		'path'          => '/episodes',
		'path_elements' => null,
		'query'         => ['ids', 'market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get an Episode
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-an-episode
	 */
	protected array $episodesId = [
		'method'        => 'GET',
		'path'          => '/episodes/%1$s',
		'path_elements' => ['id'],
		'query'         => ['market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Available Markets
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-available-markets
	 */
	protected array $markets = [
		'method'        => 'GET',
		'path'          => '/markets',
		'path_elements' => null,
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Current User's Profile
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-current-users-profile
	 */
	protected array $me = [
		'method'        => 'GET',
		'path'          => '/me',
		'path_elements' => null,
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Remove Albums for Current User
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-albums-user
	 */
	protected array $meAlbumRemove = [
		'method'        => 'DELETE',
		'path'          => '/me/albums',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Save Albums for Current User
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-save-albums-user
	 */
	protected array $meAlbumSave = [
		'method'        => 'PUT',
		'path'          => '/me/albums',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get User's Saved Albums
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-saved-albums
	 */
	protected array $meAlbums = [
		'method'        => 'GET',
		'path'          => '/me/albums',
		'path_elements' => null,
		'query'         => ['limit', 'offset', 'market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Check User's Saved Albums
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-users-saved-albums
	 */
	protected array $meAlbumsContains = [
		'method'        => 'GET',
		'path'          => '/me/albums/contains',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Remove User's Saved Episodes
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-episodes-user
	 */
	protected array $meEpisodeRemove = [
		'method'        => 'DELETE',
		'path'          => '/me/episodes',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Save Episodes for User
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-save-episodes-user
	 */
	protected array $meEpisodeSave = [
		'method'        => 'PUT',
		'path'          => '/me/episodes',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get User's Saved Episodes
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-saved-episodes
	 */
	protected array $meEpisodes = [
		'method'        => 'GET',
		'path'          => '/me/episodes',
		'path_elements' => null,
		'query'         => ['market', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Check User's Saved Episodes
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-users-saved-episodes
	 */
	protected array $meEpisodesContains = [
		'method'        => 'GET',
		'path'          => '/me/episodes/contains',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Follow Artists or Users
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-follow-artists-users
	 */
	protected array $meFollow = [
		'method'        => 'PUT',
		'path'          => '/me/following',
		'path_elements' => null,
		'query'         => ['type', 'ids'],
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get User's Followed Artists
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-followed
	 */
	protected array $meFollowing = [
		'method'        => 'GET',
		'path'          => '/me/following',
		'path_elements' => null,
		'query'         => ['type', 'after', 'limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Following State for Artists/Users
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-current-user-follows
	 */
	protected array $meFollowingContains = [
		'method'        => 'GET',
		'path'          => '/me/following/contains',
		'path_elements' => null,
		'query'         => ['type', 'ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Information About The User's Current Playback
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-information-about-the-users-current-playback
	 */
	protected array $mePlayer = [
		'method'        => 'GET',
		'path'          => '/me/player',
		'path_elements' => null,
		'query'         => ['market', 'additional_types'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get the User's Currently Playing Track
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-the-users-currently-playing-track
	 */
	protected array $mePlayerCurrentlyPlaying = [
		'method'        => 'GET',
		'path'          => '/me/player/currently-playing',
		'path_elements' => null,
		'query'         => ['market', 'additional_types'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a User's Available Devices
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-users-available-devices
	 */
	protected array $mePlayerDevices = [
		'method'        => 'GET',
		'path'          => '/me/player/devices',
		'path_elements' => null,
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Skip User’s Playback To Next Track
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-skip-users-playback-to-next-track
	 */
	protected array $mePlayerNext = [
		'method'        => 'POST',
		'path'          => '/me/player/next',
		'path_elements' => null,
		'query'         => ['device_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Pause a User's Playback
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-pause-a-users-playback
	 */
	protected array $mePlayerPause = [
		'method'        => 'PUT',
		'path'          => '/me/player/pause',
		'path_elements' => null,
		'query'         => ['device_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Start/Resume a User's Playback
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-start-a-users-playback
	 */
	protected array $mePlayerPlay = [
		'method'        => 'PUT',
		'path'          => '/me/player/play',
		'path_elements' => null,
		'query'         => ['device_id'],
		'body'          => ['context_uri', 'uris', 'offset', 'position_ms'],
		'headers'       => null,
	];

	/**
	 * Skip User’s Playback To Previous Track
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-skip-users-playback-to-previous-track
	 */
	protected array $mePlayerPrevious = [
		'method'        => 'POST',
		'path'          => '/me/player/previous',
		'path_elements' => null,
		'query'         => ['device_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Add an item to queue
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-add-to-queue
	 */
	protected array $mePlayerQueue = [
		'method'        => 'POST',
		'path'          => '/me/player/queue',
		'path_elements' => null,
		'query'         => ['uri', 'device_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Current User's Recently Played Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-recently-played
	 */
	protected array $mePlayerRecentlyPlayed = [
		'method'        => 'GET',
		'path'          => '/me/player/recently-played',
		'path_elements' => null,
		'query'         => ['limit', 'after', 'before'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Set Repeat Mode On User’s Playback
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-set-repeat-mode-on-users-playback
	 */
	protected array $mePlayerRepeat = [
		'method'        => 'PUT',
		'path'          => '/me/player/repeat',
		'path_elements' => null,
		'query'         => ['state', 'device_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Seek To Position In Currently Playing Track
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-seek-to-position-in-currently-playing-track
	 */
	protected array $mePlayerSeek = [
		'method'        => 'PUT',
		'path'          => '/me/player/seek',
		'path_elements' => null,
		'query'         => ['position_ms', 'device_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Toggle Shuffle For User’s Playback
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-toggle-shuffle-for-users-playback
	 */
	protected array $mePlayerShuffle = [
		'method'        => 'PUT',
		'path'          => '/me/player/shuffle',
		'path_elements' => null,
		'query'         => ['state', 'device_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Transfer a User's Playback
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-transfer-a-users-playback
	 */
	protected array $mePlayerTransferPlayback = [
		'method'        => 'PUT',
		'path'          => '/me/player',
		'path_elements' => null,
		'query'         => null,
		'body'          => ['device_ids', 'play'],
		'headers'       => null,
	];

	/**
	 * Set Volume For User's Playback
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-set-volume-for-users-playback
	 */
	protected array $mePlayerVolume = [
		'method'        => 'PUT',
		'path'          => '/me/player/volume',
		'path_elements' => null,
		'query'         => ['volume_percent', 'device_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a List of Current User's Playlists
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-list-of-current-users-playlists
	 */
	protected array $mePlaylists = [
		'method'        => 'GET',
		'path'          => '/me/playlists',
		'path_elements' => null,
		'query'         => ['limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Remove User's Saved Shows
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-shows-user
	 */
	protected array $meShowRemove = [
		'method'        => 'DELETE',
		'path'          => '/me/shows',
		'path_elements' => null,
		'query'         => ['ids', 'market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Save Shows for Current User
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-save-shows-user
	 */
	protected array $meShowSave = [
		'method'        => 'PUT',
		'path'          => '/me/shows',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get User's Saved Shows
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-saved-shows
	 */
	protected array $meShows = [
		'method'        => 'GET',
		'path'          => '/me/shows',
		'path_elements' => null,
		'query'         => ['limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Check User's Saved Shows
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-users-saved-shows
	 */
	protected array $meShowsContains = [
		'method'        => 'GET',
		'path'          => '/me/shows/contains',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a User's Top Artists and Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-top-artists-and-tracks
	 */
	protected array $meTopType = [
		'method'        => 'GET',
		'path'          => '/me/top/%1$s',
		'path_elements' => ['type'],
		'query'         => ['time_range', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Remove User's Saved Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-tracks-user
	 */
	protected array $meTrackRemove = [
		'method'        => 'DELETE',
		'path'          => '/me/tracks',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Save Tracks for User
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-save-tracks-user
	 */
	protected array $meTrackSave = [
		'method'        => 'PUT',
		'path'          => '/me/tracks',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get User's Saved Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-saved-tracks
	 */
	protected array $meTracks = [
		'method'        => 'GET',
		'path'          => '/me/tracks',
		'path_elements' => null,
		'query'         => ['market', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Check User's Saved Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-users-saved-tracks
	 */
	protected array $meTracksContains = [
		'method'        => 'GET',
		'path'          => '/me/tracks/contains',
		'path_elements' => null,
		'query'         => ['ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Unfollow Artists or Users
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-unfollow-artists-users
	 */
	protected array $meUnfollow = [
		'method'        => 'DELETE',
		'path'          => '/me/following',
		'path_elements' => null,
		'query'         => ['type', 'ids'],
		'body'          => ['ids'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get a Playlist
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-playlist
	 */
	protected array $playlistsPlaylistId = [
		'method'        => 'GET',
		'path'          => '/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => ['market', 'fields', 'additional_types'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Change a Playlist's Details
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-change-playlist-details
	 */
	protected array $playlistsPlaylistIdChangeDetails = [
		'method'        => 'PUT',
		'path'          => '/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => ['name', 'public', 'collaborative', 'description'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Follow a Playlist
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-follow-playlist
	 */
	protected array $playlistsPlaylistIdFollow = [
		'method'        => 'PUT',
		'path'          => '/playlists/%1$s/followers',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => ['public'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Check if Users Follow a Playlist
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-check-if-user-follows-playlist
	 */
	protected array $playlistsPlaylistIdFollowersContains = [
		'method'        => 'GET',
		'path'          => '/playlists/%1$s/followers/contains',
		'path_elements' => ['playlist_id'],
		'query'         => ['ids'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Upload a Custom Playlist Cover Image
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-upload-custom-playlist-cover
	 */
	protected array $playlistsPlaylistIdImageUpload = [
		'method'        => 'PUT',
		'path'          => '/playlists/%1$s/images',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => ['body'],
		'headers'       => ['Content-Type' => 'image/jpeg'],
	];

	/**
	 * Get a Playlist Cover Image
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-playlist-cover
	 */
	protected array $playlistsPlaylistIdImages = [
		'method'        => 'GET',
		'path'          => '/playlists/%1$s/images',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a Playlist's Items
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-playlists-tracks
	 */
	protected array $playlistsPlaylistIdTracks = [
		'method'        => 'GET',
		'path'          => '/playlists/%1$s/tracks',
		'path_elements' => ['playlist_id'],
		'query'         => ['market', 'fields', 'limit', 'offset', 'additional_types'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Add Items to a Playlist
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-add-tracks-to-playlist
	 */
	protected array $playlistsPlaylistIdTracksAdd = [
		'method'        => 'POST',
		'path'          => '/playlists/%1$s/tracks',
		'path_elements' => ['playlist_id'],
		'query'         => ['position', 'uris'],
		'body'          => ['uris', 'position'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Remove Items from a Playlist
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-remove-tracks-playlist
	 */
	protected array $playlistsPlaylistIdTracksRemove = [
		'method'        => 'DELETE',
		'path'          => '/playlists/%1$s/tracks',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => ['tracks', 'snapshot_id'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Reorder or Replace a Playlist's Items
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-reorder-or-replace-playlists-tracks
	 */
	protected array $playlistsPlaylistIdTracksReplace = [
		'method'        => 'PUT',
		'path'          => '/playlists/%1$s/tracks',
		'path_elements' => ['playlist_id'],
		'query'         => ['uris'],
		'body'          => ['uris', 'range_start', 'insert_before', 'range_length', 'snapshot_id'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Unfollow Playlist
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-unfollow-playlist
	 */
	protected array $playlistsPlaylistIdUnfollow = [
		'method'        => 'DELETE',
		'path'          => '/playlists/%1$s/followers',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Recommendations
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-recommendations
	 */
	protected array $recommendations = [
		'method'        => 'GET',
		'path'          => '/recommendations',
		'path_elements' => null,
		'query'         => ['limit', 'market', 'seed_artists', 'seed_genres', 'seed_tracks', 'min_acousticness', 'max_acousticness', 'target_acousticness', 'min_danceability', 'max_danceability', 'target_danceability', 'min_duration_ms', 'max_duration_ms', 'target_duration_ms', 'min_energy', 'max_energy', 'target_energy', 'min_instrumentalness', 'max_instrumentalness', 'target_instrumentalness', 'min_key', 'max_key', 'target_key', 'min_liveness', 'max_liveness', 'target_liveness', 'min_loudness', 'max_loudness', 'target_loudness', 'min_mode', 'max_mode', 'target_mode', 'min_popularity', 'max_popularity', 'target_popularity', 'min_speechiness', 'max_speechiness', 'target_speechiness', 'min_tempo', 'max_tempo', 'target_tempo', 'min_time_signature', 'max_time_signature', 'target_time_signature', 'min_valence', 'max_valence', 'target_valence'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Recommendation Genres
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-recommendation-genres
	 */
	protected array $recommendationsAvailableGenreSeeds = [
		'method'        => 'GET',
		'path'          => '/recommendations/available-genre-seeds',
		'path_elements' => null,
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Search for an Item
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-search
	 */
	protected array $search = [
		'method'        => 'GET',
		'path'          => '/search',
		'path_elements' => null,
		'query'         => ['q', 'type', 'market', 'limit', 'offset', 'include_external'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Multiple Shows
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-multiple-shows
	 */
	protected array $shows = [
		'method'        => 'GET',
		'path'          => '/shows',
		'path_elements' => null,
		'query'         => ['ids', 'market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a Show
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-show
	 */
	protected array $showsId = [
		'method'        => 'GET',
		'path'          => '/shows/%1$s',
		'path_elements' => ['id'],
		'query'         => ['market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a Show's Episodes
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-a-shows-episodes
	 */
	protected array $showsIdEpisodes = [
		'method'        => 'GET',
		'path'          => '/shows/%1$s/episodes',
		'path_elements' => ['id'],
		'query'         => ['market', 'limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get Several Tracks
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-several-tracks
	 */
	protected array $tracks = [
		'method'        => 'GET',
		'path'          => '/tracks',
		'path_elements' => null,
		'query'         => ['ids', 'market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a Track
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-track
	 */
	protected array $tracksId = [
		'method'        => 'GET',
		'path'          => '/tracks/%1$s',
		'path_elements' => ['id'],
		'query'         => ['market'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a User's Profile
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-users-profile
	 */
	protected array $usersUserId = [
		'method'        => 'GET',
		'path'          => '/users/%1$s',
		'path_elements' => ['user_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Get a List of a User's Playlists
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-get-list-users-playlists
	 */
	protected array $usersUserIdPlaylists = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/playlists',
		'path_elements' => ['user_id'],
		'query'         => ['limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Create a Playlist
	 *
	 * @link https://developer.spotify.com/documentation/web-api/reference/#endpoint-create-playlist
	 */
	protected array $usersUserPlaylistCreate = [
		'method'        => 'POST',
		'path'          => '/users/%1$s/playlists',
		'path_elements' => ['user_id'],
		'query'         => null,
		'body'          => ['name', 'public', 'collaborative', 'description'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

}
