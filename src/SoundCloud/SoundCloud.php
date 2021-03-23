<?php
/**
 * Class SoundCloud
 *
 * @link https://developers.soundcloud.com/
 * @link https://developers.soundcloud.com/docs/api/guide#authentication
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\SoundCloud;

use chillerlan\OAuth\Core\{OAuth2Provider};

/**
 * @method \Psr\Http\Message\ResponseInterface likesPlaylistsPlaylistIdCreate(string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface likesPlaylistsPlaylistIdDelete(string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface likesTracksTrackIdCreate(string $track_id)
 * @method \Psr\Http\Message\ResponseInterface likesTracksTrackIdDelete(string $track_id)
 * @method \Psr\Http\Message\ResponseInterface me()
 * @method \Psr\Http\Message\ResponseInterface meActivities(array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface meActivitiesAllOwn(array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface meActivitiesTracks(array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface meConnections(array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meConnectionsConnectionId(string $connection_id)
 * @method \Psr\Http\Message\ResponseInterface meFavoritesIds(array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface meFollowers(array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface meFollowersFollowerId(string $follower_id)
 * @method \Psr\Http\Message\ResponseInterface meFollowings(array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meFollowingsTracks(array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface meFollowingsUserId(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface meFollowingsUserIdDelete(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface meFollowingsUserIdUpdate(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface meLikesTracks(array $params = ['limit', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface mePlaylists(array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface mePlaylistsPlaylistId(string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface meTracks(array $params = ['limit', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface meTracksTrackId(string $track_id)
 * @method \Psr\Http\Message\ResponseInterface meWebProfiles(array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface playlists(array $params = ['q', 'limit', 'offset', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface playlistsCreate(array $body = ['playlist'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistId(string $playlist_id, array $params = ['secret_token'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdDelete(string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdTracks(string $playlist_id, array $params = ['secret_token', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface playlistsPlaylistIdUpdate(string $playlist_id, array $body = ['playlist'])
 * @method \Psr\Http\Message\ResponseInterface repostsPlaylistsPlaylistIdCreate(string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface repostsPlaylistsPlaylistIdDelete(string $playlist_id)
 * @method \Psr\Http\Message\ResponseInterface repostsTracksTrackIdCreate(string $track_id)
 * @method \Psr\Http\Message\ResponseInterface repostsTracksTrackIdDelete(string $track_id)
 * @method \Psr\Http\Message\ResponseInterface resolve(array $params = ['url'])
 * @method \Psr\Http\Message\ResponseInterface tracks(array $params = ['q', 'ids', 'genres', 'tags', 'bpm', 'duration', 'created_at', 'limit', 'offset', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface tracksCreate(array $body = ['track[title]', 'track[asset_data]', 'track[permalink]', 'track[sharing]', 'track[embeddable_by]', 'track[purchase_url]', 'track[description]', 'track[genre]', 'track[tag_list]', 'track[label_name]', 'track[release]', 'track[release_date]', 'track[streamable]', 'track[downloadable]', 'track[license]', 'track[commentable]', 'track[isrc]', 'track[artwork_data]'])
 * @method \Psr\Http\Message\ResponseInterface tracksTrackId(string $track_id, array $params = ['secret_token'])
 * @method \Psr\Http\Message\ResponseInterface tracksTrackIdComments(string $track_id, array $params = ['limit', 'offset', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface tracksTrackIdCommentsCreate(string $track_id)
 * @method \Psr\Http\Message\ResponseInterface tracksTrackIdDelete(string $track_id)
 * @method \Psr\Http\Message\ResponseInterface tracksTrackIdFavoriters(string $track_id, array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface tracksTrackIdRelated(string $track_id, array $params = ['limit', 'offset', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface tracksTrackIdStreams(string $track_id, array $params = ['secret_token'])
 * @method \Psr\Http\Message\ResponseInterface tracksTrackIdUpdate(string $track_id, array $body = ['track'])
 * @method \Psr\Http\Message\ResponseInterface users(array $params = ['q', 'ids', 'limit', 'offset', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface usersUserId(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface usersUserIdComments(string $user_id, array $params = ['limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface usersUserIdFavorites(string $user_id, array $params = ['limit', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface usersUserIdFollowers(string $user_id, array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface usersUserIdFollowersFollowerId(string $user_id, string $follower_id)
 * @method \Psr\Http\Message\ResponseInterface usersUserIdFollowings(string $user_id, array $params = ['limit'])
 * @method \Psr\Http\Message\ResponseInterface usersUserIdFollowingsFollowingId(string $user_id, string $following_id)
 * @method \Psr\Http\Message\ResponseInterface usersUserIdLikesTracks(string $user_id, array $params = ['limit', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface usersUserIdPlaylists(string $user_id, array $params = ['limit', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface usersUserIdTracks(string $user_id, array $params = ['limit', 'linked_partitioning'])
 * @method \Psr\Http\Message\ResponseInterface usersUserIdWebProfiles(string $user_id, array $params = ['limit'])
 */
class SoundCloud extends OAuth2Provider{

	public const SCOPE_NONEXPIRING = 'non-expiring';
#	public const SCOPE_EMAIL       = 'email'; // ???

	protected string $authURL          = 'https://api.soundcloud.com/connect';
	protected string $accessTokenURL   = 'https://api.soundcloud.com/oauth2/token';
	protected ?string $apiURL          = 'https://api.soundcloud.com';
	protected ?string $userRevokeURL   = 'https://soundcloud.com/settings/connections';
	protected ?string $endpointMap     = SoundCloudEndpoints::class;
	protected ?string $apiDocs         = 'https://developers.soundcloud.com/';
	protected ?string $applicationURL  = 'https://soundcloud.com/you/apps';
	protected string $authMethodHeader = 'OAuth';

	protected array $defaultScopes     = [
		self::SCOPE_NONEXPIRING,
	];

}
