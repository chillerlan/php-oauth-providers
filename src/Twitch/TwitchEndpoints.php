<?php
/**
 * Class TwitchEndpoints
 *
 * @created      20.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitch;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://dev.twitch.tv/docs/api/reference/
 */
class TwitchEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/users',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $user = [
		'path'          => '/users/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

}
