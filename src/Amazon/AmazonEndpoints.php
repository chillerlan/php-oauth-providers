<?php
/**
 * Class AmazonEndpoints
 *
 * @filesource   AmazonEndpoints.php
 * @created      10.08.2018
 * @package      chillerlan\OAuth\Providers\Amazon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Amazon;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 */
class AmazonEndpoints extends EndpointMap{

	protected $userProfile = [
		'path'          => '/user/profile',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
