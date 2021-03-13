<?php
/**
 * Class MastodonEndpoints
 *
 * @filesource   MastodonEndpoints.php
 * @created      19.08.2018
 * @package      chillerlan\OAuth\Providers\Mastodon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Mastodon;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://github.com/tootsuite/documentation/blob/master/Using-the-API/API.md
 */
class MastodonEndpoints extends EndpointMap{

	protected array $getCurrentUser = [
		'path'          => '/v1/accounts/verify_credentials',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $updateCurrentUser = [
		'path'          => '/v1/accounts/update_credentials',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['display_name', 'note', 'avatar', 'header', 'locked', 'source', 'fields_attributes'],
		'headers'       => [],
	];

	protected array $getAccount = [
		'path'          => '/v1/accounts/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getFollowers = [
		'path'          => '/v1/accounts/%1$s/followers',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getFollowing = [
		'path'          => '/v1/accounts/%1$s/following',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getStatuses = [
		'path'          => '/v1/accounts/%1$s/statuses',
		'method'        => 'GET',
		'query'         => ['only_media', 'pinned', 'exclude_replies', 'max_id', 'since_id', 'limit'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $follow = [
		'path'          => '/v1/accounts/%1$s/follow',
		'method'        => 'POST',
		'query'         => ['reblogs'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $unfollow = [
		'path'          => '/v1/accounts/%1$s/unfollow',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $block = [
		'path'          => '/v1/accounts/%1$s/block',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $unblock = [
		'path'          => '/v1/accounts/%1$s/unblock',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $mute = [
		'path'          => '/v1/accounts/%1$s/mute',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => ['notifications'],
		'headers'       => [],
	];

	protected array $unmute = [
		'path'          => '/v1/accounts/%1$s/unmute',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getCurrentUserRelationships = [
		'path'          => '/v1/accounts/relationships',
		'method'        => 'GET',
		'query'         => ['account_id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $userSearch = [
		'path'          => '/v1/accounts/search',
		'method'        => 'GET',
		'query'         => ['q', 'limit', 'following'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $createApp = [
		'path'          => '/v1/apps',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['client_name', 'redirect_uris', 'scopes', 'website'],
		'headers'       => [],
	];

	protected array $getCurrentUserBlocks = [
		'path'          => '/v1/blocks',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getCurrentUserDomainBlocks = [
		'path'          => '/v1/domain_blocks',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $blockDomain = [
		'path'          => '/v1/domain_blocks',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['domain'],
		'headers'       => [],
	];

	protected array $unblockDomain = [
		'path'          => '/v1/domain_blocks',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['domain'],
		'headers'       => [],
	];

	protected array $getFilters = [
		'path'          => '/v1/filters',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $createFilter = [
		'path'          => '/v1/filters',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['phrase', 'context', 'irreversible', 'whole_word', 'expires_in'],
		'headers'       => [],
	];

	protected array $getFilter = [
		'path'          => '/v1/filters/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['filter_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $updateFilter = [
		'path'          => '/v1/filters/%1$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['filter_id'],
		'body'          => ['phrase', 'context', 'irreversible', 'whole_word', 'expires_in'],
		'headers'       => [],
	];

	protected array $deleteFilter = [
		'path'          => '/v1/filters/%1$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['filter_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getFollowRequests = [
		'path'          => '/v1/follow_requests',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $acceptFollowRequest = [
		'path'          => '/v1/follow_requests/%1$s/authorize',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['request_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $rejectFollowRequest = [
		'path'          => '/v1/follow_requests/%1$s/reject',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['request_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getFollowSuggestions = [
		'path'          => '/v1/suggestions',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $deleteFollowSuggestion = [
		'path'          => '/v1/suggestions/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $follows = [
		'path'          => '/v1/follows',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['uri'],
		'headers'       => [],
	];

	protected array $getInstance = [
		'path'          => '/v1/instance',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getInstanceCustomEmojis = [
		'path'          => '/v1/custom_emojis',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getLists = [
		'path'          => '/v1/lists',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getListsByMembership = [
		'path'          => '/v1/accounts/%1$s/lists',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getList = [
		'path'          => '/v1/lists/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getListMembers = [
		'path'          => '/v1/lists/%1$s/accounts',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $createList = [
		'path'          => '/v1/lists',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['title'],
		'headers'       => [],
	];

	protected array $updateList = [
		'path'          => '/v1/lists/%1$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => ['title'],
		'headers'       => [],
	];

	protected array $deleteList = [
		'path'          => '/v1/lists/%1$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $addListMembers = [
		'path'          => '/v1/lists/%1$s/accounts',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => ['account_ids'],
		'headers'       => [],
	];

	protected array $removeListMembers = [
		'path'          => '/v1/lists/%1$s/accounts',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => ['account_ids'],
		'headers'       => [],
	];

	protected array $createAttachment = [
		'path'          => '/v1/media',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['file', 'description', 'focus'],
		'headers'       => [],
	];

	protected array $updateAttachment = [
		'path'          => '/v1/media/%1$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['attachment_id'],
		'body'          => ['description', 'focus'],
		'headers'       => [],
	];

	protected array $getMutes = [
		'path'          => '/v1/mutes',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getNotifications = [
		'path'          => '/v1/notifications',
		'method'        => 'GET',
		'query'         => ['exclude_types', 'max_id', 'since_id', 'limit'],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getNotification = [
		'path'          => '/v1/notifications/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['notification_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $clearNotifications = [
		'path'          => '/v1/notifications/clear',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $dismissNotification = [
		'path'          => '/v1/notifications/dismiss',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['notification_id'],
		'headers'       => [],
	];

	protected array $getPushSubscriptionStatus = [
		'path'          => '/v1/push/subscription',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $addPushSubscription = [
		'path'          => '/v1/push/subscription',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['subscription', 'data'],
		'headers'       => [],
	];

	protected array $updatePushSubscription = [
		'path'          => '/v1/push/subscription',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['data'],
		'headers'       => [],
	];

	protected array $deletePushSubscription = [
		'path'          => '/v1/push/subscription',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getReports = [
		'path'          => '/v1/reports',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $report = [
		'path'          => '/v1/reports',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['account_id', 'status_ids', 'comment'],
		'headers'       => [],
	];

	protected array $search = [
		'path'          => '/v1/search',
		'method'        => 'GET',
		'query'         => ['q', 'resolve'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $searchV2 = [
		'path'          => '/v2/search', // @todo: separate v2 client?
		'method'        => 'GET',
		'query'         => ['q', 'resolve'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getToot = [
		'path'          => '/v1/statuses/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getTootContext = [
		'path'          => '/v1/statuses/%1$s/context',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getTootCard = [
		'path'          => '/v1/statuses/%1$s/card',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getTootBoostedBy = [
		'path'          => '/v1/statuses/%1$s/reblogged_by',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getTootFavouritedBy = [
		'path'          => '/v1/statuses/%1$s/favourited_by',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $toot = [
		'path'          => '/v1/statuses',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['status', 'in_reply_to_id', 'media_ids', 'sensitive', 'spoiler_text', 'visibility', 'language'],
		'headers'       => [], // Idempotency-Key @see https://stripe.com/docs/api#idempotent_requests
	];

	protected array $deleteToot = [
		'path'          => '/v1/statuses/%1$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $boost = [
		'path'          => '/v1/statuses/%1$s/reblog',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $unboost = [
		'path'          => '/v1/statuses/%1$s/unreblog',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $favourite = [
		'path'          => '/v1/statuses/%1$s/favourite',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $unfavourite = [
		'path'          => '/v1/statuses/%1$s/unfavourite',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $pinToot = [
		'path'          => '/v1/statuses/%1$s/pin',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $unpinToot = [
		'path'          => '/v1/statuses/%1$s/unpin',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $muteToot = [
		'path'          => '/v1/statuses/%1$s/mute',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $unmuteToot = [
		'path'          => '/v1/statuses/%1$s/unmute',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getHomeTimeline = [
		'path'          => '/v1/timelines/home',
		'method'        => 'GET',
		'query'         => ['local', 'only_media', 'max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getPublicTimeline = [
		'path'          => '/v1/timelines/public',
		'method'        => 'GET',
		'query'         => ['local', 'only_media', 'max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getTagTimeline = [
		'path'          => '/v1/timelines/tag/%1$s',
		'method'        => 'GET',
		'query'         => ['local', 'only_media', 'max_id', 'since_id', 'limit'],
		'path_elements' => ['hashtag'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $getListTimeline = [
		'path'          => '/v1/timelines/list/%1$s',
		'method'        => 'GET',
		'query'         => ['local', 'only_media', 'max_id', 'since_id', 'limit'],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

}
