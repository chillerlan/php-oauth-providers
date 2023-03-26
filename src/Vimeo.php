<?php
/**
 * Class Vimeo
 *
 * @created      09.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, ProviderException};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://developer.vimeo.com/
 * @see https://developer.vimeo.com/api/authentication
 */
class Vimeo extends OAuth2Provider implements ClientCredentials, CSRFToken{

	/**
	 * @see https://developer.vimeo.com/api/authentication#understanding-the-auth-process
	 */
	public const SCOPE_PUBLIC                    = 'public';
	public const SCOPE_PRIVATE                   = 'private';
	public const SCOPE_PURCHASED                 = 'purchased';
	public const SCOPE_CREATE                    = 'create';
	public const SCOPE_EDIT                      = 'edit';
	public const SCOPE_DELETE                    = 'delete';
	public const SCOPE_INTERACT                  = 'interact';
	public const SCOPE_UPLOAD                    = 'upload';
	public const SCOPE_PROMO_CODES               = 'promo_codes';
	public const SCOPE_VIDEO_FILES               = 'video_files';

	protected const API_VERSION                  = '3.4';

	protected string  $authURL                   = 'https://api.vimeo.com/oauth/authorize';
	protected string  $accessTokenURL            = 'https://api.vimeo.com/oauth/access_token';
	protected string  $apiURL                    = 'https://api.vimeo.com';
	protected ?string $userRevokeURL             = 'https://vimeo.com/settings/apps';
	protected ?string $clientCredentialsTokenURL = 'https://api.vimeo.com/oauth/authorize/client';
	protected ?string $apiDocs                   = 'https://developer.vimeo.com';
	protected ?string $applicationURL            = 'https://developer.vimeo.com/apps';
	protected array   $authHeaders               = ['Accept' => 'application/vnd.vimeo.*+json;version='.self::API_VERSION];
	protected array   $apiHeaders                = ['Accept' => 'application/vnd.vimeo.*+json;version='.self::API_VERSION];

	protected array $defaultScopes               =  [
		self::SCOPE_PUBLIC,
		self::SCOPE_PRIVATE,
		self::SCOPE_INTERACT,
	];

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/me');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->error, $json->developer_message)){
			throw new ProviderException($json->developer_message);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
