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

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://github.com/tootsuite/documentation/blob/master/Using-the-API/API.md
 */
class MastodonEndpoints extends EndpointMap{

	protected $getCurrentUser = [
		'path'          => '/v1/accounts/verify_credentials',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $updateCurrentUser = [
		'path'          => '/v1/accounts/update_credentials',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['display_name', 'note', 'avatar', 'header', 'locked', 'source', 'fields_attributes'],
		'headers'       => [],
	];

	protected $getAccount = [
		'path'          => '/v1/accounts/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getFollowers = [
		'path'          => '/v1/accounts/%1$s/followers',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getFollowing = [
		'path'          => '/v1/accounts/%1$s/following',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getStatuses = [
		'path'          => '/v1/accounts/%1$s/statuses',
		'method'        => 'GET',
		'query'         => ['only_media', 'pinned', 'exclude_replies', 'max_id', 'since_id', 'limit'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $follow = [
		'path'          => '/v1/accounts/%1$s/follow',
		'method'        => 'POST',
		'query'         => ['reblogs'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $unfollow = [
		'path'          => '/v1/accounts/%1$s/unfollow',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $block = [
		'path'          => '/v1/accounts/%1$s/block',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $unblock = [
		'path'          => '/v1/accounts/%1$s/unblock',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $mute = [
		'path'          => '/v1/accounts/%1$s/mute',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => ['notifications'],
		'headers'       => [],
	];

	protected $unmute = [
		'path'          => '/v1/accounts/%1$s/unmute',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getCurrentUserRelationships = [
		'path'          => '/v1/accounts/relationships',
		'method'        => 'GET',
		'query'         => ['account_id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $userSearch = [
		'path'          => '/v1/accounts/search',
		'method'        => 'GET',
		'query'         => ['q', 'limit', 'following'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $createApp = [
		'path'          => '/v1/apps',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['client_name', 'redirect_uris', 'scopes', 'website'],
		'headers'       => [],
	];

	protected $getCurrentUserBlocks = [
		'path'          => '/v1/blocks',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $getCurrentUserDomainBlocks = [
		'path'          => '/v1/domain_blocks',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $blockDomain = [
		'path'          => '/v1/domain_blocks',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['domain'],
		'headers'       => [],
	];

	protected $unblockDomain = [
		'path'          => '/v1/domain_blocks',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['domain'],
		'headers'       => [],
	];

	protected $getFilters = [
		'path'          => '/v1/filters',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $createFilter = [
		'path'          => '/v1/filters',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['phrase', 'context', 'irreversible', 'whole_word', 'expires_in'],
		'headers'       => [],
	];

	protected $getFilter = [
		'path'          => '/v1/filters/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['filter_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $updateFilter = [
		'path'          => '/v1/filters/%1$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['filter_id'],
		'body'          => ['phrase', 'context', 'irreversible', 'whole_word', 'expires_in'],
		'headers'       => [],
	];

	protected $deleteFilter = [
		'path'          => '/v1/filters/%1$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['filter_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getFollowRequests = [
		'path'          => '/v1/follow_requests',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $acceptFollowRequest = [
		'path'          => '/v1/follow_requests/%1$s/authorize',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['request_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $rejectFollowRequest = [
		'path'          => '/v1/follow_requests/%1$s/reject',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['request_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getFollowSuggestions = [
		'path'          => '/v1/suggestions',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $deleteFollowSuggestion = [
		'path'          => '/v1/suggestions/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $follows = [
		'path'          => '/v1/follows',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['uri'],
		'headers'       => [],
	];

	protected $getInstance = [
		'path'          => '/v1/instance',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $getInstanceCustomEmojis = [
		'path'          => '/v1/custom_emojis',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $getLists = [
		'path'          => '/v1/lists',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $getListsByMembership = [
		'path'          => '/v1/accounts/%1$s/lists',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getList = [
		'path'          => '/v1/lists/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getListMembers = [
		'path'          => '/v1/lists/%1$s/accounts',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $createList = [
		'path'          => '/v1/lists',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['title'],
		'headers'       => [],
	];

	protected $updateList = [
		'path'          => '/v1/lists/%1$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => ['title'],
		'headers'       => [],
	];

	protected $deleteList = [
		'path'          => '/v1/lists/%1$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $addListMembers = [
		'path'          => '/v1/lists/%1$s/accounts',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => ['account_ids'],
		'headers'       => [],
	];

	protected $removeListMembers = [
		'path'          => '/v1/lists/%1$s/accounts',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => ['account_ids'],
		'headers'       => [],
	];

	protected $createAttachment = [
		'path'          => '/v1/media',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['file', 'description', 'focus'],
		'headers'       => [],
	];

	protected $updateAttachment = [
		'path'          => '/v1/media/%1$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['attachment_id'],
		'body'          => ['description', 'focus'],
		'headers'       => [],
	];

	protected $getMutes = [
		'path'          => '/v1/mutes',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getNotifications = [
		'path'          => '/v1/notifications',
		'method'        => 'GET',
		'query'         => ['exclude_types', 'max_id', 'since_id', 'limit'],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getNotification = [
		'path'          => '/v1/notifications/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['notification_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $clearNotifications = [
		'path'          => '/v1/notifications/clear',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $dismissNotification = [
		'path'          => '/v1/notifications/dismiss',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['notification_id'],
		'headers'       => [],
	];

	protected $getPushSubscriptionStatus = [
		'path'          => '/v1/push/subscription',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $addPushSubscription = [
		'path'          => '/v1/push/subscription',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['subscription', 'data'],
		'headers'       => [],
	];

	protected $updatePushSubscription = [
		'path'          => '/v1/push/subscription',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['data'],
		'headers'       => [],
	];

	protected $deletePushSubscription = [
		'path'          => '/v1/push/subscription',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $getReports = [
		'path'          => '/v1/reports',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $report = [
		'path'          => '/v1/reports',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['account_id', 'status_ids', 'comment'],
		'headers'       => [],
	];

	protected $search = [
		'path'          => '/v1/search',
		'method'        => 'GET',
		'query'         => ['q', 'resolve'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $searchV2 = [
		'path'          => '/v2/search', // @todo: separate v2 client?
		'method'        => 'GET',
		'query'         => ['q', 'resolve'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $getToot = [
		'path'          => '/v1/statuses/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getTootContext = [
		'path'          => '/v1/statuses/%1$s/context',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getTootCard = [
		'path'          => '/v1/statuses/%1$s/card',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getTootBoostedBy = [
		'path'          => '/v1/statuses/%1$s/reblogged_by',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getTootFavouritedBy = [
		'path'          => '/v1/statuses/%1$s/favourited_by',
		'method'        => 'GET',
		'query'         => ['max_id', 'since_id', 'limit'],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $toot = [
		'path'          => '/v1/statuses',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['status', 'in_reply_to_id', 'media_ids', 'sensitive', 'spoiler_text', 'visibility', 'language'],
		'headers'       => [], // Idempotency-Key @see https://stripe.com/docs/api#idempotent_requests
	];

	protected $deleteToot = [
		'path'          => '/v1/statuses/%1$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $boost = [
		'path'          => '/v1/statuses/%1$s/reblog',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $unboost = [
		'path'          => '/v1/statuses/%1$s/unreblog',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $favourite = [
		'path'          => '/v1/statuses/%1$s/favourite',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $unfavourite = [
		'path'          => '/v1/statuses/%1$s/unfavourite',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $pinToot = [
		'path'          => '/v1/statuses/%1$s/pin',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $unpinToot = [
		'path'          => '/v1/statuses/%1$s/unpin',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $muteToot = [
		'path'          => '/v1/statuses/%1$s/mute',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $unmuteToot = [
		'path'          => '/v1/statuses/%1$s/unmute',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['toot_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getHomeTimeline = [
		'path'          => '/v1/timelines/home',
		'method'        => 'GET',
		'query'         => ['local', 'only_media', 'max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $getPublicTimeline = [
		'path'          => '/v1/timelines/public',
		'method'        => 'GET',
		'query'         => ['local', 'only_media', 'max_id', 'since_id', 'limit'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $getTagTimeline = [
		'path'          => '/v1/timelines/tag/%1$s',
		'method'        => 'GET',
		'query'         => ['local', 'only_media', 'max_id', 'since_id', 'limit'],
		'path_elements' => ['hashtag'],
		'body'          => null,
		'headers'       => [],
	];

	protected $getListTimeline = [
		'path'          => '/v1/timelines/list/%1$s',
		'method'        => 'GET',
		'query'         => ['local', 'only_media', 'max_id', 'since_id', 'limit'],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

}
