<?php
/**
 * Class Deezer
 *
 * @link https://developers.deezer.com/api/oauth
 *
 * sure, you *can* use different parameter names than the standard ones... and what about JSON?
 * https://xkcd.com/927/
 *
 * @filesource   Deezer.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Deezer
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Deezer;

use chillerlan\OAuth\Core\{AccessToken, CSRFToken, OAuth2Provider, ProviderException};
use Psr\Http\Message\{ResponseInterface, UriInterface};

use function array_merge, http_build_query, implode, is_array, parse_str;
use function chillerlan\HTTP\Psr7\{decompress_content, merge_query};

use const PHP_QUERY_RFC1738;

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Deezer extends OAuth2Provider implements CSRFToken{

	public const SCOPE_BASIC             = 'basic_access';
	public const SCOPE_EMAIL             = 'email';
	public const SCOPE_OFFLINE_ACCESS    = 'offline_access';
	public const SCOPE_MANAGE_LIBRARY    = 'manage_library';
	public const SCOPE_MANAGE_COMMUNITY  = 'manage_community';
	public const SCOPE_DELETE_LIBRARY    = 'delete_library';
	public const SCOPE_LISTENING_HISTORY = 'listening_history';

	protected $apiURL         = 'https://api.deezer.com';
	protected $authURL        = 'https://connect.deezer.com/oauth/auth.php';
	protected $accessTokenURL = 'https://connect.deezer.com/oauth/access_token.php';
	protected $userRevokeURL  = 'https://www.deezer.com/account/apps';
	protected $authMethod     = self::QUERY_ACCESS_TOKEN;
	protected $endpointMap    = DeezerEndpoints::class;
	protected $apiDocs        = 'https://developers.deezer.com/api';
	protected $applicationURL = 'http://developers.deezer.com/myapps';

	/**
	 * @inheritDoc
	 */
	public function getAuthURL(array $params = null, array $scopes = null):UriInterface{
		$params = $params ?? [];

		if(isset($params['client_secret'])){
			unset($params['client_secret']);
		}

		$params = array_merge($params, [
			'app_id'        => $this->options->key,
			'redirect_uri'  => $this->options->callbackURL,
			'perms'         => implode($this->scopesDelimiter, $scopes),
#			'response_type' => 'token', // -> token in hash fragment
		]);

		$params = $this->setState($params);

		return $this->uriFactory->createUri(merge_query($this->authURL, $params));
	}

	/**
	 * @inheritDoc
	 */
	public function getAccessToken(string $code, string $state = null):AccessToken{
		$this->checkState($state);

		$body = [
			'app_id' => $this->options->key,
			'secret' => $this->options->secret,
			'code'   => $code,
			'output' => 'json',
		];

		$request = $this->requestFactory
			->createRequest('POST', $this->accessTokenURL)
			->withHeader('Content-Type', 'application/x-www-form-urlencoded')
			->withHeader('Accept-Encoding', 'identity')
			->withBody($this->streamFactory->createStream(http_build_query($body, '', '&', PHP_QUERY_RFC1738)));

		$token = $this->parseTokenResponse($this->http->sendRequest($request));

		$this->storage->storeAccessToken($this->serviceName, $token);

		return $token;
	}

	/**
	 * @inheritDoc
	 */
	protected function parseTokenResponse(ResponseInterface $response):AccessToken{
		parse_str(decompress_content($response), $data);

		if(!is_array($data) || empty($data)){
			throw new ProviderException('unable to parse token response');
		}

		if(isset($data['error_reason'])){
			throw new ProviderException('error retrieving access token: "'.$data['error_reason'].'"');
		}

		if(!isset($data['access_token'])){
			throw new ProviderException('token missing');
		}

		$token = new AccessToken([
			'provider'     => $this->serviceName,
			'accessToken'  => $data['access_token'],
			'expires'      => $data['expires'] ?? $data['expires_in'] ?? AccessToken::EOL_NEVER_EXPIRES,
			'refreshToken' => $data['refresh_token'] ?? null,
		]);

		unset($data['expires'], $data['expires_in'], $data['refresh_token'], $data['access_token']);

		$token->extraParams = $data;

		return $token;
	}

}
