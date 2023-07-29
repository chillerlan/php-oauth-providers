<?php
/**
 * Class Gitter
 *
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, ProviderException};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @todo: gitter has changed its API entirely
 * @see https://gitter.im/docs/
 * @see https://spec.matrix.org/latest/client-server-api/
 *
 * currently, the client does not work properly
 */
class Gitter extends OAuth2Provider implements CSRFToken{

	public const SCOPE_FLOW            = 'flow';
	public const SCOPE_PRIVATE         = 'private';

	protected string  $authURL         = 'https://gitter.im/login/oauth/authorize';
	protected string  $accessTokenURL  = 'https://gitter.im/login/oauth/token';
	protected string  $scopesDelimiter = ',';
	protected string  $apiURL          = 'https://api.gitter.im';
	protected ?string $apiDocs         = 'https://developer.gitter.im';
	protected ?string $applicationURL  = 'https://developer.gitter.im/apps';

	protected array $defaultScopes     = [
		self::SCOPE_FLOW,
		self::SCOPE_PRIVATE,
	];

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/v1/user/me');
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

}
