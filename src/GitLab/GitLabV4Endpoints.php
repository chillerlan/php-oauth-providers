<?php
/**
 * Class GitLabV4Endpoints
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\GitLab;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://docs.gitlab.com/ee/api/README.html
 */
class GitLabV4Endpoints extends EndpointMap{

	protected string $API_BASE = '/v4';

	protected array $me = [
		'path'          => '/user',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
