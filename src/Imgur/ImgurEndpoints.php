<?php
/**
 * Class ImgurEndpoints
 *
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Imgur;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 */
class ImgurEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/3/account/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
