<?php
/**
 * Class GitHubEndpoints
 *
 * @link https://developer.github.com/v3/
 *
 * @filesource   GitHubEndpoints.php
 * @created      12.04.2018
 * @package      chillerlan\OAuth\Providers\GitHub
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\GitHub;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @todo
 */
class GitHubEndpoints extends EndpointMap{

	/**
	 * @link https://developer.github.com/v3/users/#get-the-authenticated-user
	 */
	protected array $me = [
		'path'          => '/user',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.github.com/v3/users/#get-a-single-user
	 */
	protected array $getUser = [
		'path'          => '/users/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

}
