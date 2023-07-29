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

use chillerlan\HTTP\Utils\{MessageUtil, QueryUtil};
use chillerlan\OAuth\Core\{AccessToken, CSRFToken, OAuth2Provider, ProviderException, TokenInvalidate, TokenRefresh};
use Psr\Http\Message\{RequestInterface, ResponseInterface};
use function sprintf, str_contains;

/**
 * @see https://dev.npr.org
 * @see https://github.com/npr/npr-one-backend-proxy-php
 */
class NPROne extends OAuth2Provider implements CSRFToken, TokenRefresh, TokenInvalidate{

	public const SCOPE_IDENTITY_READONLY  = 'identity.readonly';
	public const SCOPE_IDENTITY_WRITE     = 'identity.write';
	public const SCOPE_LISTENING_READONLY = 'listening.readonly';
	public const SCOPE_LISTENING_WRITE    = 'listening.write';
	public const SCOPE_LOCALACTIVATION    = 'localactivation';

	protected string  $authURL            = 'https://authorization.api.npr.org/v2/authorize';
	protected string  $accessTokenURL     = 'https://authorization.api.npr.org/v2/token';
	protected string  $revokeURL          = 'https://authorization.api.npr.org/v2/token/revoke';
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
			if($this->options->tokenAutoRefresh && ($token->isExpired() || $token->expires === $token::EOL_UNKNOWN)){
				$token = $this->refreshAccessToken($token); // @codeCoverageIgnore
			}

			$request = $this->getRequestAuthorization($request, $token);
		}

		return $this->http->sendRequest($request);
	}

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('https://identity.api.npr.org/v2/user');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->errors)){
			throw new ProviderException($json->errors[0]->text);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

	/**
	 * @inheritDoc
	 */
	public function invalidateAccessToken(AccessToken $token = null):bool{

		if($token === null && !$this->storage->hasAccessToken()){
			throw new ProviderException('no token given');
		}

		$token ??= $this->storage->getAccessToken();

		$response = $this->request(
			path: $this->revokeURL,
			method: 'POST',
			body: [
				'token'           => $token->accessToken,
				'token_type_hint' => 'access_token',
			],
			headers: ['Content-Type' => 'application/x-www-form-urlencoded']
		);

		if($response->getStatusCode() === 200){
			$this->storage->clearAccessToken();

			return true;
		}

		return false;
	}

}
