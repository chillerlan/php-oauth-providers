<?php
/**
 * Class GitLabV4Endpoints
 *
 * @filesource   GitLabV4Endpoints.php
 * @created      29.07.2019
 * @package      chillerlan\OAuth\Providers\GitLab
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\GitLab;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://docs.gitlab.com/ee/api/README.html
 */
class GitLabV4Endpoints extends EndpointMap{

	protected $API_BASE = '/v4';

	protected $me = [
		'path'          => '/user',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
