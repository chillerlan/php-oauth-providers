<?php
/**
 * Class TwitterCC
 *
 * @created      08.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\OAuth\Core\{ClientCredentials, OAuth2Provider, ProviderException, AccessToken};
use Psr\Http\Message\UriInterface;

/**
 * @todo: twitter is dead. fuck elon musk.
 *
 * @see https://dev.twitter.com/overview/api
 * @see https://developer.twitter.com/en/docs/basics/authentication/overview/application-only
 *
 * @todo: https://developer.twitter.com/en/docs/basics/authentication/api-reference/invalidate_token
 */
class TwitterCC extends OAuth2Provider implements ClientCredentials{

	protected const AUTH_ERRMSG                  = 'TwitterCC only supports Client Credentials Grant, use the Twitter OAuth1 class for authentication instead.';

	protected string $apiURL                     = 'https://api.twitter.com';
	protected ?string $clientCredentialsTokenURL = 'https://api.twitter.com/oauth2/token';
	protected ?string $userRevokeURL             = 'https://twitter.com/settings/applications';
	protected ?string $apiDocs                   = 'https://developer.twitter.com/en/docs/basics/authentication/overview/application-only';
	protected ?string $applicationURL            = 'https://developer.twitter.com/apps';

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function getAuthURL(array $params = null, array $scopes = null):UriInterface{
		throw new ProviderException($this::AUTH_ERRMSG);
	}

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function getAccessToken(string $code, string $state = null):AccessToken{
		throw new ProviderException($this::AUTH_ERRMSG);
	}

}
