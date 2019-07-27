<?php
/**
 * Class OpenStreetmap
 *
 * @link https://wiki.openstreetmap.org/wiki/API
 * @link https://wiki.openstreetmap.org/wiki/OAuth
 *
 * @filesource   OpenStreetmap.php
 * @created      12.05.2019
 * @package      chillerlan\OAuth\Providers\OpenStreetmap
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

	protected $apiURL          = 'https://api.openstreetmap.org';
	protected $requestTokenURL = 'https://www.openstreetmap.org/oauth/request_token';
	protected $authURL         = 'https://www.openstreetmap.org/oauth/authorize';
	protected $accessTokenURL  = 'https://www.openstreetmap.org/oauth/access_token';
	protected $endpointMap     = OpenStreetmapEndpoints::class;
	protected $apiDocs         = 'https://wiki.openstreetmap.org/wiki/API';
	protected $applicationURL  = 'https://www.openstreetmap.org/user/{USERNAME}/oauth_clients';

}
