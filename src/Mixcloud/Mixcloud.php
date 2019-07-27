<?php
/**
 * Class Mixcloud
 *
 * @link https://www.mixcloud.com/developers/
 *
 * @filesource   Mixcloud.php
 * @created      28.10.2017
 * @package      chillerlan\OAuth\Providers\Mixcloud
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Mixcloud;

use chillerlan\OAuth\Core\OAuth2Provider;

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 * @method \Psr\Http\Message\ResponseInterface user(string $username)
 */
class Mixcloud extends OAuth2Provider{

	protected $apiURL         = 'https://api.mixcloud.com';
	protected $authURL        = 'https://www.mixcloud.com/oauth/authorize';
	protected $accessTokenURL = 'https://www.mixcloud.com/oauth/access_token';
	protected $userRevokeURL  = 'https://www.mixcloud.com/settings/applications/';
	protected $authMethod     = self::QUERY_ACCESS_TOKEN;
	protected $endpointMap    = MixcloudEndpoints::class;

}
