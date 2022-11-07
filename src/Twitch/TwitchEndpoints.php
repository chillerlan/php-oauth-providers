<?php
/**
 * Class TwitchEndpoints (auto created)
 *
 * @link    https://dev.twitch.tv/docs/api/reference
 * @created 03.10.2021
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
	 * Get Extension Bits Products
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-extension-bits-products
	 */
	protected array $bitsExtensions = [
		'method'  => 'GET',
		'path'    => '/bits/extensions',
		'query'   => ['should_include_all'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Update Extension Bits Product
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#update-extension-bits-product
	 */
	protected array $bitsExtensionsUpdate = [
		'method'  => 'PUT',
		'path'    => '/bits/extensions',
		'query'   => null,
		'body'    => ['sku', 'cost', 'cost.amount', 'cost.type', 'display_name', 'in_development', 'expiration', 'is_broadcast'],
		'headers' => ['Content-Type' => 'application/json'],
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
		'body'    => ['title', 'cost', 'prompt', 'is_enabled', 'background_color', 'is_user_input_required', 'is_max_per_stream_enabled', 'max_per_stream', 'is_max_per_user_per_stream_enabled', 'max_per_user_per_stream', 'is_global_cooldown_enabled', 'global_cooldown_seconds', 'should_redemptions_skip_request_queue'],
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
		'body'    => ['game_id', 'broadcaster_language', 'title', 'delay'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Channel Chat Badges
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-channel-chat-badges
	 */
	protected array $chatBadges = [
		'method'  => 'GET',
		'path'    => '/chat/badges',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Global Chat Badges
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-global-chat-badges
	 */
	protected array $chatBadgesGlobal = [
		'method'  => 'GET',
		'path'    => '/chat/badges/global',
		'query'   => null,
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Channel Emotes
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-channel-emotes
	 */
	protected array $chatEmotes = [
		'method'  => 'GET',
		'path'    => '/chat/emotes',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Global Emotes
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-global-emotes
	 */
	protected array $chatEmotesGlobal = [
		'method'  => 'GET',
		'path'    => '/chat/emotes/global',
		'query'   => null,
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Emote Sets
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-emote-sets
	 */
	protected array $chatEmotesSet = [
		'method'  => 'GET',
		'path'    => '/chat/emotes/set',
		'query'   => ['emote_set_id'],
		'body'    => null,
		'headers' => null,
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
		'query'   => ['id', 'user_id', 'game_id', 'fulfillment_status', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Update Drops Entitlements
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#update-drops-entitlements
	 */
	protected array $entitlementsDropsUpdate = [
		'method'  => 'PATCH',
		'path'    => '/entitlements/drops',
		'query'   => ['entitlement_ids', 'fulfillment_status'],
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
		'query'   => ['status', 'type', 'after'],
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
	 * Get Extensions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-extensions
	 */
	protected array $extensions = [
		'method'  => 'GET',
		'path'    => '/extensions',
		'query'   => ['extension_id', 'extension_version'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Send Extension Chat Message
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#send-extension-chat-message
	 */
	protected array $extensionsChat = [
		'method'  => 'POST',
		'path'    => '/extensions/chat',
		'query'   => ['broadcaster_id'],
		'body'    => ['text', 'extension_id', 'extension_version'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Extension Configuration Segment
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-extension-configuration-segment
	 */
	protected array $extensionsConfigurations = [
		'method'  => 'GET',
		'path'    => '/extensions/configurations',
		'query'   => ['broadcaster_id', 'extension_id', 'segment'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Set Extension Configuration Segment
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#set-extension-configuration-segment
	 */
	protected array $extensionsConfigurationsUpdate = [
		'method'  => 'PUT',
		'path'    => '/extensions/configurations',
		'query'   => null,
		'body'    => ['extension_id', 'segment', 'broadcaster_id', 'content', 'version'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Extension Secrets
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-extension-secrets
	 */
	protected array $extensionsJwtSecrets = [
		'method'  => 'GET',
		'path'    => '/extensions/jwt/secrets',
		'query'   => null,
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create Extension Secret
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-extension-secret
	 */
	protected array $extensionsJwtSecretsCreate = [
		'method'  => 'POST',
		'path'    => '/extensions/jwt/secrets',
		'query'   => ['delay'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Extension Live Channels
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-extension-live-channels
	 */
	protected array $extensionsLive = [
		'method'  => 'GET',
		'path'    => '/extensions/live',
		'query'   => ['extension_id', 'first', 'after'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Send Extension PubSub Message
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#send-extension-pubsub-message
	 */
	protected array $extensionsPubsub = [
		'method'  => 'POST',
		'path'    => '/extensions/pubsub',
		'query'   => null,
		'body'    => ['target', 'broadcaster_id', 'is_global_broadcast', 'message'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Released Extensions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-released-extensions
	 */
	protected array $extensionsReleased = [
		'method'  => 'GET',
		'path'    => '/extensions/released',
		'query'   => ['extension_id', 'extension_version'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Set Extension Required Configuration
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#set-extension-required-configuration
	 */
	protected array $extensionsRequiredConfiguration = [
		'method'  => 'PUT',
		'path'    => '/extensions/required_configuration',
		'query'   => ['broadcaster_id'],
		'body'    => ['extension_id', 'extension_version', 'configuration_version'],
		'headers' => ['Content-Type' => 'application/json'],
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
	 * Get Creator Goals
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-creator-goals
	 */
	protected array $goals = [
		'method'  => 'GET',
		'path'    => '/goals',
		'query'   => ['broadcaster_id'],
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
	 * Manage Held AutoMod Messages
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#manage-held-automod-messages
	 */
	protected array $moderationAutomodMessage = [
		'method'  => 'POST',
		'path'    => '/moderation/automod/message',
		'query'   => null,
		'body'    => ['user_id', 'msg_id', 'action'],
		'headers' => ['Content-Type' => 'application/json'],
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
	 * Get Polls
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-polls
	 */
	protected array $polls = [
		'method'  => 'GET',
		'path'    => '/polls',
		'query'   => ['broadcaster_id', 'id', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create Poll
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-poll
	 */
	protected array $pollsCreate = [
		'method'  => 'POST',
		'path'    => '/polls',
		'query'   => null,
		'body'    => ['broadcaster_id', 'title', 'choices', 'choice.title', 'duration', 'bits_voting_enabled', 'bits_per_vote', 'channel_points_voting_enabled', 'channel_points_per_vote'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * End Poll
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#end-poll
	 */
	protected array $pollsUpdate = [
		'method'  => 'PATCH',
		'path'    => '/polls',
		'query'   => null,
		'body'    => ['broadcaster_id', 'id', 'status'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Predictions
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-predictions
	 */
	protected array $predictions = [
		'method'  => 'GET',
		'path'    => '/predictions',
		'query'   => ['broadcaster_id', 'id', 'after', 'first'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create Prediction
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-prediction
	 */
	protected array $predictionsCreate = [
		'method'  => 'POST',
		'path'    => '/predictions',
		'query'   => null,
		'body'    => ['broadcaster_id', 'title', 'outcomes', 'outcome.title', 'prediction_window'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * End Prediction
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#end-prediction
	 */
	protected array $predictionsUpdate = [
		'method'  => 'PATCH',
		'path'    => '/predictions',
		'query'   => null,
		'body'    => ['broadcaster_id', 'id', 'status', 'winning_outcome_id'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Channel Stream Schedule
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-channel-stream-schedule
	 */
	protected array $schedule = [
		'method'  => 'GET',
		'path'    => '/schedule',
		'query'   => ['broadcaster_id', 'id', 'start_time', 'utc_offset', 'first', 'after'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Get Channel iCalendar
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-channel-icalendar
	 */
	protected array $scheduleIcalendar = [
		'method'  => 'GET',
		'path'    => '/schedule/icalendar',
		'query'   => ['broadcaster_id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Create Channel Stream Schedule Segment
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#create-channel-stream-schedule-segment
	 */
	protected array $scheduleSegmentCreate = [
		'method'  => 'POST',
		'path'    => '/schedule/segment',
		'query'   => ['broadcaster_id'],
		'body'    => ['start_time', 'timezone', 'is_recurring', 'duration', 'category_id', 'title'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Delete Channel Stream Schedule Segment
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#delete-channel-stream-schedule-segment
	 */
	protected array $scheduleSegmentDelete = [
		'method'  => 'DELETE',
		'path'    => '/schedule/segment',
		'query'   => ['broadcaster_id', 'id'],
		'body'    => null,
		'headers' => null,
	];

	/**
	 * Update Channel Stream Schedule Segment
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#update-channel-stream-schedule-segment
	 */
	protected array $scheduleSegmentUpdate = [
		'method'  => 'PATCH',
		'path'    => '/schedule/segment',
		'query'   => ['broadcaster_id', 'id'],
		'body'    => ['start_time', 'duration', 'category_id', 'title', 'is_canceled', 'timezone'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Update Channel Stream Schedule
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#update-channel-stream-schedule
	 */
	protected array $scheduleSettings = [
		'method'  => 'PATCH',
		'path'    => '/schedule/settings',
		'query'   => ['broadcaster_id', 'is_vacation_enabled', 'vacation_start_time', 'vacation_end_time', 'timezone'],
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
	 * Get Followed Streams
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-followed-streams
	 */
	protected array $streamsFollowed = [
		'method'  => 'GET',
		'path'    => '/streams/followed',
		'query'   => ['user_id', 'after', 'first'],
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
		'body'    => ['data'],
		'headers' => ['Content-Type' => 'application/json'],
	];

	/**
	 * Get Users Follows
	 *
	 * @link https://dev.twitch.tv/docs/api/reference#get-users-follows
	 */
	protected array $usersFollows = [
		'method'  => 'GET',
		'path'    => '/users/follows',
		'query'   => ['after', 'first', 'from_id', 'to_id'],
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

}
