<?php
/**
 * Class NPROne
 *
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\HTTP\Utils\QueryUtil;
use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\{RequestInterface, ResponseInterface};
use function sprintf;
use function str_contains;

/**
 * @see https://dev.npr.org
 * @see https://github.com/npr/npr-one-backend-proxy-php
 */
class NPROne extends OAuth2Provider implements CSRFToken, TokenRefresh{

	public const SCOPE_IDENTITY_READONLY  = 'identity.readonly';
	public const SCOPE_IDENTITY_WRITE     = 'identity.write';
	public const SCOPE_LISTENING_READONLY = 'listening.readonly';
	public const SCOPE_LISTENING_WRITE    = 'listening.write';
	public const SCOPE_LOCALACTIVATION    = 'localactivation';

	protected string  $authURL            = 'https://authorization.api.npr.org/v2/authorize';
	protected string  $accessTokenURL     = 'https://authorization.api.npr.org/v2/token';
	protected ?string $revokeURL          = 'https://authorization.api.npr.org/v2/token/revoke';
	protected ?string $apiDocs            = 'https://dev.npr.org/api/';
	protected ?string $applicationURL     = 'https://dev.npr.org/console';

	protected array   $defaultScopes      = [
		self::SCOPE_IDENTITY_READONLY,
		self::SCOPE_LISTENING_READONLY,
	];

	/**
	 * @inheritDoc
	 */
	protected function getRequestTarget(string $uri):string{
		$parsedURL = QueryUtil::parseUrl($uri);

		if(!isset($parsedURL['path'])){
			throw new ProviderException('invalid path'); // @codeCoverageIgnore
		}

		// for some reason we were given a host name
		if(isset($parsedURL['host'])){

			// back out if it doesn't match
			if(!str_contains($parsedURL['host'], '.api.npr.org')){
				throw new ProviderException('given host does not match provider host'); // @codeCoverageIgnore
			}

			// we explicitly ignore any existing parameters here
			return 'https://'.$parsedURL['host'].$parsedURL['path'];
		}

		// $apiURL may already include a part of the path
		return $this->apiURL.$parsedURL['path'];
	}

	/**
	 * @inheritDoc
	 */
	public function sendRequest(RequestInterface $request):ResponseInterface{

		// get authorization only if we request the provider API
		if(str_contains((string)$request->getUri(), '.api.npr.org')){
			$token = $this->storage->getAccessToken($this->serviceName);

			// attempt to refresh an expired token
			if(
				$this->options->tokenAutoRefresh
				&& ($token->isExpired() || $token->expires === $token::EOL_UNKNOWN)
			){
				$token = $this->refreshAccessToken($token); // @codeCoverageIgnore
			}

			$request = $this->getRequestAuthorization($request, $token);
		}

		return $this->http->sendRequest($request);
	}

}
