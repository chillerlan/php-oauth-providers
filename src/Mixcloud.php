<?php
/**
 * Class Mixcloud
 *
 * @created      28.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{OAuth2Provider, ProviderException};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * note: a missing slash at the end of the path will end up in a HTTP/301
 *
 * @see https://www.mixcloud.com/developers/
 */
class Mixcloud extends OAuth2Provider{

	protected string  $authURL        = 'https://www.mixcloud.com/oauth/authorize';
	protected string  $accessTokenURL = 'https://www.mixcloud.com/oauth/access_token';
	protected string  $apiURL         = 'https://api.mixcloud.com';
	protected ?string $userRevokeURL  = 'https://www.mixcloud.com/settings/applications/';
	protected ?string $apiDocs        = 'https://www.mixcloud.com/developers/';
	protected ?string $applicationURL = 'https://www.mixcloud.com/developers/create/';
	protected int     $authMethod     = self::AUTH_METHOD_QUERY;

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/me/');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->error, $json->error->message)){
			throw new ProviderException($json->error->message);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
