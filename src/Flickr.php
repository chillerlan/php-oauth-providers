<?php
/**
 * Class Flickr
 *
 * @created      20.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\HTTP\Utils\QueryUtil;
use chillerlan\OAuth\Core\OAuth1Provider;
use chillerlan\OAuth\Core\ProviderException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use function array_merge;
use function sprintf;

/**
 * @see https://www.flickr.com/services/api/auth.oauth.html
 * @see https://www.flickr.com/services/api/
 */
class Flickr extends OAuth1Provider{

	public const PERM_READ             = 'read';
	public const PERM_WRITE            = 'write';
	public const PERM_DELETE           = 'delete';

	protected string  $requestTokenURL = 'https://www.flickr.com/services/oauth/request_token';
	protected string  $authURL         = 'https://www.flickr.com/services/oauth/authorize';
	protected string  $accessTokenURL  = 'https://www.flickr.com/services/oauth/access_token';
	protected string  $apiURL          = 'https://api.flickr.com/services/rest';
	protected ?string $userRevokeURL   = 'https://www.flickr.com/services/auth/list.gne';
	protected ?string $apiDocs         = 'https://www.flickr.com/services/api/';
	protected ?string $applicationURL  = 'https://www.flickr.com/services/apps/create/';

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

		$params = array_merge($params ?? [], [
			'method'         => $path,
			'format'         => 'json',
			'nojsoncallback' => true,
		]);

		$request = $this->getRequestAuthorization(
			/** @phan-suppress-next-line PhanTypeMismatchArgumentNullable */
			$this->requestFactory->createRequest($method ?? 'POST', QueryUtil::merge($this->apiURL, $params)),
			$this->storage->getAccessToken($this->serviceName)
		);

		return $this->http->sendRequest($request);
	}

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('flickr.test.login');
		$status   = $response->getStatusCode();
		$json     = MessageUtil::decodeJSON($response);

		if($status === 200 && isset($json->user)){
			return $response;
		}

		if(isset($json->message)){
			throw new ProviderException($json->message);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
