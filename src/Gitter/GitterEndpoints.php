<?php
/**
 * Class GitterEndpoints
 *
 * @filesource   GitterEndpoints.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Gitter
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Gitter;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://developer.gitter.im/docs/rest-api
 */
class GitterEndpoints extends EndpointMap{

	protected $me = [
		'path'          => '/user/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
