<?php
/**
 * Class TwitchEndpoints
 *
 * @filesource   TwitchEndpoints.php
 * @created      20.04.2018
 * @package      chillerlan\OAuth\Providers\Twitch
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitch;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://dev.twitch.tv/docs/api/reference/
 */
class TwitchEndpoints extends EndpointMap{

	protected $me = [
		'path'          => '/user',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $user = [
		'path'          => '/users/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

}
