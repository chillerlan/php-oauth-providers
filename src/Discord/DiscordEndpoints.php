<?php
/**
 * Class DiscordEndpoints
 *
 * @created      20.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Discord;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://discordapp.com/developers/docs/intro
 * @todo
 */
class DiscordEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/users/@me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
