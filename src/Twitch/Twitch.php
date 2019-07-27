<?php
/**
 * Class Twitch
 *
 * @link https://dev.twitch.tv/docs/api/reference/
 * @link https://dev.twitch.tv/docs/authentication/
 *
 * @filesource   Twitch.php
 * @created      22.10.2017
 * @package      chillerlan\OAuth\Providers\Twitch
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitch;

use chillerlan\OAuth\Core\{
	AccessToken, ClientCredentials, CSRFToken, OAuth2CSRFTokenTrait,
	OAuth2Provider, OAuth2TokenRefreshTrait, TokenRefresh
};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 * @method \Psr\Http\Message\ResponseInterface user(string $username)
 */
class Twitch extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{
	use OAuth2CSRFTokenTrait, OAuth2TokenRefreshTrait;

	public const SCOPE_CHANNEL_CHECK_SUBSCRIPTION = 'channel_check_subscription';
	public const SCOPE_CHANNEL_COMMERCIAL         = 'channel_commercial';
	public const SCOPE_CHANNEL_EDITOR             = 'channel_editor';
	public const SCOPE_CHANNEL_FEED_EDIT          = 'channel_feed_edit';
	public const SCOPE_CHANNEL_FEED_READ          = 'channel_feed_read';
	public const SCOPE_CHANNEL_CHANNEL_READ       = 'channel_read';
	public const SCOPE_CHANNEL_CHANNEL_STREAM     = 'channel_stream';
	public const SCOPE_CHANNEL_SUBSCRIPTIONS      = 'channel_subscriptions';
	public const SCOPE_CHAT_LOGIN                 = 'chat_login';
	public const SCOPE_COLLECTIONS_EDIT           = 'collections_edit';
	public const SCOPE_COMMUNITIES_EDIT           = 'communities_edit';
	public const SCOPE_COMMUNITIES_MODERATE       = 'communities_moderate';
	public const SCOPE_OPENID                     = 'openid';
	public const SCOPE_USER_BLOCKS_EDIT           = 'user_blocks_edit';
	public const SCOPE_USER_BLOCKS_READ           = 'user_blocks_read';
	public const SCOPE_USER_FOLLOWS_EDIT          = 'user_follows_edit';
	public const SCOPE_USER_READ                  = 'user_read';
	public const SCOPE_USER_SUBSCRIPTIONS         = 'user_subscriptions';
	public const SCOPE_VIEWING_ACTIVITY_READ      = 'viewing_activity_read';

	protected $apiURL             = 'https://api.twitch.tv/kraken';
	protected $authURL            = 'https://api.twitch.tv/kraken/oauth2/authorize';
	protected $accessTokenURL     = 'https://api.twitch.tv/kraken/oauth2/token';
	protected $userRevokeURL      = 'https://www.twitch.tv/settings/connections';
	protected $revokeURL          = 'https://api.twitch.tv/kraken/oauth2/revoke';
#	protected $accessTokenExpires = true;
	protected $authHeaders        = ['Accept' => 'application/vnd.twitchtv.v5+json'];
	protected $apiHeaders         = ['Accept' => 'application/vnd.twitchtv.v5+json'];
	protected $authMethod         = self::HEADER_OAUTH;  // -> https://api.twitch.tv/kraken
#	protected $authMethod         = self::HEADER_BEARER; // -> https://api.twitch.tv/helix
	protected $endpointMap        = TwitchEndpoints::class;

	/**
	 * @link https://dev.twitch.tv/docs/authentication#oauth-client-credentials-flow-app-access-tokens
	 *
	 * @param array $scopes
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken|\chillerlan\Settings\SettingsContainerInterface
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

}
