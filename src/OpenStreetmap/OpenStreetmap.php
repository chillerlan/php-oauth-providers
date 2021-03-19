<?php
/**
 * Class OpenStreetmap
 *
 * @link https://wiki.openstreetmap.org/wiki/API
 * @link https://wiki.openstreetmap.org/wiki/OAuth
 *
 * @created      12.05.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\OpenStreetmap;

use chillerlan\OAuth\Core\OAuth1Provider;

/**
 * @method \Psr\Http\Message\ResponseInterface userDetails()
 */
class OpenStreetmap extends OAuth1Provider{

	protected string $requestTokenURL = 'https://www.openstreetmap.org/oauth/request_token';
	protected string $authURL         = 'https://www.openstreetmap.org/oauth/authorize';
	protected string $accessTokenURL  = 'https://www.openstreetmap.org/oauth/access_token';
	protected ?string $apiURL         = 'https://api.openstreetmap.org';
	protected ?string $endpointMap    = OpenStreetmapEndpoints::class;
	protected ?string $apiDocs        = 'https://wiki.openstreetmap.org/wiki/API';
	protected ?string $applicationURL = 'https://www.openstreetmap.org/user/{USERNAME}/oauth_clients';

}
