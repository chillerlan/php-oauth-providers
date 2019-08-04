<?php
/**
 * Class MailChimp
 *
 * @link http://developer.mailchimp.com/
 * @link http://developer.mailchimp.com/documentation/mailchimp/guides/how-to-use-oauth2/
 *
 * @filesource   MailChimp.php
 * @created      16.08.2018
 * @package      chillerlan\OAuth\Providers\MailChimp
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\MailChimp;

use chillerlan\OAuth\Core\{AccessToken, CSRFToken, OAuth2Provider};
use chillerlan\OAuth\OAuthException;
use Psr\Http\Message\ResponseInterface;

use function array_merge, sprintf;
use function chillerlan\HTTP\Psr7\get_json;

/**
 * @method \Psr\Http\Message\ResponseInterface createAuthorizedApp(array $body = ['client_id', 'client_secret'])
 * @method \Psr\Http\Message\ResponseInterface getAuthorizedApp(array $params = ['fields', 'exclude_fields'])
 * @method \Psr\Http\Message\ResponseInterface getAuthorizedAppList(array $params = ['fields', 'exclude_fields', 'count', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface ping()
 * @method \Psr\Http\Message\ResponseInterface root(array $params = ['fields', 'exclude_fields'])
 */
class MailChimp extends OAuth2Provider implements CSRFToken{

	protected const API_BASE          = 'https://%s.api.mailchimp.com/3.0';
	protected const METADATA_ENDPOINT = 'https://login.mailchimp.com/oauth2/metadata';

	protected $authURL        = 'https://login.mailchimp.com/oauth2/authorize';
	protected $accessTokenURL = 'https://login.mailchimp.com/oauth2/token';
	protected $endpointMap    = MailChimpEndpoints::class;
	protected $authMethod     = self::HEADER_OAUTH;
	protected $apiDocs        = 'https://developer.mailchimp.com/';
	protected $applicationURL = 'https://admin.mailchimp.com/account/oauth2/';

	/**
	 * @param \chillerlan\OAuth\Core\AccessToken|null $token
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 * @throws \chillerlan\OAuth\OAuthException
	 */
	public function getTokenMetadata(AccessToken $token = null):AccessToken{

		$token = $token ?? $this->storage->getAccessToken($this->serviceName);

		if(!$token instanceof AccessToken){
			throw new OAuthException('invalid token'); // @codeCoverageIgnore
		}

		$request = $this->requestFactory
			->createRequest('GET', $this::METADATA_ENDPOINT)
			->withHeader('Authorization', 'OAuth '.$token->accessToken)
		;

		$response = $this->http->sendRequest($request);

		if($response->getStatusCode() !== 200){
			throw new OAuthException('metadata response error'); // @codeCoverageIgnore
		}

		$token->extraParams = array_merge($token->extraParams, get_json($response, true));

		$this->storage->storeAccessToken($this->serviceName, $token);

		return $token;
	}

	/**
	 * prepare the API URL from the token metadata
	 *
	 * @inheritdoc
	 */
	public function request(string $path, array $params = null, string $method = null, $body = null, array $headers = null):ResponseInterface{
		$token = $this->storage->getAccessToken($this->serviceName);

		$this->apiURL = sprintf($this::API_BASE, $token->extraParams['dc']);

		return parent::request($path, $params, $method, $body, $headers);
	}

}
