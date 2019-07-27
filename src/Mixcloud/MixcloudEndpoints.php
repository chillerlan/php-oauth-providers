<?php
/**
 * Class MixcloudEndpoints
 *
 * @filesource   MixcloudEndpoints.php
 * @created      20.04.2018
 * @package      chillerlan\OAuth\Providers\Mixcloud
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Mixcloud;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://www.mixcloud.com/developers/
 * @todo
 *
 * note: a missing slash at the end of the path will end up in a HTTP/301
 */
class MixcloudEndpoints extends EndpointMap{

	protected $me = [
		'path'          => '/me/',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $user = [
		'path'          => '/%1$s/',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

}
