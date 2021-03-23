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
 * @method \Psr\Http\Message\ResponseInterface albums(array $params = ['ids', 'market'])
 * @method \Psr\Http\Message\ResponseInterface albumsId(string $id, array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface albumsIdTracks(string $id, array $params = ['market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface artists(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface artistsId(string $id)
 * @method \Psr\Http\Message\ResponseInterface artistsIdAlbums(string $id, array $params = ['include_groups', 'market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface artistsIdRelatedArtists(string $id)
 * @method \Psr\Http\Message\ResponseInterface artistsIdTopTracks(string $id, array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface audioAnalysisId(string $id)
 * @method \Psr\Http\Message\ResponseInterface audioFeatures(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface audioFeaturesId(string $id)
 * @method \Psr\Http\Message\ResponseInterface browseCategories(array $params = ['country', 'locale', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface browseCategoriesCategoryId(string $category_id, array $params = ['country', 'locale'])
 * @method \Psr\Http\Message\ResponseInterface browseCategoriesCategoryIdPlaylists(string $category_id, array $params = ['country', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface browseFeaturedPlaylists(array $params = ['country', 'locale', 'timestamp', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface browseNewReleases(array $params = ['country', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface episodes(array $params = ['ids', 'market'])
 * @method \Psr\Http\Message\ResponseInterface episodesId(string $id, array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface markets()
 * @method \Psr\Http\Message\ResponseInterface me()
 * @method \Psr\Http\Message\ResponseInterface meAlbumRemove(array $params = ['ids'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meAlbumSave(array $params = ['ids'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meAlbums(array $params = ['limit', 'offset', 'market'])
 * @method \Psr\Http\Message\ResponseInterface meAlbumsContains(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meEpisodeRemove(array $params = ['ids'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meEpisodeSave(array $params = ['ids'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meEpisodes(array $params = ['market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meEpisodesContains(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meFollow(array $params = ['type', 'ids'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meFollowing(array $params = ['type', 'after', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface meFollowingContains(array $params = ['type', 'ids'])
 * @method \Psr\Http\Message\ResponseInterface mePlayer(array $params = ['market', 'additional_types'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerCurrentlyPlaying(array $params = ['market', 'additional_types'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerDevices()
 * @method \Psr\Http\Message\ResponseInterface mePlayerNext(array $params = ['device_id'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerPause(array $params = ['device_id'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerPlay(array $params = ['device_id'], array $body = ['context_uri', 'uris', 'offset', 'position_ms'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerPrevious(array $params = ['device_id'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerQueue(array $params = ['uri', 'device_id'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerRecentlyPlayed(array $params = ['limit', 'after', 'before'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerRepeat(array $params = ['state', 'device_id'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerSeek(array $params = ['position_ms', 'device_id'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerShuffle(array $params = ['state', 'device_id'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerTransferPlayback(array $body = ['device_ids', 'play'])
 * @method \Psr\Http\Message\ResponseInterface mePlayerVolume(array $params = ['volume_percent', 'device_id'])
 * @method \Psr\Http\Message\ResponseInterface mePlaylists(array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meShowRemove(array $params = ['ids', 'market'])
 * @method \Psr\Http\Message\ResponseInterface meShowSave(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meShows(array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meShowsContains(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meTopType(string $type, array $params = ['time_range', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meTrackRemove(array $params = ['ids'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meTrackSave(array $params = ['ids'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meTracks(array $params = ['market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meTracksContains(array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface meUnfollow(array $params = ['type', 'ids'], array $body = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistId(string $playlist_id, array $params = ['market', 'fields', 'additional_types'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdChangeDetails(string $playlist_id, array $body = ['name', 'public', 'collaborative', 'description'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdFollow(string $playlist_id, array $body = ['public'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdFollowersContains(string $playlist_id, array $params = ['ids'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdImageUpload(string $playlist_id, array $body = ['body'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdImages(string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdTracks(string $playlist_id, array $params = ['market', 'fields', 'limit', 'offset', 'additional_types'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdTracksAdd(string $playlist_id, array $params = ['position', 'uris'], array $body = ['uris', 'position'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdTracksRemove(string $playlist_id, array $body = ['tracks', 'snapshot_id'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdTracksReplace(string $playlist_id, array $params = ['uris'], array $body = ['uris', 'range_start', 'insert_before', 'range_length', 'snapshot_id'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdUnfollow(string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface recommendations(array $params = ['limit', 'market', 'seed_artists', 'seed_genres', 'seed_tracks', 'min_acousticness', 'max_acousticness', 'target_acousticness', 'min_danceability', 'max_danceability', 'target_danceability', 'min_duration_ms', 'max_duration_ms', 'target_duration_ms', 'min_energy', 'max_energy', 'target_energy', 'min_instrumentalness', 'max_instrumentalness', 'target_instrumentalness', 'min_key', 'max_key', 'target_key', 'min_liveness', 'max_liveness', 'target_liveness', 'min_loudness', 'max_loudness', 'target_loudness', 'min_mode', 'max_mode', 'target_mode', 'min_popularity', 'max_popularity', 'target_popularity', 'min_speechiness', 'max_speechiness', 'target_speechiness', 'min_tempo', 'max_tempo', 'target_tempo', 'min_time_signature', 'max_time_signature', 'target_time_signature', 'min_valence', 'max_valence', 'target_valence'])
 * @method \Psr\Http\Message\ResponseInterface recommendationsAvailableGenreSeeds()
 * @method \Psr\Http\Message\ResponseInterface search(array $params = ['q', 'type', 'market', 'limit', 'offset', 'include_external'])
 * @method \Psr\Http\Message\ResponseInterface shows(array $params = ['ids', 'market'])
 * @method \Psr\Http\Message\ResponseInterface showsId(string $id, array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface showsIdEpisodes(string $id, array $params = ['market', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface tracks(array $params = ['ids', 'market'])
 * @method \Psr\Http\Message\ResponseInterface tracksId(string $id, array $params = ['market'])
 * @method \Psr\Http\Message\ResponseInterface usersUserId(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface usersUserIdPlaylists(string $user_id, array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface usersUserPlaylistCreate(string $user_id, array $body = ['name', 'public', 'collaborative', 'description'])
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
