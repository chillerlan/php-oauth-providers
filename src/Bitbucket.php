<?php
/**
 * Class Bitbucket
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://developer.atlassian.com/cloud/bitbucket/oauth-2/
 */
class Bitbucket extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	protected string  $authURL        = 'https://bitbucket.org/site/oauth2/authorize';
	protected string  $accessTokenURL = 'https://bitbucket.org/site/oauth2/access_token';
	protected string  $apiURL         = 'https://api.bitbucket.org/2.0';
	protected ?string $apiDocs        = 'https://developer.atlassian.com/bitbucket/api/2/reference/';
	protected ?string $applicationURL = 'https://developer.atlassian.com/apps/';

}
