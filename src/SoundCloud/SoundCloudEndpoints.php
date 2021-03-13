<?php
/**
 * Class SoundCloudEndpoints
 *
 * @filesource   SoundCloudEndpoints.php
 * @created      11.04.2018
 * @package      chillerlan\OAuth\Providers\SoundCloud
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\SoundCloud;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://developers.soundcloud.com/docs/api/guide
 *
 * @todo
 *
 *
 *
 * q    string    a string to search for (see search documentation)
 *
 * GET    /users/{id}    a user
 * GET    /users/{id}/tracks    list of tracks of the user
 * GET    /users/{id}/playlists    list of playlists (sets) of the user
 * GET    /users/{id}/followings    list of users who are followed by the user
 * GET, PUT, DELETE    /users/{id}/followings/{id}    a user who is followed by the user
 * GET    /users/{id}/followers    list of users who are following the user
 * GET    /users/{id}/followers/{id}    user who is following the user
 * GET    /users/{id}/comments    list of comments from this user
 * GET    /users/{id}/favorites    list of tracks favorited by the user
 * GET, PUT, DELETE    /users/{id}/favorites/{id}    track favorited by the user
 * GET, PUT, DELETE    /users/{id}/web-profiles    list of web profiles
 *
 * GET    /me/{id}/activities    list dashboard activities
 * GET, POST    /me/{id}/connections	list of connected external profiles
 * GET, POST	/me/connections
 * GET	/me/connections/{connection_id}
 * GET	/me/activities	Recent activities
 * GET	/me/activities/tracks/affiliated	Recent tracks from users the logged-in user follows
 * GET	/me/activities/tracks/exclusive	Recent exclusively shared tracks
 * GET	/me/activities/all/own	Recent activities on the logged-in users tracks
 *
 * GET, PUT, DELETE    /tracks/{id}    a track
 * GET    /tracks/{id}/comments    comments for the track
 * GET, PUT, DELETE    /tracks/{id}/comments/{comment-id}    a comment for the track
 * GET    /tracks/{id}/favoriters    users who favorited the track
 * GET    /tracks/{id}/favoriters/{user-id}    a user who has favorited to the track
 * GET, PUT    /tracks/{id}/secret-token    secret token of the track
 *
 * q    string    a string to search for (see search documentation)
 * tags    list    a comma separated list of tags
 * filter    enumeration    (all,public,private)
 * license    enumeration    Filter on license. (see license attribute)
 * bpm[from]    number    return tracks with at least this bpm value
 * bpm[to]    number    return tracks with at most this bpm value
 * duration[from]    number    return tracks with at least this duration (in millis)
 * duration[to]    number    return tracks with at most this duration (in millis)
 * created_at[from]    date    (yyyy-mm-dd hh:mm:ss) return tracks created at this date or later
 * created_at[to]    date    (yyyy-mm-dd hh:mm:ss) return tracks created at this date or earlier
 * ids    list    a comma separated list of track ids to filter on
 * genres    list    a comma separated list of genres
 * types    enumeration    a comma separated list of types
 *
 *
 */
class SoundCloudEndpoints extends EndpointMap{

	/**
	 * @link
	 */
	protected array $me = [
		'path'          => '/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $user = [
		'path'          => '/users/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => [],
	];

}
