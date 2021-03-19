<?php
/**
 * Class MicrosoftGraphEndpoints
 *
 * @created      30.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Microsoft;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://docs.microsoft.com/en-us/graph/api/overview?view=graph-rest-1.0
 */
class MicrosoftGraphEndpoints extends EndpointMap{

	protected string $API_BASE = '/v1.0';

	protected array $me = [
		'path'          => '/me',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
