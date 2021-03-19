<?php
/**
 * Class GitterEndpoints
 *
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Gitter;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://developer.gitter.im/docs/rest-api
 */
class GitterEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/user/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
