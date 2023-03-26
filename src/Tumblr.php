<?php
/**
 * Class Tumblr
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\OAuth1Provider;
use chillerlan\OAuth\Core\ProviderException;
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://www.tumblr.com/docs/en/api/v2
 */
class Tumblr extends OAuth1Provider{

	protected string  $requestTokenURL = 'https://www.tumblr.com/oauth/request_token';
	protected string  $authURL         = 'https://www.tumblr.com/oauth/authorize';
	protected string  $accessTokenURL  = 'https://www.tumblr.com/oauth/access_token';
	protected string  $apiURL          = 'https://api.tumblr.com/v2';
	protected ?string $userRevokeURL   = 'https://www.tumblr.com/settings/apps';
	protected ?string $apiDocs         = 'https://www.tumblr.com/docs/en/api/v2';
	protected ?string $applicationURL  = 'https://www.tumblr.com/oauth/apps';


	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/user/info');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->meta, $json->meta->msg)){
			throw new ProviderException($json->meta->msg);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
