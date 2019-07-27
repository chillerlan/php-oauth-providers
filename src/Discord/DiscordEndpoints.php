<?php
/**
 * Class DiscordEndpoints
 *
 * @filesource   DiscordEndpoints.php
 * @created      20.04.2018
 * @package      chillerlan\OAuth\Providers\Discord
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Discord;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://discordapp.com/developers/docs/intro
 * @todo
 */
class DiscordEndpoints extends EndpointMap{

	protected $me = [
		'path'          => '/users/@me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
