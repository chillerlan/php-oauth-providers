<?php
/**
 * Class TwitchEndpoints (auto created)
 *
 * @link    https://dev.twitch.tv/docs/api/reference
 * @created 23.03.2021
 * @license MIT
 */

namespace chillerlan\OAuth\Providers\Twitch;

use chillerlan\OAuth\MagicAPI\EndpointMap;

class TwitchEndpoints extends EndpointMap{

	protected string $API_BASE = '/helix';

	/**
	 * Get Extension Analytics
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-extension-analytics
	 */
	protected array $analyticsExtensions = [
		'method'  => 'GET',
		'path'    => '/analytics/extensions',
		'query'   => ['after', 'ended_at', 'extension_id', 'first', 'started_at', 'type'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Game Analytics
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-game-analytics
	 */
	protected array $analyticsGames = [
		'method'  => 'GET',
		'path'    => '/analytics/games',
		'query'   => ['after', 'ended_at', 'first', 'game_id', 'started_at', 'type'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Cheermotes
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-cheermotes
	 */
	protected array $bitsCheermotes = [
		'method'  => 'GET',
		'path'    => '/bits/cheermotes',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Bits Leaderboard
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-bits-leaderboard
	 */
	protected array $bitsLeaderboard = [
		'method'  => 'GET',
		'path'    => '/bits/leaderboard',
		'query'   => ['count', 'period', 'started_at', 'user_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Custom Reward
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-custom-reward
	 */
	protected array $channelPointsCustomRewards = [
		'method'  => 'GET',
		'path'    => '/channel_points/custom_rewards',
		'query'   => ['broadcaster_id', 'id', 'only_manageable_rewards'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create Custom Rewards
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-custom-rewards
	 */
	protected array $channelPointsCustomRewardsCreate = [
		'method'  => 'POST',
		'path'    => '/channel_points/custom_rewards',
		'query'   => ['broadcaster_id'],
		'body'    => ['title', 'prompt', 'cost', 'is_enabled', 'background_color', 'is_user_input_required', 'is_max_per_stream_enabled', 'max_per_stream', 'is_max_per_user_per_stream_enabled', 'max_per_user_per_stream', 'is_global_cooldown_enabled', 'global_cooldown_seconds', 'should_redemptions_skip_request_queue'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Delete Custom Reward
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#delete-custom-reward
	 */
	protected array $channelPointsCustomRewardsDelete = [
		'method'  => 'DELETE',
		'path'    => '/channel_points/custom_rewards',
		'query'   => ['broadcaster_id', 'id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Custom Reward Redemption
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-custom-reward-redemption
	 */
	protected array $channelPointsCustomRewardsRedemptions = [
		'method'  => 'GET',
		'path'    => '/channel_points/custom_rewards/redemptions',
		'query'   => ['broadcaster_id', 'reward_id', 'id', 'status', 'sort', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Update Redemption Status
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#update-redemption-status
	 */
	protected array $channelPointsCustomRewardsRedemptionsUpdate = [
		'method'  => 'PATCH',
		'path'    => '/channel_points/custom_rewards/redemptions',
		'query'   => ['id', 'broadcaster_id', 'reward_id'],
		'body'    => ['status'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Update Custom Reward
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#update-custom-reward
	 */
	protected array $channelPointsCustomRewardsUpdate = [
		'method'  => 'PATCH',
		'path'    => '/channel_points/custom_rewards',
		'query'   => ['broadcaster_id', 'id'],
		'body'    => ['title', 'prompt', 'cost', 'background_color', 'is_enabled', 'is_user_input_required', 'is_max_per_stream_enabled', 'max_per_stream', 'is_max_per_user_per_stream_enabled', 'max_per_user_per_stream', 'is_global_cooldown_enabled', 'global_cooldown_seconds', 'is_paused', 'should_redemptions_skip_request_queue'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Channel Information
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-channel-information
	 */
	protected array $channels = [
		'method'  => 'GET',
		'path'    => '/channels',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Start Commercial
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#start-commercial
	 */
	protected array $channelsCommercial = [
		'method'  => 'POST',
		'path'    => '/channels/commercial',
		'query'   => null,
		'body'    => ['broadcaster_id', 'length'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Channel Editors
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-channel-editors
	 */
	protected array $channelsEditors = [
		'method'  => 'GET',
		'path'    => '/channels/editors',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Modify Channel Information
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#modify-channel-information
	 */
	protected array $channelsUpdate = [
		'method'  => 'PATCH',
		'path'    => '/channels',
		'query'   => ['broadcaster_id'],
		'body'    => ['game_id', 'broadcaster_language', 'title'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Clips
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-clips
	 */
	protected array $clips = [
		'method'  => 'GET',
		'path'    => '/clips',
		'query'   => ['broadcaster_id', 'game_id', 'id', 'after', 'before', 'ended_at', 'first', 'started_at'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create Clip
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-clip
	 */
	protected array $clipsCreate = [
		'method'  => 'POST',
		'path'    => '/clips',
		'query'   => ['broadcaster_id', 'has_delay'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Code Status
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-code-status
	 */
	protected array $entitlementsCodes = [
		'method'  => 'GET',
		'path'    => '/entitlements/codes',
		'query'   => ['Param', 'code', 'user_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Redeem Code
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#redeem-code
	 */
	protected array $entitlementsCodesCreate = [
		'method'  => 'POST',
		'path'    => '/entitlements/codes',
		'query'   => ['code', 'user_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Drops Entitlements
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-drops-entitlements
	 */
	protected array $entitlementsDrops = [
		'method'  => 'GET',
		'path'    => '/entitlements/drops',
		'query'   => ['id', 'user_id', 'game_id', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get EventSub Subscriptions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-eventsub-subscriptions
	 */
	protected array $eventsubSubscriptions = [
		'method'  => 'GET',
		'path'    => '/eventsub/subscriptions',
		'query'   => ['status', 'type'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create EventSub Subscription
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-eventsub-subscription
	 */
	protected array $eventsubSubscriptionsCreate = [
		'method'  => 'POST',
		'path'    => '/eventsub/subscriptions',
		'query'   => null,
		'body'    => ['type', 'version', 'condition', 'transport'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Delete EventSub Subscription
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#delete-eventsub-subscription
	 */
	protected array $eventsubSubscriptionsDelete = [
		'method'  => 'DELETE',
		'path'    => '/eventsub/subscriptions',
		'query'   => ['id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Extension Transactions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-extension-transactions
	 */
	protected array $extensionsTransactions = [
		'method'  => 'GET',
		'path'    => '/extensions/transactions',
		'query'   => ['extension_id', 'id', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Games
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-games
	 */
	protected array $games = [
		'method'  => 'GET',
		'path'    => '/games',
		'query'   => ['id', 'name'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Top Games
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-top-games
	 */
	protected array $gamesTop = [
		'method'  => 'GET',
		'path'    => '/games/top',
		'query'   => ['after', 'before', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Hype Train Events
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-hype-train-events
	 */
	protected array $hypetrainEvents = [
		'method'  => 'GET',
		'path'    => '/hypetrain/events',
		'query'   => ['broadcaster_id', 'first', 'id', 'cursor'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Banned Users
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-banned-users
	 */
	protected array $moderationBanned = [
		'method'  => 'GET',
		'path'    => '/moderation/banned',
		'query'   => ['broadcaster_id', 'user_id', 'first', 'after', 'before'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Banned Events
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-banned-events
	 */
	protected array $moderationBannedEvents = [
		'method'  => 'GET',
		'path'    => '/moderation/banned/events',
		'query'   => ['broadcaster_id', 'user_id', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Check AutoMod Status
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#check-automod-status
	 */
	protected array $moderationEnforcementsStatus = [
		'method'  => 'POST',
		'path'    => '/moderation/enforcements/status',
		'query'   => ['broadcaster_id'],
		'body'    => ['msg_id', 'msg_text', 'user_id'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Moderators
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-moderators
	 */
	protected array $moderationModerators = [
		'method'  => 'GET',
		'path'    => '/moderation/moderators',
		'query'   => ['broadcaster_id', 'user_id', 'first', 'after'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Moderator Events
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-moderator-events
	 */
	protected array $moderationModeratorsEvents = [
		'method'  => 'GET',
		'path'    => '/moderation/moderators/events',
		'query'   => ['broadcaster_id', 'user_id', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Search Categories
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#search-categories
	 */
	protected array $searchCategories = [
		'method'  => 'GET',
		'path'    => '/search/categories',
		'query'   => ['query', 'first', 'after'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Search Channels
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#search-channels
	 */
	protected array $searchChannels = [
		'method'  => 'GET',
		'path'    => '/search/channels',
		'query'   => ['query', 'first', 'after', 'live_only'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Streams
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-streams
	 */
	protected array $streams = [
		'method'  => 'GET',
		'path'    => '/streams',
		'query'   => ['after', 'before', 'first', 'game_id', 'language', 'user_id', 'user_login'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Stream Key
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-stream-key
	 */
	protected array $streamsKey = [
		'method'  => 'GET',
		'path'    => '/streams/key',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Stream Markers
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-stream-markers
	 */
	protected array $streamsMarkers = [
		'method'  => 'GET',
		'path'    => '/streams/markers',
		'query'   => ['user_id', 'video_id', 'after', 'before', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create Stream Marker
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-stream-marker
	 */
	protected array $streamsMarkersCreate = [
		'method'  => 'POST',
		'path'    => '/streams/markers',
		'query'   => null,
		'body'    => ['user_id', 'description'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Stream Tags
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-stream-tags
	 */
	protected array $streamsTags = [
		'method'  => 'GET',
		'path'    => '/streams/tags',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Replace Stream Tags
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#replace-stream-tags
	 */
	protected array $streamsTagsUpdate = [
		'method'  => 'PUT',
		'path'    => '/streams/tags',
		'query'   => ['broadcaster_id'],
		'body'    => ['tag_ids'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Broadcaster Subscriptions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-broadcaster-subscriptions
	 */
	protected array $subscriptions = [
		'method'  => 'GET',
		'path'    => '/subscriptions',
		'query'   => ['broadcaster_id', 'user_id', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Check User Subscription
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#check-user-subscription
	 */
	protected array $subscriptionsUser = [
		'method'  => 'GET',
		'path'    => '/subscriptions/user',
		'query'   => ['broadcaster_id', 'user_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get All Stream Tags
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-all-stream-tags
	 */
	protected array $tagsStreams = [
		'method'  => 'GET',
		'path'    => '/tags/streams',
		'query'   => ['after', 'first', 'tag_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Teams
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-teams
	 */
	protected array $teams = [
		'method'  => 'GET',
		'path'    => '/teams',
		'query'   => ['name', 'id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Channel Teams
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-channel-teams
	 */
	protected array $teamsChannel = [
		'method'  => 'GET',
		'path'    => '/teams/channel',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Users
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-users
	 */
	protected array $users = [
		'method'  => 'GET',
		'path'    => '/users',
		'query'   => ['id', 'login'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get User Block List
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-user-block-list
	 */
	protected array $usersBlocks = [
		'method'  => 'GET',
		'path'    => '/users/blocks',
		'query'   => ['broadcaster_id', 'first', 'after'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Unblock User
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#unblock-user
	 */
	protected array $usersBlocksDelete = [
		'method'  => 'DELETE',
		'path'    => '/users/blocks',
		'query'   => ['target_user_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Block User
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#block-user
	 */
	protected array $usersBlocksUpdate = [
		'method'  => 'PUT',
		'path'    => '/users/blocks',
		'query'   => ['target_user_id', 'source_context', 'reason'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get User Active Extensions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-user-active-extensions
	 */
	protected array $usersExtensions = [
		'method'  => 'GET',
		'path'    => '/users/extensions',
		'query'   => ['user_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get User Extensions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-user-extensions
	 */
	protected array $usersExtensionsList = [
		'method'  => 'GET',
		'path'    => '/users/extensions/list',
		'query'   => null,
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Update User Extensions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#update-user-extensions
	 */
	protected array $usersExtensionsUpdate = [
		'method'  => 'PUT',
		'path'    => '/users/extensions',
		'query'   => null,
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Users Follows
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-users-follows
	 */
	protected array $usersFollows = [
		'method'  => 'GET',
		'path'    => '/users/follows',
		'query'   => null,
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create User Follows
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-user-follows
	 */
	protected array $usersFollowsCreate = [
		'method'  => 'POST',
		'path'    => '/users/follows',
		'query'   => ['from_id', 'to_id', 'allow_notifications'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Delete User Follows
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#delete-user-follows
	 */
	protected array $usersFollowsDelete = [
		'method'  => 'DELETE',
		'path'    => '/users/follows',
		'query'   => ['from_id', 'to_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Update User
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#update-user
	 */
	protected array $usersUpdate = [
		'method'  => 'PUT',
		'path'    => '/users',
		'query'   => ['description'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Videos
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-videos
	 */
	protected array $videos = [
		'method'  => 'GET',
		'path'    => '/videos',
		'query'   => ['id', 'user_id', 'game_id', 'after', 'before', 'first', 'language', 'period', 'sort', 'type'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Delete Videos
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#delete-videos
	 */
	protected array $videosDelete = [
		'method'  => 'DELETE',
		'path'    => '/videos',
		'query'   => ['id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Webhook Subscriptions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-webhook-subscriptions
	 */
	protected array $webhooksSubscriptions = [
		'method'  => 'GET',
		'path'    => '/webhooks/subscriptions',
		'query'   => ['after', 'first'],
		'body'    => null,
		'headers' => null,
	];

}
