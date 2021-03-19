<?php
/**
 * Class AmazonEndpoints
 *
 * @created      10.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Amazon;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 */
class AmazonEndpoints extends EndpointMap{

	protected array $userProfile = [
		'path'          => '/user/profile',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
