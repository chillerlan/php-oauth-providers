<?php
/**
 * Class OpenStreetmapEndpoints
 *
 * @filesource   OpenStreetmapEndpoints.php
 * @created      12.05.2019
 * @package      chillerlan\OAuth\Providers\OpenStreetmap
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\OpenStreetmap;

use chillerlan\HTTP\MagicAPI\EndpointMap;

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
