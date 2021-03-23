<?php
/**
 * Class Spotify
 *
 * @link https://developer.spotify.com/web-api
 * @link https://beta.developer.spotify.com/documentation/general/guides/authorization-guide/
 *
 * @created      06.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Spotify;

use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, TokenRefresh};

/**
 * @method \Psr\Http\Message\ResponseInterface album(string $id, array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface albumTracks(string $id, array $params = ['limit', 'offset', 'market'])
 * @method \Psr\Http\Message\ResponseInterface albums(array $params = ['ids', 'market'])
 * @method \Psr\Http\Message\ResponseInterface artist(string $id)
 * @method \Psr\Http\Message\ResponseInterface artistAlbums(string $id, array $params = ['album_type', 'limit', 'offset', 'market'])
 * @method \Psr\Http\Message\ResponseInterface artistRelatedArtists(string $id)
 * @method \Psr\Http\Message\ResponseInterface artistTopTracks(string $id, array $params = ['country'])
 * @method \Psr\Http\Message\ResponseInterface artists(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface audioAnalysis(string $id)
 * @method \Psr\Http\Message\ResponseInterface audioFeatures(string $id)
 * @method \Psr\Http\Message\ResponseInterface audioFeaturesAll(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface categories(array $params = ['locale', 'country', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface category(string $category_id, array $params = ['locale', 'country'])
 * @method \Psr\Http\Message\ResponseInterface categoryPlaylists(string $category_id, array $params = ['locale', 'country'])
 * @method \Psr\Http\Message\ResponseInterface devices()
 * @method \Psr\Http\Message\ResponseInterface featuredPlaylists(array $params = ['locale', 'country', 'timestamp', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface follow(array $params = ['ids', 'type'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface followPlaylist(string $owner_id, string $playlist_id, array $body = ['public'])
 * @method \Psr\Http\Message\ResponseInterface me()
 * @method \Psr\Http\Message\ResponseInterface meFollowing(array $params = ['type', 'after', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface meFollowingContains(array $params = ['type', 'ids'])
 * @method \Psr\Http\Message\ResponseInterface mePlaylists(array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meSavedAlbums(array $params = ['market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meSavedAlbumsContains(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meSavedTracks(array $params = ['market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meSavedTracksContains(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meTop(string $type, array $params = ['time_range', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface newReleases(array $params = ['locale', 'country', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface next(array $params = ['device_id'])
 * @method \Psr\Http\Message\ResponseInterface nowPlaying(array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface pause(array $params = ['device_id'])
 * @method \Psr\Http\Message\ResponseInterface play(array $params = ['device_id'], array $body = ['context_uri', 'uris', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface playbackInfo(array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface playlistAddTracks(string $user_id, string $playlist_id, array $body = ['uris', 'position'])
 * @method \Psr\Http\Message\ResponseInterface playlistCreate(string $user_id, array $body = ['name', 'description', 'public', 'collaborative'])
 * @method \Psr\Http\Message\ResponseInterface playlistRemoveTracks(string $user_id, string $playlist_id, array $body = ['tracks', 'positions', 'snapshot_id'])
 * @method \Psr\Http\Message\ResponseInterface playlistReorderTracks(string $user_id, string $playlist_id, array $body = ['range_start', 'range_length', 'insert_before', 'snapshot_id'])
 * @method \Psr\Http\Message\ResponseInterface playlistReplaceTracks(string $user_id, string $playlist_id, array $body = ['uris'])
 * @method \Psr\Http\Message\ResponseInterface playlistUpdateDetails(string $user_id, string $playlist_id, array $body = ['name', 'description', 'public', 'collaborative'])
 * @method \Psr\Http\Message\ResponseInterface playlistUploadImage(string $user_id, string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface previous(array $params = ['device_id'])
 * @method \Psr\Http\Message\ResponseInterface recentlyPlayed(array $params = ['limit', 'offset', 'after', 'before'])
 * @method \Psr\Http\Message\ResponseInterface recommendations(array $params = ['limit', 'market', 'seed_artists', 'seed_genres', 'seed_tracks', 'max_*', 'min_*', 'target_*'])
 * @method \Psr\Http\Message\ResponseInterface removeSavedAlbums(array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface removeSavedTracks(array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface repeat(array $params = ['state', 'device_id'])
 * @method \Psr\Http\Message\ResponseInterface saveAlbums(array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface saveTracks(array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface search(array $params = ['q', 'type', 'market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface seek(array $params = ['position_ms', 'device_id'])
 * @method \Psr\Http\Message\ResponseInterface shuffle(array $params = ['state', 'device_id'])
 * @method \Psr\Http\Message\ResponseInterface track(string $id, array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface tracks(array $params = ['ids', 'market'])
 * @method \Psr\Http\Message\ResponseInterface transfer(array $body = ['device_ids', 'play'])
 * @method \Psr\Http\Message\ResponseInterface unfollow(array $params = ['ids', 'type'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface unfollowPlaylist(string $owner_id, string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface user(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userPlaylist(string $user_id, string $playlist_id, array $params = ['fields', 'market'])
 * @method \Psr\Http\Message\ResponseInterface userPlaylistFollowersContains(string $owner_id, string $playlist_id, array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface userPlaylistImages(string $user_id, string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface userPlaylistTracks(string $user_id, string $playlist_id, array $params = ['fields', 'market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface userPlaylists(string $user_id, array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface volume(array $params = ['volume_percent', 'device_id'])
 */
