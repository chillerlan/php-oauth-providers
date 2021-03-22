<?php
/**
 * Class Twitch
 *
 * @link https://dev.twitch.tv/docs/api/reference/
 * @link https://dev.twitch.tv/docs/authentication/
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitch;

use chillerlan\OAuth\Core\{AccessToken, ClientCredentials, CSRFToken, OAuth2Provider, TokenRefresh};
use Psr\Http\Message\RequestInterface;

use function http_build_query, implode;
use const PHP_QUERY_RFC1738;

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 * @method \Psr\Http\Message\ResponseInterface user(string $username)
 */
class Twitch extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	public const SCOPE_ANALYTICS_READ_EXTENSIONS  = 'analytics:read:extensions';
	public const SCOPE_ANALYTICS_READ_GAMES       = 'analytics:read:games';
	public const SCOPE_BITS_READ                  = 'bits:read';
	public const SCOPE_CHANNEL_EDIT_COMMERCIAL    = 'channel:edit:commercial';
	public const SCOPE_CHANNEL_MANAGE_BROADCAST   = 'channel:manage:broadcast';
	public const SCOPE_CHANNEL_MANAGE_EXTENSIONS  = 'channel:manage:extensions';
	public const SCOPE_CHANNEL_MANAGE_REDEMPTIONS = 'channel:manage:redemptions';
	public const SCOPE_CHANNEL_MANAGE_VIDEOS      = 'channel:manage:videos';
	public const SCOPE_CHANNEL_READ_EDITORS       = 'channel:read:editors';
	public const SCOPE_CHANNEL_READ_HYPE_TRAIN    = 'channel:read:hype_train';
	public const SCOPE_CHANNEL_READ_REDEMPTIONS   = 'channel:read:redemptions';
	public const SCOPE_CHANNEL_READ_STREAM_KEY    = 'channel:read:stream_key';
	public const SCOPE_CHANNEL_READ_SUBSCRIPTIONS = 'channel:read:subscriptions';
	public const SCOPE_CLIPS_EDIT                 = 'clips:edit';
	public const SCOPE_MODERATION_READ            = 'moderation:read';
	public const SCOPE_USER_EDIT                  = 'user:edit';
	public const SCOPE_USER_EDIT_FOLLOWS          = 'user:edit:follows';
	public const SCOPE_USER_READ_BLOCKED_USERS    = 'user:read:blocked_users';
	public const SCOPE_USER_MANAGE_BLOCKED_USERS  = 'user:manage:blocked_users';
	public const SCOPE_USER_READ_BROADCAST        = 'user:read:broadcast';
	public const SCOPE_USER_READ_EMAIL            = 'user:read:email';
	public const SCOPE_USER_READ_SUBSCRIPTIONS    = 'user:read:subscriptions';

	protected string $authURL          = 'https://id.twitch.tv/oauth2/authorize';
	protected string $accessTokenURL   = 'https://id.twitch.tv/oauth2/token';
	protected ?string $apiURL          = 'https://api.twitch.tv';
	protected ?string $userRevokeURL   = 'https://www.twitch.tv/settings/connections';
	protected ?string $revokeURL       = 'https://id.twitch.tv/oauth2/revoke';
	protected ?string $endpointMap     = TwitchEndpoints::class;
	protected ?string $apiDocs         = 'https://dev.twitch.tv/docs/api/reference/';
	protected ?string $applicationURL  = 'https://dev.twitch.tv/console/apps/create';
	protected array $authHeaders       = ['Accept' => 'application/vnd.twitchtv.v5+json'];
	protected array $apiHeaders        = ['Accept' => 'application/vnd.twitchtv.v5+json'];

	protected array $defaultScopes     =  [
		self::SCOPE_USER_READ_EMAIL,
	];

	/**
	 * @link https://dev.twitch.tv/docs/authentication#oauth-client-credentials-flow-app-access-tokens
	 *
	 * @param array|null $scopes
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 */
	public function getClientCredentialsToken(array $scopes = null):AccessToken{
		$params = [
			'client_id'     => $this->options->key,
			'client_secret' => $this->options->secret,
			'grant_type'    => 'client_credentials',
		];

		if($scopes !== null){
			$params['scope'] = implode($this->scopesDelimiter, $scopes);
		}

		$request = $this->requestFactory
			->createRequest('POST', $this->clientCredentialsTokenURL ?? $this->accessTokenURL)
			->withHeader('Content-Type', 'application/x-www-form-urlencoded')
			->withBody($this->streamFactory->createStream(http_build_query($params, '', '&', PHP_QUERY_RFC1738)))
		;

		foreach($this->authHeaders as $header => $value){
			$request = $request->withAddedHeader($header, $value);
		}

		$token = $this->parseTokenResponse($this->http->sendRequest($request));

		$this->storage->storeAccessToken($this->serviceName, $token);

		return $token;
	}

	/**
	 * @inheritDoc
	 */
	public function getRequestAuthorization(RequestInterface $request, AccessToken $token):RequestInterface{
		return $request
			->withHeader('Authorization', $this->authMethodHeader.' '.$token->accessToken)
			->withHeader('Client-ID', $this->options->key);
	}

}
