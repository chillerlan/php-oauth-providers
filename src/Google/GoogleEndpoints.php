<?php
/**
 * Class GoogleEndpoints
 *
 * @filesource   GoogleEndpoints.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Google
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Google;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 */
class GoogleEndpoints extends EndpointMap{

	protected $me = [
		'path'          => '/userinfo/v2/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
