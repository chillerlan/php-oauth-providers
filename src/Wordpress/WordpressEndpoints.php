<?php
/**
 * Class WordpressEndpoints
 *
 * @filesource   WordpressEndpoints.php
 * @created      21.04.2018
 * @package      chillerlan\OAuth\Providers\Wordpress
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Wordpress;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://developer.wordpress.com/docs/api/
 */
class WordpressEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
