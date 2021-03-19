<?php
/**
 * Class GoogleEndpoints
 *
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Google;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 */
class GoogleEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/userinfo/v2/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
