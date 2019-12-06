<?php
/**
 * Class FoursquareEndpoints
 *
 * @filesource   FoursquareEndpoints.php
 * @created      10.08.2018
 * @package      chillerlan\OAuth\Providers\Foursquare
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Foursquare;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://developer.foursquare.com/docs
 */
class FoursquareEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/users/self',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
