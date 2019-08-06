<?php
/**
 * Class Bitbucket
 *
 * @link https://developer.atlassian.com/cloud/bitbucket/oauth-2/
 *
 *
 * @filesource   Bitbucket.php
 * @created      29.07.2019
 * @package      chillerlan\OAuth\Providers\Bitbucket
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Bitbucket;

use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, TokenRefresh};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Bitbucket extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	protected $apiURL         = 'https://api.bitbucket.org';
	protected $authURL        = 'https://bitbucket.org/site/oauth2/authorize';
	protected $accessTokenURL = 'https://bitbucket.org/site/oauth2/access_token';
	protected $endpointMap    = BitbucketEndpoints::class;
	protected $apiDocs        = 'https://developer.atlassian.com/bitbucket/api/2/reference/';
	protected $applicationURL = 'https://developer.atlassian.com/apps/';

}
