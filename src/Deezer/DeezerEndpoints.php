<?php
/**
 * Class DeezerEndpoints
 *
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Deezer;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://developers.deezer.com/api/
 */
class DeezerEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/user/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
