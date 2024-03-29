<?php
/**
 * Class Mastodon
 *
 * @created      19.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\{MessageUtil, QueryUtil};
use chillerlan\OAuth\Core\{AccessToken, CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use chillerlan\OAuth\OAuthException;
use Psr\Http\Message\ResponseInterface;
use function array_merge, sprintf;
use const PHP_QUERY_RFC1738;

/**
 * @see https://docs.joinmastodon.org/client/intro/
 * @see https://docs.joinmastodon.org/methods/apps/oauth/
 */
class Mastodon extends OAuth2Provider implements CSRFToken, TokenRefresh{

	public const SCOPE_READ   = 'read';
	public const SCOPE_WRITE  = 'write';
	public const SCOPE_FOLLOW = 'follow';
	public const SCOPE_PUSH   = 'push';

	protected string|null $apiDocs = 'https://docs.joinmastodon.org/api/';

	protected array $defaultScopes = [
		self::SCOPE_READ,
		self::SCOPE_FOLLOW,
	];

	protected string $instance = '';

	/**
	 * set the internal URLs for the given Mastodon instance
	 *
	 * @throws \chillerlan\OAuth\OAuthException
	 */
	public function setInstance(string $instance):static{
		$instance = $this->uriFactory->createUri($instance)->withPath('')->withQuery('')->withFragment('');

		if($instance->getHost() === ''){
			throw new OAuthException('invalid instance URL');
		}

		// @todo: check if host exists/responds
		$this->instance       = (string)$instance;
		$this->apiURL         = (string)$instance->withPath('/api');
		$this->authURL        = (string)$instance->withPath('/oauth/authorize');
		$this->accessTokenURL = (string)$instance->withPath('/oauth/token');
		$this->userRevokeURL  = (string)$instance->withPath('/oauth/authorized_applications');
		$this->applicationURL = (string)$instance->withPath('/settings/applications');

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getAccessToken(string $code, string|null $state = null):AccessToken{

		$body = [
			'client_id'     => $this->options->key,
			'client_secret' => $this->options->secret,
			'code'          => $code,
			'grant_type'    => 'authorization_code',
			'redirect_uri'  => $this->options->callbackURL,
		];

		$request = $this->requestFactory
			->createRequest('POST', $this->accessTokenURL)
			->withHeader('Content-Type', 'application/x-www-form-urlencoded')
			->withHeader('Accept-Encoding', 'identity')
			->withBody($this->streamFactory->createStream(QueryUtil::build($body, PHP_QUERY_RFC1738)));

		$token = $this->parseTokenResponse($this->http->sendRequest($request));
		// store the instance the token belongs to
		$token->extraParams = array_merge($token->extraParams, ['instance' => $this->instance]);

		$this->storage->storeAccessToken($token, $this->serviceName);

		return $token;
	}

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/v1/accounts/verify_credentials');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->error)){
			throw new ProviderException($json->error);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
