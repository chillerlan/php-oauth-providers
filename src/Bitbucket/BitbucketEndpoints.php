<?php
/**
 * Class BitbucketEndpoints
 *
 * @filesource   BitbucketEndpoints.php
 * @created      29.07.2019
 * @package      chillerlan\OAuth\Providers\Bitbucket
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Bitbucket;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 */
class BitbucketEndpoints extends EndpointMap{

	protected string $API_BASE = '/2.0';

	protected array $me = [
		'path'          => '/user',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
