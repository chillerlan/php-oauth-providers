<?php
/**
 * Class OpenStreetmapEndpoints
 *
 * @created      12.05.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\OpenStreetmap;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 */
class OpenStreetmapEndpoints extends EndpointMap{

	protected string $API_BASE = '/api/0.6';

	protected array $userDetails = [
		'path'          => '/user/details',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
