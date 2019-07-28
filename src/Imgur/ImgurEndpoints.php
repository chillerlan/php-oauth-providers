<?php
/**
 * Class ImgurEndpoints
 *
 * @filesource   ImgurEndpoints.php
 * @created      28.07.2019
 * @package      chillerlan\OAuth\Providers\Imgur
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Imgur;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 */
class ImgurEndpoints extends EndpointMap{

	protected $me = [
		'path'          => '/3/account/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];
/*
	protected $x = [
		'path'          => '',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];
*/
}