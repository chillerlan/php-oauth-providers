<?php
/**
 * Class Discord
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{
	AccessToken, ClientCredentials, CSRFToken, OAuth2Provider, ProviderException, TokenInvalidate, TokenRefresh
};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://discordapp.com/developers/docs/topics/oauth2
 */
class Discord extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh, TokenInvalidate{

	public const SCOPE_BOT                    = 'bot';
	public const SCOPE_CONNECTIONS            = 'connections';
	public const SCOPE_EMAIL                  = 'email';
	public const SCOPE_IDENTIFY               = 'identify';
	public const SCOPE_GUILDS                 = 'guilds';
	public const SCOPE_GUILDS_JOIN            = 'guilds.join';
	public const SCOPE_GDM_JOIN               = 'gdm.join';
	public const SCOPE_MESSAGES_READ          = 'messages.read';
	public const SCOPE_RPC                    = 'rpc';
	public const SCOPE_RPC_API                = 'rpc.api';
	public const SCOPE_RPC_NOTIFICATIONS_READ = 'rpc.notifications.read';
	public const SCOPE_WEBHOOK_INCOMING       = 'webhook.incoming';

	protected string  $authURL                = 'https://discordapp.com/api/oauth2/authorize';
	protected string  $accessTokenURL         = 'https://discordapp.com/api/oauth2/token';
	protected string  $apiURL                 = 'https://discordapp.com/api/v9';
	protected string  $revokeURL              = 'https://discordapp.com/api/oauth2/token/revoke';
	protected ?string $apiDocs                = 'https://discordapp.com/developers/';
	protected ?string $applicationURL         = 'https://discordapp.com/developers/applications/';

	protected array   $defaultScopes          = [
		self::SCOPE_CONNECTIONS,
		self::SCOPE_EMAIL,
		self::SCOPE_IDENTIFY,
		self::SCOPE_GUILDS,
		self::SCOPE_GUILDS_JOIN,
		self::SCOPE_GDM_JOIN,
		self::SCOPE_MESSAGES_READ,
	];

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/users/@me');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->message)){
			throw new ProviderException($json->message);
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

		$response = $this->request(
			path   : $this->revokeURL,
			method : 'POST',
			body   : [
				'client_id'     => $this->options->key,
				'client_secret' => $this->options->secret,
				'token'         => $token->accessToken,
			],
			headers: ['Content-Type' => 'application/x-www-form-urlencoded']
		);

		if($response->getStatusCode() === 200){
			$this->storage->clearAccessToken();

			return true;
		}

		return false;
	}

}
