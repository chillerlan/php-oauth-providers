<?php
/**
 * Class WordPress
 *
 * @created      26.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, ProviderException};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://developer.wordpress.com/docs/oauth2/
 */
class WordPress extends OAuth2Provider implements CSRFToken{

	public const SCOPE_AUTH           = 'auth';
	public const SCOPE_GLOBAL         = 'global';

	protected string  $authURL        = 'https://public-api.wordpress.com/oauth2/authorize';
	protected string  $accessTokenURL = 'https://public-api.wordpress.com/oauth2/token';
	protected string  $apiURL         = 'https://public-api.wordpress.com/rest';
	protected ?string $userRevokeURL  = 'https://wordpress.com/me/security/connected-applications';
	protected ?string $apiDocs        = 'https://developer.wordpress.com/docs/api/';
	protected ?string $applicationURL = 'https://developer.wordpress.com/apps/';

	protected array $defaultScopes    = [
		self::SCOPE_GLOBAL,
	];

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/v1/me');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->error, $json->message)){
			throw new ProviderException($json->message);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
