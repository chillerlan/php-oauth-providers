<?php
/**
 * Class BigCartel
 *
 * @created      10.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{AccessToken, CSRFToken, OAuth2Provider, ProviderException, TokenInvalidate};
use Psr\Http\Message\ResponseInterface;
use function sodium_bin2base64, sprintf;
use const SODIUM_BASE64_VARIANT_ORIGINAL;

/**
 * BigCartel OAuth
 *
 * @see https://developers.bigcartel.com/api/v1
 * @see https://bigcartel.wufoo.com/confirm/big-cartel-api-application/
 */
class BigCartel extends OAuth2Provider implements CSRFToken, TokenInvalidate{

	protected string  $authURL        = 'https://my.bigcartel.com/oauth/authorize';
	protected string  $accessTokenURL = 'https://api.bigcartel.com/oauth/token';
	protected string  $revokeURL      = 'https://api.bigcartel.com/oauth/deauthorize/%s'; // sprintf() user id!
	protected string  $apiURL         = 'https://api.bigcartel.com/v1';
	protected ?string $userRevokeURL  = 'https://my.bigcartel.com/account';
	protected ?string $apiDocs        = 'https://developers.bigcartel.com/api/v1';
	protected ?string $applicationURL = 'https://bigcartel.wufoo.com/forms/big-cartel-api-application/';
	protected array   $apiHeaders     = ['Accept' => 'application/vnd.api+json'];

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/accounts');
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

	/**
	 * @inheritDoc
	 */
	public function invalidateAccessToken(AccessToken $token = null):bool{

		if($token === null && !$this->storage->hasAccessToken()){
			throw new ProviderException('no token given');
		}

		$token ??= $this->storage->getAccessToken();

		$auth = sodium_bin2base64(sprintf('%s:%s', $this->options->key, $this->options->secret), SODIUM_BASE64_VARIANT_ORIGINAL);

		$request = $this->requestFactory
			->createRequest('POST', sprintf($this->revokeURL, $this->getAccountID($token)))
			->withHeader('Authorization', sprintf('Basic %s', $auth))
		;

		// bypass the request authoritation
		$response = $this->http->sendRequest($request);

		if($response->getStatusCode() === 204){
			$this->storage->clearAccessToken();

			return true;
		}

		return false;
	}

	/**
	 * Try to get the user ID from either the token or the me() endpoint
	 *
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	protected function getAccountID(AccessToken $token):string{

		if(isset($token->extraParams['account_id'])){
			return (string)$token->extraParams['account_id'];
		}

		$json = MessageUtil::decodeJSON($this->me());

		if(isset($json->data[0]->id)){
			return (string)$json->data[0]->id;
		}

		throw new ProviderException('cannot determine account id');
	}

}