class Spotify extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	/**
	 * @link https://developer.spotify.com/documentation/general/guides/scopes/
	 */
	// images
	public const SCOPE_UGC_IMAGE_UPLOAD            = 'ugc-image-upload';
	// playlists
	public const SCOPE_PLAYLIST_MODIFY_PRIVATE     = 'playlist-modify-private';
	public const SCOPE_PLAYLIST_READ_PRIVATE       = 'playlist-read-private';
	public const SCOPE_PLAYLIST_MODIFY_PUBLIC      = 'playlist-modify-public';
	public const SCOPE_PLAYLIST_READ_COLLABORATIVE = 'playlist-read-collaborative';
	// users
	public const SCOPE_USER_READ_PRIVATE           = 'user-read-private';
	public const SCOPE_USER_READ_EMAIL             = 'user-read-email';
	// spotify connect
	public const SCOPE_USER_READ_PLAYBACK_STATE    = 'user-read-playback-state';
	public const SCOPE_USER_MODIFY_PLAYBACK_STATE  = 'user-modify-playback-state';
	public const SCOPE_USER_READ_CURRENTLY_PLAYING = 'user-read-currently-playing';
	// library
	public const SCOPE_USER_LIBRARY_MODIFY         = 'user-library-modify';
	public const SCOPE_USER_LIBRARY_READ           = 'user-library-read';
	// listening history
	public const SCOPE_USER_READ_PLAYBACK_POSITION = 'user-read-playback-position';
	public const SCOPE_USER_READ_RECENTLY_PLAYED   = 'user-read-recently-played';
	public const SCOPE_USER_TOP_READ               = 'user-top-read';
	// playback
#	public const SCOPE_APP_REMOTE_CONTROL          = 'app-remote-control'; // currently only on ios and android
	public const SCOPE_STREAMING                   = 'streaming'; // web playback SDK
	// follow
	public const SCOPE_USER_FOLLOW_MODIFY          = 'user-follow-modify';
	public const SCOPE_USER_FOLLOW_READ            = 'user-follow-read';

	protected string $authURL         = 'https://accounts.spotify.com/authorize';
	protected string $accessTokenURL  = 'https://accounts.spotify.com/api/token';
	protected ?string $apiURL         = 'https://api.spotify.com';
	protected ?string $userRevokeURL  = 'https://www.spotify.com/account/apps/';
	protected ?string $endpointMap    = SpotifyEndpoints::class;
	protected ?string $apiDocs        = 'https://developer.spotify.com/documentation/web-api/';
	protected ?string $applicationURL = 'https://developer.spotify.com/dashboard/applications';

	protected array $defaultScopes    = [
		self::SCOPE_PLAYLIST_READ_COLLABORATIVE,
		self::SCOPE_PLAYLIST_MODIFY_PUBLIC,
		self::SCOPE_USER_FOLLOW_MODIFY,
		self::SCOPE_USER_FOLLOW_READ,
		self::SCOPE_USER_LIBRARY_READ,
		self::SCOPE_USER_LIBRARY_MODIFY,
		self::SCOPE_USER_TOP_READ,
		self::SCOPE_USER_READ_EMAIL,
		self::SCOPE_STREAMING,
		self::SCOPE_USER_READ_PLAYBACK_STATE,
		self::SCOPE_USER_MODIFY_PLAYBACK_STATE,
		self::SCOPE_USER_READ_CURRENTLY_PLAYING,
		self::SCOPE_USER_READ_RECENTLY_PLAYED,
	];

}
