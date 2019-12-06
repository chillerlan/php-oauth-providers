<?php
/**
 * Class DeviantArtEndpoints
 *
 * @filesource   DeviantArtEndpoints.php
 * @created      21.04.2018
 * @package      chillerlan\OAuth\Providers\DeviantArt
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\DeviantArt;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://www.deviantart.com/developers/http/v1/20160316
 */
class DeviantArtEndpoints extends EndpointMap{

	protected array $whoami = [
		'path'          => '/user/whoami',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
