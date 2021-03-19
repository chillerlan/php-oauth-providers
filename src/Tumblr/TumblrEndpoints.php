<?php
/**
 * Class TumblrEndpoints
 *
 * @created      22.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Tumblr;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://www.tumblr.com/docs/en/api/v2
 */
class TumblrEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/user/info',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
