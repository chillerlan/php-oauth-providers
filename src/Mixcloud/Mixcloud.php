<?php
/**
 * Class Mixcloud
 *
 * @link https://www.mixcloud.com/developers/
 *
 * @created      28.10.2017
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

	protected string $authURL         = 'https://www.mixcloud.com/oauth/authorize';
	protected string $accessTokenURL  = 'https://www.mixcloud.com/oauth/access_token';
	protected ?string $apiURL         = 'https://api.mixcloud.com';
	protected ?string $userRevokeURL  = 'https://www.mixcloud.com/settings/applications/';
	protected ?string $endpointMap    = MixcloudEndpoints::class;
	protected ?string $apiDocs        = 'https://www.mixcloud.com/developers/';
	protected ?string $applicationURL = 'https://www.mixcloud.com/developers/create/';
	protected int $authMethod         = self::AUTH_METHOD_QUERY;

}
