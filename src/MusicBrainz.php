<?php
/**
 * Class MusicBrainz
 *
 * @created      31.07.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\OAuth\Core\{AccessToken, CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use chillerlan\HTTP\Utils\QueryUtil;
use Psr\Http\Message\ResponseInterface;

use Psr\Http\Message\StreamInterface;
use function date, explode, in_array, sprintf, strtoupper;

use const PHP_QUERY_RFC1738;

/**
 * @see https://musicbrainz.org/doc/Development
 * @see https://musicbrainz.org/doc/Development/OAuth2
 */
class MusicBrainz extends OAuth2Provider implements CSRFToken, TokenRefresh{

	const SCOPE_PROFILE               = 'profile';
	const SCOPE_EMAIL                 = 'email';
	const SCOPE_TAG                   = 'tag';
	const SCOPE_RATING                = 'rating';
	const SCOPE_COLLECTION            = 'collection';
	const SCOPE_SUBMIT_ISRC           = 'submit_isrc';
	const SCOPE_SUBMIT_BARCODE        = 'submit_barcode';

	protected string  $authURL        = 'https://musicbrainz.org/oauth2/authorize';
	protected string  $accessTokenURL = 'https://musicbrainz.org/oauth2/token';
	protected string  $apiURL         = 'https://musicbrainz.org/ws/2';
	protected ?string $userRevokeURL  = 'https://musicbrainz.org/account/applications';
	protected ?string $apiDocs        = 'https://musicbrainz.org/doc/Development';
	protected ?string $applicationURL = 'https://musicbrainz.org/account/applications';

	protected array   $defaultScopes  = [
		self::SCOPE_PROFILE,
		self::SCOPE_EMAIL,
		self::SCOPE_TAG,
		self::SCOPE_RATING,
		self::SCOPE_COLLECTION,
	];

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function refreshAccessToken(AccessToken $token = null):AccessToken{

		if($token === null){
			$token = $this->storage->getAccessToken($this->serviceName);
		}

		$refreshToken = $token->refreshToken;

		if(empty($refreshToken)){
			throw new ProviderException(
				sprintf('no refresh token available, token expired [%s]', date('Y-m-d h:i:s A', $token->expires))
			);
		}

		$body = [
			'client_id'     => $this->options->key,
			'client_secret' => $this->options->secret,
			'grant_type'    => 'refresh_token',
			'refresh_token' => $refreshToken,
		];

		$request = $this->requestFactory
			->createRequest('POST', $this->refreshTokenURL ?? $this->accessTokenURL) // refreshTokenURL is used in tests
			->withHeader('Content-Type', 'application/x-www-form-urlencoded')
			->withHeader('Accept-Encoding', 'identity')
			->withBody($this->streamFactory->createStream(QueryUtil::build($body, PHP_QUERY_RFC1738)))
		;

		$newToken = $this->parseTokenResponse($this->http->sendRequest($request));

		if(empty($newToken->refreshToken)){
			$newToken->refreshToken = $refreshToken;
		}

		$this->storage->storeAccessToken($newToken, $this->serviceName);

		return $newToken;
	}

	/**
	 * @inheritDoc
	 */
	public function request(
		string $path,
		array $params = null,
		string $method = null,
		StreamInterface|array|string $body = null,
		array $headers = null
	):ResponseInterface{
		$params = $params ?? [];
		$method = strtoupper($method ?? 'GET');
		$token  = $this->storage->getAccessToken($this->serviceName);

		if($token->isExpired()){
			$this->refreshAccessToken($token);
		}

		if(!isset($params['fmt'])){
			$params['fmt'] = 'json';
		}

		if(in_array($method, ['POST', 'PUT', 'DELETE']) && !isset($params['client'])){
			$params['client'] = $this->options->user_agent; // @codeCoverageIgnore
		}

		return parent::request(explode('?', $path)[0], $params, $method, $body, $headers);
	}

}
