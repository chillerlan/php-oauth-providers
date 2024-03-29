<?php
/**
 * Class Foursquare
 *
 * @created      10.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\{MessageUtil, QueryUtil};
use chillerlan\OAuth\Core\{OAuth2Provider, ProviderException};
use Psr\Http\Message\{ResponseInterface, StreamInterface};
use function array_merge, explode, sprintf;

/**
 * @see https://developer.foursquare.com/docs/
 * @see https://developer.foursquare.com/overview/auth
 */
class Foursquare extends OAuth2Provider{

	protected const API_VERSIONDATE = '20190225';

	protected string      $authURL         = 'https://foursquare.com/oauth2/authenticate';
	protected string      $accessTokenURL  = 'https://foursquare.com/oauth2/access_token';
	protected string      $apiURL          = 'https://api.foursquare.com';
	protected string|null $userRevokeURL   = 'https://foursquare.com/settings/connections';
	protected string|null $apiDocs         = 'https://developer.foursquare.com/docs';
	protected string|null $applicationURL  = 'https://foursquare.com/developers/apps';
	protected string      $authMethodQuery = 'oauth_token';
	protected int         $authMethod      = self::AUTH_METHOD_QUERY;

	/**
	 * @inheritDoc
	 */
	public function request(
		string                            $path,
		array|null                        $params = null,
		string|null                       $method = null,
		StreamInterface|array|string|null $body = null,
		array|null                        $headers = null,
		string|null                       $protocolVersion = null
	):ResponseInterface{
		$queryparams      = QueryUtil::parse($this->uriFactory->createUri($this->apiURL.$path)->getPath());
		$queryparams['v'] = $this::API_VERSIONDATE;
		$queryparams['m'] = 'foursquare';

		return parent::request(explode('?', $path)[0], array_merge(($params ?? []), $queryparams), $method, $body, $headers);
	}

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/v2/users/self');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->meta, $json->meta->errorDetail)){
			throw new ProviderException($json->meta->errorDetail);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
