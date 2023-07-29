<?php
/**
 * Class OpenStreetmap
 *
 * @created      12.05.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\OAuth1Provider;
use chillerlan\OAuth\Core\ProviderException;
use Psr\Http\Message\ResponseInterface;
use function sprintf;
use function strip_tags;

/**
 * @see https://wiki.openstreetmap.org/wiki/API
 * @see https://wiki.openstreetmap.org/wiki/OAuth
 */
class OpenStreetmap extends OAuth1Provider{

	protected string  $requestTokenURL = 'https://www.openstreetmap.org/oauth/request_token';
	protected string  $authURL         = 'https://www.openstreetmap.org/oauth/authorize';
	protected string  $accessTokenURL  = 'https://www.openstreetmap.org/oauth/access_token';
	protected string  $apiURL          = 'https://api.openstreetmap.org';
	protected ?string $apiDocs         = 'https://wiki.openstreetmap.org/wiki/API';
	protected ?string $applicationURL  = 'https://www.openstreetmap.org/user/{USERNAME}/oauth_clients';

	/**
	 * @inheritDoc
	 */
	public function me(bool $json = true):ResponseInterface{
		$response = $this->request('/api/0.6/user/details'.($json ? '.json' : ''));
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$body = MessageUtil::getContents($response);

		if(!empty($body)){
			throw new ProviderException(strip_tags($body));
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}