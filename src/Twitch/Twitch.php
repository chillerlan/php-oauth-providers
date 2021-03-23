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
 * @method \Psr\Http\Message\ResponseInterface analyticsExtensions(array $params = ['after', 'ended_at', 'extension_id', 'first', 'started_at', 'type'])
 * @method \Psr\Http\Message\ResponseInterface analyticsGames(array $params = ['after', 'ended_at', 'first', 'game_id', 'started_at', 'type'])
 * @method \Psr\Http\Message\ResponseInterface bitsCheermotes(array $params = ['broadcaster_id'])
 * @method \Psr\Http\Message\ResponseInterface bitsLeaderboard(array $params = ['count', 'period', 'started_at', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface channelPointsCustomRewards(array $params = ['broadcaster_id', 'id', 'only_manageable_rewards'])
 * @method \Psr\Http\Message\ResponseInterface channelPointsCustomRewardsCreate(array $params = ['broadcaster_id'], array $body = ['title', 'prompt', 'cost', 'is_enabled', 'background_color', 'is_user_input_required', 'is_max_per_stream_enabled', 'max_per_stream', 'is_max_per_user_per_stream_enabled', 'max_per_user_per_stream', 'is_global_cooldown_enabled', 'global_cooldown_seconds', 'should_redemptions_skip_request_queue'])
 * @method \Psr\Http\Message\ResponseInterface channelPointsCustomRewardsDelete(array $params = ['broadcaster_id', 'id'])
 * @method \Psr\Http\Message\ResponseInterface channelPointsCustomRewardsRedemptions(array $params = ['broadcaster_id', 'reward_id', 'id', 'status', 'sort', 'after', 'first'])
 * @method \Psr\Http\Message\ResponseInterface channelPointsCustomRewardsRedemptionsUpdate(array $params = ['id', 'broadcaster_id', 'reward_id'], array $body = ['status'])
 * @method \Psr\Http\Message\ResponseInterface channelPointsCustomRewardsUpdate(array $params = ['broadcaster_id', 'id'], array $body = ['title', 'prompt', 'cost', 'background_color', 'is_enabled', 'is_user_input_required', 'is_max_per_stream_enabled', 'max_per_stream', 'is_max_per_user_per_stream_enabled', 'max_per_user_per_stream', 'is_global_cooldown_enabled', 'global_cooldown_seconds', 'is_paused', 'should_redemptions_skip_request_queue'])
 * @method \Psr\Http\Message\ResponseInterface channels(array $params = ['broadcaster_id'])
 * @method \Psr\Http\Message\ResponseInterface channelsCommercial(array $body = ['broadcaster_id', 'length'])
 * @method \Psr\Http\Message\ResponseInterface channelsEditors(array $params = ['broadcaster_id'])
 * @method \Psr\Http\Message\ResponseInterface channelsUpdate(array $params = ['broadcaster_id'], array $body = ['game_id', 'broadcaster_language', 'title'])
 * @method \Psr\Http\Message\ResponseInterface clips(array $params = ['broadcaster_id', 'game_id', 'id', 'after', 'before', 'ended_at', 'first', 'started_at'])
 * @method \Psr\Http\Message\ResponseInterface clipsCreate(array $params = ['broadcaster_id', 'has_delay'])
 * @method \Psr\Http\Message\ResponseInterface entitlementsCodes(array $params = ['Param', 'code', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface entitlementsCodesCreate(array $params = ['code', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface entitlementsDrops(array $params = ['id', 'user_id', 'game_id', 'after', 'first'])
 * @method \Psr\Http\Message\ResponseInterface eventsubSubscriptions(array $params = ['status', 'type'])
 * @method \Psr\Http\Message\ResponseInterface eventsubSubscriptionsCreate(array $body = ['type', 'version', 'condition', 'transport'])
 * @method \Psr\Http\Message\ResponseInterface eventsubSubscriptionsDelete(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface extensionsTransactions(array $params = ['extension_id', 'id', 'after', 'first'])
 * @method \Psr\Http\Message\ResponseInterface games(array $params = ['id', 'name'])
 * @method \Psr\Http\Message\ResponseInterface gamesTop(array $params = ['after', 'before', 'first'])
 * @method \Psr\Http\Message\ResponseInterface hypetrainEvents(array $params = ['broadcaster_id', 'first', 'id', 'cursor'])
 * @method \Psr\Http\Message\ResponseInterface moderationBanned(array $params = ['broadcaster_id', 'user_id', 'first', 'after', 'before'])
 * @method \Psr\Http\Message\ResponseInterface moderationBannedEvents(array $params = ['broadcaster_id', 'user_id', 'after', 'first'])
 * @method \Psr\Http\Message\ResponseInterface moderationEnforcementsStatus(array $params = ['broadcaster_id'], array $body = ['msg_id', 'msg_text', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface moderationModerators(array $params = ['broadcaster_id', 'user_id', 'first', 'after'])
 * @method \Psr\Http\Message\ResponseInterface moderationModeratorsEvents(array $params = ['broadcaster_id', 'user_id', 'after', 'first'])
 * @method \Psr\Http\Message\ResponseInterface searchCategories(array $params = ['query', 'first', 'after'])
 * @method \Psr\Http\Message\ResponseInterface searchChannels(array $params = ['query', 'first', 'after', 'live_only'])
 * @method \Psr\Http\Message\ResponseInterface streams(array $params = ['after', 'before', 'first', 'game_id', 'language', 'user_id', 'user_login'])
 * @method \Psr\Http\Message\ResponseInterface streamsKey(array $params = ['broadcaster_id'])
 * @method \Psr\Http\Message\ResponseInterface streamsMarkers(array $params = ['user_id', 'video_id', 'after', 'before', 'first'])
 * @method \Psr\Http\Message\ResponseInterface streamsMarkersCreate(array $body = ['user_id', 'description'])
 * @method \Psr\Http\Message\ResponseInterface streamsTags(array $params = ['broadcaster_id'])
 * @method \Psr\Http\Message\ResponseInterface streamsTagsUpdate(array $params = ['broadcaster_id'], array $body = ['tag_ids'])
 * @method \Psr\Http\Message\ResponseInterface subscriptions(array $params = ['broadcaster_id', 'user_id', 'after', 'first'])
 * @method \Psr\Http\Message\ResponseInterface subscriptionsUser(array $params = ['broadcaster_id', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface tagsStreams(array $params = ['after', 'first', 'tag_id'])
 * @method \Psr\Http\Message\ResponseInterface teams(array $params = ['name', 'id'])
 * @method \Psr\Http\Message\ResponseInterface teamsChannel(array $params = ['broadcaster_id'])
 * @method \Psr\Http\Message\ResponseInterface users(array $params = ['id', 'login'])
 * @method \Psr\Http\Message\ResponseInterface usersBlocks(array $params = ['broadcaster_id', 'first', 'after'])
 * @method \Psr\Http\Message\ResponseInterface usersBlocksDelete(array $params = ['target_user_id'])
 * @method \Psr\Http\Message\ResponseInterface usersBlocksUpdate(array $params = ['target_user_id', 'source_context', 'reason'])
 * @method \Psr\Http\Message\ResponseInterface usersExtensions(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface usersExtensionsList()
 * @method \Psr\Http\Message\ResponseInterface usersExtensionsUpdate()
 * @method \Psr\Http\Message\ResponseInterface usersFollows()
 * @method \Psr\Http\Message\ResponseInterface usersFollowsCreate(array $params = ['from_id', 'to_id', 'allow_notifications'])
 * @method \Psr\Http\Message\ResponseInterface usersFollowsDelete(array $params = ['from_id', 'to_id'])
 * @method \Psr\Http\Message\ResponseInterface usersUpdate(array $params = ['description'])
 * @method \Psr\Http\Message\ResponseInterface videos(array $params = ['id', 'user_id', 'game_id', 'after', 'before', 'first', 'language', 'period', 'sort', 'type'])
 * @method \Psr\Http\Message\ResponseInterface videosDelete(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface webhooksSubscriptions(array $params = ['after', 'first'])
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
