<?php
/**
 * Class GuildWars2
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{AccessToken, OAuth2Provider, ProviderException};
use chillerlan\HTTP\Utils\QueryUtil;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use function implode;
use function preg_match;
use function sprintf;
use function str_starts_with;
use function substr;

/**
 * GW2 does not support authentication (anymore) but the API still works like a regular OAUth API, so...
 *
 * @see https://api.guildwars2.com/v2
 * @see https://wiki.guildwars2.com/wiki/API:Main
 */
class GuildWars2 extends OAuth2Provider{

	public const SCOPE_ACCOUNT        = 'account';
	public const SCOPE_INVENTORIES    = 'inventories';
	public const SCOPE_CHARACTERS     = 'characters';
	public const SCOPE_TRADINGPOST    = 'tradingpost';
	public const SCOPE_WALLET         = 'wallet';
	public const SCOPE_UNLOCKS        = 'unlocks';
	public const SCOPE_PVP            = 'pvp';
	public const SCOPE_BUILDS         = 'builds';
	public const SCOPE_PROGRESSION    = 'progression';
	public const SCOPE_GUILDS         = 'guilds';

	protected const AUTH_ERRMSG       = 'GuildWars2 does not support authentication anymore.';

	protected string  $authURL        = 'https://account.arena.net/applications/create';
	protected string  $apiURL         = 'https://api.guildwars2.com';
	protected ?string $userRevokeURL  = 'https://account.arena.net/applications';
	protected ?string $apiDocs        = 'https://wiki.guildwars2.com/wiki/API:Main';
	protected ?string $applicationURL = 'https://account.arena.net/applications';

	/**
	 * @param string $access_token
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function storeGW2Token(string $access_token):AccessToken{

		if(!preg_match('/^[a-f\d\-]{72}$/i', $access_token)){
			throw new ProviderException('invalid token');
		}

		// to verify the token we need to send a request without authentication
		$request = $this->requestFactory
			->createRequest('GET', QueryUtil::merge($this->apiURL.'/v2/tokeninfo', ['access_token' => $access_token]))
		;

		$tokeninfo = MessageUtil::decodeJSON($this->http->sendRequest($request));

		if(isset($tokeninfo->id) && str_starts_with($access_token, $tokeninfo->id)){
			$token                    = new AccessToken;
			$token->provider          = $this->serviceName;
			$token->accessToken       = $access_token;
			$token->accessTokenSecret = substr($access_token, 36, 36); // the actual token
			$token->expires           = AccessToken::EOL_NEVER_EXPIRES;
			$token->extraParams       = [
				'token_type' => 'Bearer',
				'id'         => $tokeninfo->id,
				'name'       => $tokeninfo->name,
				'scope'      => implode($this->scopesDelimiter, $tokeninfo->permissions),
			];

			$this->storage->storeAccessToken($token, $this->serviceName);

			return $token;
		}

		throw new ProviderException('unverified token'); // @codeCoverageIgnore
	}

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function getAuthURL(array $params = null, array $scopes = null):UriInterface{
		throw new ProviderException($this::AUTH_ERRMSG);
	}

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function getAccessToken(string $code, string $state = null):AccessToken{
		throw new ProviderException($this::AUTH_ERRMSG);
	}

}
