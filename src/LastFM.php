<?php
/**
 * Class LastFM
 *
 * @created      10.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\{MessageUtil, QueryUtil};
use chillerlan\OAuth\Core\{AccessToken, OAuthProvider, ProviderException};
use Psr\Http\Message\{RequestInterface, ResponseInterface, StreamInterface, UriInterface};
use Throwable;
use function array_merge, in_array, is_array, ksort, md5, sprintf, trigger_error;
use const PHP_QUERY_RFC1738;

/**
 * @see https://www.last.fm/api/authentication
 */
class LastFM extends OAuthProvider{

	public const PERIOD_OVERALL = 'overall';
	public const PERIOD_7DAY    = '7day';
	public const PERIOD_1MONTH  = '1month';
	public const PERIOD_3MONTH  = '3month';
	public const PERIOD_6MONTH  = '6month';
	public const PERIOD_12MONTH = '12month';
	public const PERIODS        = [
		self::PERIOD_OVERALL,
		self::PERIOD_7DAY,
		self::PERIOD_1MONTH,
		self::PERIOD_3MONTH,
		self::PERIOD_6MONTH,
		self::PERIOD_12MONTH,
	];

	protected string  $authURL        = 'https://www.last.fm/api/auth';
	protected string  $apiURL         = 'https://ws.audioscrobbler.com/2.0';
	protected ?string $userRevokeURL  = 'https://www.last.fm/settings/applications';
	protected ?string $apiDocs        = 'https://www.last.fm/api/';
	protected ?string $applicationURL = 'https://www.last.fm/api/account/create';

	/**
	 * @inheritdoc
	 */
	public function getAuthURL(array $params = null):UriInterface{

		$params = array_merge($params ?? [], [
			'api_key' => $this->options->key,
		]);

		return $this->uriFactory->createUri(QueryUtil::merge($this->authURL, $params));
	}

	/**
	 *
	 */
	protected function getSignature(array $params):string{
		ksort($params);

		$signature = '';

		foreach($params as $k => $v){

			if(in_array($k, ['format', 'callback'])){
				continue;
			}

			$signature .= $k.$v;
		}

		return md5($signature.$this->options->secret);
	}

	/**
	 *
	 */
	public function getAccessToken(string $session_token):AccessToken{

		$params = [
			'method'  => 'auth.getSession',
			'format'  => 'json',
			'api_key' => $this->options->key,
			'token'   => $session_token,
		];

		$params['api_sig'] = $this->getSignature($params);

		$request = $this->requestFactory->createRequest('GET', QueryUtil::merge($this->apiURL, $params));

		return $this->parseTokenResponse($this->http->sendRequest($request));
	}

	/**
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	protected function parseTokenResponse(ResponseInterface $response):AccessToken{

		try{
			$data = MessageUtil::decodeJSON($response, true);

			if(!$data || !is_array($data)){
				trigger_error('');
			}
		}
		catch(Throwable $e){
			throw new ProviderException('unable to parse token response');
		}

		if(isset($data['error'])){
			throw new ProviderException('error retrieving access token: '.$data['message']);
		}
		elseif(!isset($data['session']['key'])){
			throw new ProviderException('token missing');
		}

		$token = new AccessToken;

		$token->provider     = $this->serviceName;
		$token->accessToken  = $data['session']['key'];
		$token->expires      = AccessToken::EOL_NEVER_EXPIRES;

		unset($data['session']['key']);

		$token->extraParams = $data;

		$this->storage->storeAccessToken($token, $this->serviceName);

		return $token;
	}

	/**
	 * @inheritDoc
	 */
	public function request(
		string                       $path,
		array                        $params = null,
		string                       $method = null,
		StreamInterface|array|string $body = null,
		array                        $headers = null,
		string                       $protocolVersion = null
	):ResponseInterface{

		if($body !== null && !is_array($body)){
			throw new ProviderException('$body must be an array');
		}

		$method ??= 'GET';
		$params ??= [];
		$body   ??= [];

		$params = array_merge($params, $body, [
			'method'  => $path,
			'format'  => 'json',
			'api_key' => $this->options->key,
			'sk'      => $this->storage->getAccessToken($this->serviceName)->accessToken,
		]);

		$params['api_sig'] = $this->getSignature($params);

		if($method === 'POST'){
			$body   = $params;
			$params = [];
		}

		/** @phan-suppress-next-line PhanTypeMismatchArgumentNullable */
		$request = $this->requestFactory->createRequest($method, QueryUtil::merge($this->apiURL, $params));

		foreach(array_merge($this->apiHeaders, $headers ?? []) as $header => $value){
			$request = $request->withAddedHeader($header, $value);
		}

		if($method === 'POST'){
			$request = $request->withHeader('Content-Type', 'application/x-www-form-urlencoded');
			$body    = $this->streamFactory->createStream(QueryUtil::build($body, PHP_QUERY_RFC1738));
			$request = $request->withBody($body);
		}

		return $this->http->sendRequest($request);
	}

	/**
	 * @inheritDoc
	 * @codeCoverageIgnore
	 */
	public function getRequestAuthorization(RequestInterface $request, AccessToken $token):RequestInterface{
		return $request;
	}

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('user.getInfo');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->error, $json->error_description)){
			throw new ProviderException($json->error_description);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

	/**
	 * @todo
	 *
	 * @param array $tracks
	 */
#	public function scrobble(array $tracks){}

}
