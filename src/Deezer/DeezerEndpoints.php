<?php
/**
 * Class DeezerEndpoints
 *
 * @filesource   DeezerEndpoints.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Deezer
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Deezer;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://developers.deezer.com/api/
 */
class DeezerEndpoints extends EndpointMap{

	protected $me = [
		'path'          => '/user/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
