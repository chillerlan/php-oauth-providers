<?php
/**
 * Class PayPal
 *
 * @link https://developer.paypal.com/docs/connect-with-paypal/integrate/
 *
 * @filesource   PayPal.php
 * @created      29.07.2019
 * @package      chillerlan\OAuth\Providers\PayPal
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\PayPal;

use chillerlan\OAuth\Core\{AccessToken, ClientCredentials, CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\ResponseInterface;

use function array_column, base64_encode, http_build_query, implode, is_array, json_decode, sprintf;
use function chillerlan\HTTP\Psr7\decompress_content;

use const PHP_QUERY_RFC1738;

/**
 * @method \Psr\Http\Message\ResponseInterface me(array $params = ['schema'])
 */
class PayPal extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	public const SCOPE_BASIC_AUTH = 'openid';
	public const SCOPE_FULL_NAME  = 'profile';
	public const SCOPE_EMAIL      = 'email';
	public const SCOPE_ADDRESS    = 'address';
	public const SCOPE_ACCOUNT    = 'https://uri.paypal.com/services/paypalattributes';

	protected string $accessTokenURL  = 'https://api.paypal.com/v1/oauth2/token';
	protected string $authURL         = 'https://www.paypal.com/connect';
	protected ?string $apiURL         = 'https://api.paypal.com';
	protected ?string $applicationURL = 'https://developer.paypal.com/developer/applications/';
	protected ?string $apiDocs        = 'https://developer.paypal.com/docs/connect-with-paypal/reference/';
	protected ?string $endpointMap    = PayPalEndpoints::class;

	/**
	 * @param \Psr\Http\Message\ResponseInterface $response
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	protected function parseTokenResponse(ResponseInterface $response):AccessToken{
		$data = json_decode(decompress_content($response), true);

		if(!is_array($data)){
			throw new ProviderException('unable to parse token response');
		}

		foreach(['error_description', 'error'] as $field){
			if(isset($data[$field])){
				throw new ProviderException('error retrieving access token: "'.$data[$field].'"');
			}
		}

		// @codeCoverageIgnoreStart
		if(isset($data['name'], $data['message'])){
			$msg = sprintf('error retrieving access token: "%s" [%s]', $data['message'], $data['name']);

			if(isset($data['links']) && is_array($data['links'])){
				$msg .= "\n".implode("\n", array_column($data['links'], 'href'));
			}

			throw new ProviderException($msg);
		}
		// @codeCoverageIgnoreEnd

		if(!isset($data['access_token'])){
			throw new ProviderException('token missing');
		}

		$token = new AccessToken([
			'provider'     => $this->serviceName,
			'accessToken'  => $data['access_token'],
			'expires'      => $data['expires_in'] ?? AccessToken::EOL_NEVER_EXPIRES,
			'refreshToken' => $data['refresh_token'] ?? null,
		]);

		unset($data['expires_in'], $data['refresh_token'], $data['access_token']);

		$token->extraParams = $data;

		return $token;
	}

	/**
	 * @param string      $code
	 * @param string|null $state
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 */
	public function getAccessToken(string $code, string $state = null):AccessToken{
		$this->checkState($state); // we're instance of CSRFToken

		$body = [
			'code'          => $code,
			'grant_type'    => 'authorization_code',
			'redirect_uri'  => $this->options->callbackURL,
		];

		$request = $this->requestFactory
			->createRequest('POST', $this->accessTokenURL)
			->withHeader('Content-Type', 'application/x-www-form-urlencoded')
			->withHeader('Accept-Encoding', 'identity')
			->withHeader('Authorization', 'Basic '.base64_encode($this->options->key.':'.$this->options->secret))
			->withBody($this->streamFactory->createStream(http_build_query($body, '', '&', PHP_QUERY_RFC1738)));

		$token = $this->parseTokenResponse($this->http->sendRequest($request));

		$this->storage->storeAccessToken($this->serviceName, $token);

		return $token;
	}

}
