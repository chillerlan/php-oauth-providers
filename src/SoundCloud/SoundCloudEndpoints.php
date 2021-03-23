<?php
/**
 * Class SoundCloudEndpoints (auto created)
 *
 * @link    https://developers.soundcloud.com/docs/api/explorer/open-api
 * @created 23.03.2021
 * @license MIT
 */

namespace chillerlan\OAuth\Providers\SoundCloud;

use chillerlan\OAuth\MagicAPI\EndpointMap;

class SoundCloudEndpoints extends EndpointMap{

	/**
	 * Returns the authenticated user’s information.
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
	 * Returns the authenticated user's activities.
	 */
	protected array $meActivities = [
		'method'        => 'GET',
		'path'          => '/me/activities',
		'path_elements' => null,
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Recent the authenticated user's activities.
	 */
	protected array $meActivitiesAllOwn = [
		'method'        => 'GET',
		'path'          => '/me/activities/all/own',
		'path_elements' => null,
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns the authenticated user's recent track related activities.
	 */
	protected array $meActivitiesTracks = [
		'method'        => 'GET',
		'path'          => '/me/activities/tracks',
		'path_elements' => null,
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of the authenticated user's connected social accounts.
	 */
	protected array $meConnections = [
		'method'        => 'GET',
		'path'          => '/me/connections',
		'path_elements' => null,
		'query'         => ['limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns the authenticated user's connected social account.
	 */
	protected array $meConnectionsConnectionId = [
		'method'        => 'GET',
		'path'          => '/me/connections/%1$s',
		'path_elements' => ['connection_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of favorited or liked tracks of the authenticated user.
	 */
	protected array $meLikesTracks = [
		'method'        => 'GET',
		'path'          => '/me/likes/tracks',
		'path_elements' => null,
		'query'         => ['limit', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns user’s favorites ids. (use /me/likes/tracks instead to fetch the authenticated user's likes)
	 */
	protected array $meFavoritesIds = [
		'method'        => 'GET',
		'path'          => '/me/favorites/ids',
		'path_elements' => null,
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of users who are followed by the authenticated user.
	 */
	protected array $meFollowings = [
		'method'        => 'GET',
		'path'          => '/me/followings',
		'path_elements' => null,
		'query'         => ['limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of recent tracks from users followed by the authenticated user.
	 */
	protected array $meFollowingsTracks = [
		'method'        => 'GET',
		'path'          => '/me/followings/tracks',
		'path_elements' => null,
		'query'         => ['limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a user who is followed by the authenticated user. (use /users/{user_id} instead, to fetch the user details)
	 */
	protected array $meFollowingsUserId = [
		'method'        => 'GET',
		'path'          => '/me/followings/%1$s',
		'path_elements' => ['user_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Follows a user.
	 */
	protected array $meFollowingsUserIdUpdate = [
		'method'        => 'PUT',
		'path'          => '/me/followings/%1$s',
		'path_elements' => ['user_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Deletes a user who is followed by the authenticated user.
	 */
	protected array $meFollowingsUserIdDelete = [
		'method'        => 'DELETE',
		'path'          => '/me/followings/%1$s',
		'path_elements' => ['user_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of users who are following the authenticated user.
	 */
	protected array $meFollowers = [
		'method'        => 'GET',
		'path'          => '/me/followers',
		'path_elements' => null,
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a user who is following the authenticated user. (use /users/{user_id} instead, to fetch the user details)
	 */
	protected array $meFollowersFollowerId = [
		'method'        => 'GET',
		'path'          => '/me/followers/%1$s',
		'path_elements' => ['follower_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns user’s playlists (sets).
	 */
	protected array $mePlaylists = [
		'method'        => 'GET',
		'path'          => '/me/playlists',
		'path_elements' => null,
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns playlist. (use /playlists/{playlist_id} instead, to fetch the playlist details)
	 */
	protected array $mePlaylistsPlaylistId = [
		'method'        => 'GET',
		'path'          => '/me/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of user's tracks.
	 */
	protected array $meTracks = [
		'method'        => 'GET',
		'path'          => '/me/tracks',
		'path_elements' => null,
		'query'         => ['limit', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a specified track. (use /tracks/{track_id} instead, to fetch the track details)
	 */
	protected array $meTracksTrackId = [
		'method'        => 'GET',
		'path'          => '/me/tracks/%1$s',
		'path_elements' => ['track_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of the authenticated user's links added to their profile. (use /users/{user_id}/web-profiles instead)
	 */
	protected array $meWebProfiles = [
		'method'        => 'GET',
		'path'          => '/me/web-profiles',
		'path_elements' => null,
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Performs a track search based on a query
	 */
	protected array $tracks = [
		'method'        => 'GET',
		'path'          => '/tracks',
		'path_elements' => null,
		'query'         => ['q', 'ids', 'genres', 'tags', 'bpm', 'duration', 'created_at', 'limit', 'offset', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Uploads a new track.
	 */
	protected array $tracksCreate = [
		'method'        => 'POST',
		'path'          => '/tracks',
		'path_elements' => null,
		'query'         => null,
		'body'          => ['track[title]', 'track[asset_data]', 'track[permalink]', 'track[sharing]', 'track[embeddable_by]', 'track[purchase_url]', 'track[description]', 'track[genre]', 'track[tag_list]', 'track[label_name]', 'track[release]', 'track[release_date]', 'track[streamable]', 'track[downloadable]', 'track[license]', 'track[commentable]', 'track[isrc]', 'track[artwork_data]'],
		'headers'       => ['Content-Type' => 'multipart/x-www-form-urlencoded'],
	];

	/**
	 * Performs a playlist search based on a query
	 */
	protected array $playlists = [
		'method'        => 'GET',
		'path'          => '/playlists',
		'path_elements' => null,
		'query'         => ['q', 'limit', 'offset', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Creates a playlist.
	 */
	protected array $playlistsCreate = [
		'method'        => 'POST',
		'path'          => '/playlists',
		'path_elements' => null,
		'query'         => null,
		'body'          => ['playlist'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Performs a user search based on a query
	 */
	protected array $users = [
		'method'        => 'GET',
		'path'          => '/users',
		'path_elements' => null,
		'query'         => ['q', 'ids', 'limit', 'offset', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a playlist.
	 */
	protected array $playlistsPlaylistId = [
		'method'        => 'GET',
		'path'          => '/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => ['secret_token'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Updates a playlist.
	 */
	protected array $playlistsPlaylistIdUpdate = [
		'method'        => 'PUT',
		'path'          => '/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => ['playlist'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Deletes a playlist.
	 */
	protected array $playlistsPlaylistIdDelete = [
		'method'        => 'DELETE',
		'path'          => '/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns tracks under a playlist.
	 */
	protected array $playlistsPlaylistIdTracks = [
		'method'        => 'GET',
		'path'          => '/playlists/%1$s/tracks',
		'path_elements' => ['playlist_id'],
		'query'         => ['secret_token', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a track.
	 */
	protected array $tracksTrackId = [
		'method'        => 'GET',
		'path'          => '/tracks/%1$s',
		'path_elements' => ['track_id'],
		'query'         => ['secret_token'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Updates a track's information.
	 */
	protected array $tracksTrackIdUpdate = [
		'method'        => 'PUT',
		'path'          => '/tracks/%1$s',
		'path_elements' => ['track_id'],
		'query'         => null,
		'body'          => ['track'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * Deletes a track.
	 */
	protected array $tracksTrackIdDelete = [
		'method'        => 'DELETE',
		'path'          => '/tracks/%1$s',
		'path_elements' => ['track_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a track's streamable URLs
	 */
	protected array $tracksTrackIdStreams = [
		'method'        => 'GET',
		'path'          => '/tracks/%1$s/streams',
		'path_elements' => ['track_id'],
		'query'         => ['secret_token'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns the comments posted on the track(track_id).
	 */
	protected array $tracksTrackIdComments = [
		'method'        => 'GET',
		'path'          => '/tracks/%1$s/comments',
		'path_elements' => ['track_id'],
		'query'         => ['limit', 'offset', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns the newly created comment on success
	 */
	protected array $tracksTrackIdCommentsCreate = [
		'method'        => 'POST',
		'path'          => '/tracks/%1$s/comments',
		'path_elements' => ['track_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of users who have favorited or liked the track.
	 */
	protected array $tracksTrackIdFavoriters = [
		'method'        => 'GET',
		'path'          => '/tracks/%1$s/favoriters',
		'path_elements' => ['track_id'],
		'query'         => ['limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns all related tracks of track on SoundCloud.
	 */
	protected array $tracksTrackIdRelated = [
		'method'        => 'GET',
		'path'          => '/tracks/%1$s/related',
		'path_elements' => ['track_id'],
		'query'         => ['limit', 'offset', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Resolves soundcloud.com URLs to Resource URLs to use with the API.
	 */
	protected array $resolve = [
		'method'        => 'GET',
		'path'          => '/resolve',
		'path_elements' => null,
		'query'         => ['url'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a user.
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
	 * Returns a list of user's comments.
	 */
	protected array $usersUserIdComments = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/comments',
		'path_elements' => ['user_id'],
		'query'         => ['limit', 'offset'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of user's favorited or liked tracks. (use /users/:userId/likes/tracks instead, to fetch a user's likes)
	 */
	protected array $usersUserIdFavorites = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/favorites',
		'path_elements' => ['user_id'],
		'query'         => ['limit', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of user’s followers.
	 */
	protected array $usersUserIdFollowers = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/followers',
		'path_elements' => ['user_id'],
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a user's follower. (use /users/{user_id} instead, to fetch the user details)
	 */
	protected array $usersUserIdFollowersFollowerId = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/followers/%2$s',
		'path_elements' => ['user_id', 'follower_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of user’s followings.
	 */
	protected array $usersUserIdFollowings = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/followings',
		'path_elements' => ['user_id'],
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a user's following. (use /users/{user_id} instead, to fetch the user details)
	 */
	protected array $usersUserIdFollowingsFollowingId = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/followings/%2$s',
		'path_elements' => ['user_id', 'following_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of user's playlists.
	 */
	protected array $usersUserIdPlaylists = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/playlists',
		'path_elements' => ['user_id'],
		'query'         => ['limit', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of user's tracks.
	 */
	protected array $usersUserIdTracks = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/tracks',
		'path_elements' => ['user_id'],
		'query'         => ['limit', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns list of user's links added to their profile (website, facebook, instagram).
	 */
	protected array $usersUserIdWebProfiles = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/web-profiles',
		'path_elements' => ['user_id'],
		'query'         => ['limit'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Returns a list of user's liked tracks.
	 */
	protected array $usersUserIdLikesTracks = [
		'method'        => 'GET',
		'path'          => '/users/%1$s/likes/tracks',
		'path_elements' => ['user_id'],
		'query'         => ['limit', 'linked_partitioning'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Likes a track.
	 */
	protected array $likesTracksTrackIdCreate = [
		'method'        => 'POST',
		'path'          => '/likes/tracks/%1$s',
		'path_elements' => ['track_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Unlikes a track.
	 */
	protected array $likesTracksTrackIdDelete = [
		'method'        => 'DELETE',
		'path'          => '/likes/tracks/%1$s',
		'path_elements' => ['track_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Likes a playlist.
	 */
	protected array $likesPlaylistsPlaylistIdCreate = [
		'method'        => 'POST',
		'path'          => '/likes/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Unlikes a playlist.
	 */
	protected array $likesPlaylistsPlaylistIdDelete = [
		'method'        => 'DELETE',
		'path'          => '/likes/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Reposts a track as the authenticated user
	 */
	protected array $repostsTracksTrackIdCreate = [
		'method'        => 'POST',
		'path'          => '/reposts/tracks/%1$s',
		'path_elements' => ['track_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Removes a repost on a track as the authenticated user
	 */
	protected array $repostsTracksTrackIdDelete = [
		'method'        => 'DELETE',
		'path'          => '/reposts/tracks/%1$s',
		'path_elements' => ['track_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Reposts a playlist as the authenticated user
	 */
	protected array $repostsPlaylistsPlaylistIdCreate = [
		'method'        => 'POST',
		'path'          => '/reposts/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * Removes a repost on a playlist as the authenticated user
	 */
	protected array $repostsPlaylistsPlaylistIdDelete = [
		'method'        => 'DELETE',
		'path'          => '/reposts/playlists/%1$s',
		'path_elements' => ['playlist_id'],
		'query'         => null,
		'body'          => null,
		'headers'       => null,
	];

}
