<?php
/**
 * Class Discord
 *
 * @link https://discordapp.com/developers/docs/topics/oauth2
 *
 * @filesource   Discord.php
 * @created      22.10.2017
 * @package      chillerlan\OAuth\Providers\Discord
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Discord;

use chillerlan\OAuth\Core\{
	ClientCredentials, CSRFToken, OAuth2CSRFTokenTrait, OAuth2ClientCredentialsTrait,
	OAuth2Provider, OAuth2TokenRefreshTrait, TokenExpires, TokenRefresh,
};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Discord extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenExpires, TokenRefresh{
	use OAuth2ClientCredentialsTrait, OAuth2CSRFTokenTrait, OAuth2TokenRefreshTrait;

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

	protected $apiURL         = 'https://discordapp.com/api/v6';
	protected $authURL        = 'https://discordapp.com/api/oauth2/authorize';
	protected $accessTokenURL = 'https://discordapp.com/api/oauth2/token';
	protected $revokeURL      = 'https://discordapp.com/api/oauth2/token/revoke';
	protected $endpointMap    = DiscordEndpoints::class;

}
