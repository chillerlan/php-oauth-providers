<?php
/**
 * Class TwitterEndpoints
 *
 * @filesource   TwitterEndpoints.php
 * @created      08.04.2018
 * @package      chillerlan\OAuth\Providers\Twitter
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitter;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * https://developer.twitter.com/en/docs/basics/getting-started
 *
 * Note: the endpoints are ordered by the api docs (against any logical pattern)
 */
class TwitterEndpoints extends EndpointMap{

	/**
	 * 1 Basics
	 *
	 * @todo
	 */

	/**
	 * 2 Accounts and users
	 */

	/**
	 * 2.1 Manage account settings and profile
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/subscribe-account-activity/overview
	 */

	/**
	 * @todo POST account_activity/all/:env_name/webhooks
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/subscribe-account-activity/api-reference/aaa-standard-all
	 */

	/**
	 * @todo POST account_activity/webhooks
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/subscribe-account-activity/api-reference/aaa-standard-dm
	 */

	/**
	 * 2.2 Manage account settings and profile
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/get-account-settings
	 */
	protected $accountSettings = [
		'path'          => '/account/settings.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/get-account-verify_credentials
	 */
	protected $verifyCredentials = [
		'path'          => '/account/verify_credentials.json',
		'method'        => 'GET',
		'query'         => ['include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/get-users-profile_banner
	 */
	protected $usersProfileBanner = [
		'path'          => '/users/profile_banner.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-remove_profile_banner
	 */
	protected $accountRemoveProfileBanner = [
		'path'          => '/account/remove_profile_banner.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-settings
	 */
	protected $accountUpdateSettings = [
		'path'          => '/account/settings.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => [
			'sleep_time_enabled', 'start_sleep_time', 'end_sleep_time', 'time_zone', 'trend_location_woeid', 'lang',
		],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-update_profile
	 */
	protected $accountUpdateProfile = [
		'path'          => '/account/update_profile.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['name', 'url', 'location', 'description', 'profile_link_color', 'include_entities', 'skip_status',],
		'headers'       => [],
	];

	/**
	 * @todo POST account/update_profile_background_image
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-update_profile_background_image
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/user-profile-images-and-banners
	 */

	/**
	 * @todo POST account/update_profile_banner
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-update_profile_banner
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/user-profile-images-and-banners
	 */

	/**
	 * @todo POST account/update_profile_image
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-update_profile_image
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/user-profile-images-and-banners
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/get-saved_searches-list
	 */
	protected $savedSearchesList = [
		'path'          => '/saved_searches/list.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/get-saved_searches-show-id
	 */
	protected $savedSearchesShow = [
		'path'          => '/saved_searches/show/%1$s.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-saved_searches-create
	 */
	protected $savedSearchesCreate = [
		'path'          => '/saved_searches/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['query'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-saved_searches-destroy-id
	 */
	protected $savedSearchesDestroy = [
		'path'          => '/saved_searches/destroy/%1$s.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 2.3 Mute, block and report users
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/get-blocks-ids
	 */
	protected $blocksIds = [
		'path'          => '/blocks/ids.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'stringify_ids'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/get-blocks-list
	 */
	protected $blocksList = [
		'path'          => '/blocks/list.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/get-mutes-users-ids
	 */
	protected $mutesUsersIds = [
		'path'          => '/mutes/users/ids.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'stringify_ids'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/get-mutes-users-list
	 */
	protected $mutesUsersList = [
		'path'          => '/mutes/users/list.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-blocks-create
	 */
	protected $block = [
		'path'          => '/blocks/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-blocks-destroy
	 */
	protected $unblock = [
		'path'          => '/blocks/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-mutes-users-create
	 */
	protected $mute = [
		'path'          => '/mutes/users/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-mutes-users-destroy
	 */
	protected $unmute = [
		'path'          => '/mutes/users/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-users-report_spam
	 */
	protected $reportSpam = [
		'path'          => '/users/report_spam.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['user_id', 'screen_name', 'perform_block'],
		'headers'       => [],
	];

	/**
	 * 2.4 Follow, search, and get users
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-followers-ids
	 */
	protected $followersIds = [
		'path'          => '/followers/ids.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'stringify_ids', 'cursor', 'count'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-followers-list
	 */
	protected $followersList = [
		'path'          => '/followers/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'cursor', 'count', 'include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friends-ids
	 */
	protected $friendsIds = [
		'path'          => '/friends/ids.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'stringify_ids', 'cursor', 'count'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friends-list
	 */
	protected $friendsList = [
		'path'          => '/friends/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'cursor', 'count', 'include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-incoming
	 */
	protected $friendshipsIncoming = [
		'path'          => '/friendships/incoming.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'stringify_ids'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-lookup
	 */
	protected $friendshipsLookup = [
		'path'          => '/friendships/lookup.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-no_retweets-ids
	 */
	protected $friendshipsNoRetweetsIds = [
		'path'          => '/friendships/no_retweets/ids.json',
		'method'        => 'GET',
		'query'         => ['stringify_ids'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-outgoing
	 */
	protected $friendshipsOutgoing = [
		'path'          => '/friendships/outgoing.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'stringify_ids'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-show
	 */
	protected $friendshipsShow = [
		'path'          => '/friendships/show.json',
		'method'        => 'GET',
		'query'         => ['source_id', 'source_screen_name', 'target_id', 'target_screen_name',],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-lookup
	 */
	protected $usersLookup = [
		'path'          => '/users/lookup.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-search
	 */
	protected $usersSearch = [
		'path'          => '/users/search.json',
		'method'        => 'GET',
		'query'         => ['q', 'page', 'count', 'include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-show
	 */
	protected $usersShow = [
		'path'          => '/users/show.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-suggestions
	 */
	protected $usersSuggestions = [
		'path'          => '/users/suggestions.json',
		'method'        => 'GET',
		'query'         => ['lang'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-suggestions-slug
	 */
	protected $usersSuggestionsSlug = [
		'path'          => '/users/suggestions/%1$s.json',
		'method'        => 'GET',
		'query'         => ['lang'],
		'path_elements' => ['slug'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-suggestions-slug-members
	 */
	protected $usersSuggestionsSlugMembers = [
		'path'          => '/users/suggestions/%1$s/members.json',
		'method'        => 'GET',
		'query'         => ['lang'],
		'path_elements' => ['slug'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/post-friendships-create
	 */
	protected $follow = [
		'path'          => '/friendships/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['user_id', 'screen_name', 'follow'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/post-friendships-destroy
	 */
	protected $unfollow = [
		'path'          => '/friendships/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['user_id', 'screen_name'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/post-friendships-update
	 */
	protected $friendshipsUpdate = [
		'path'          => '/friendships/update.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['user_id', 'screen_name', 'device', 'retweets'],
		'headers'       => [],
	];

	/**
	 * 2.6 Create and manage lists
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-list
	 */
	protected $lists = [
		'path'          => '/lists/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'reverse'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-members
	 */
	protected $listsMembers = [
		'path'          => '/lists/members.json',
		'method'        => 'GET',
		'query'         => [
			'list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'cursor', 'include_entities', 'skip_status',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-members-show
	 */
	protected $listsMembersShow = [
		'path'          => '/lists/members/show.json',
		'method'        => 'GET',
		'query'         => [
			'list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id', 'include_entities', 'skip_status',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-memberships
	 */
	protected $listsMemberships = [
		'path'          => '/lists/memberships.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'count', 'cursor', 'filter_to_owned_lists'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-ownerships
	 */
	protected $listsOwnerships = [
		'path'          => '/lists/ownerships.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'count', 'cursor'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-show
	 */
	protected $listsShow = [
		'path'          => '/lists/show.json',
		'method'        => 'GET',
		'query'         => ['list_id', 'slug', 'owner_screen_name', 'owner_id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-statuses
	 */
	protected $listsStatuses = [
		'path'          => '/lists/statuses.json',
		'method'        => 'GET',
		'query'         => [
			'list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'since_id',
			'max_id', 'trim_user', 'include_rts', 'include_entities',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-subscribers
	 */
	protected $listsSubscribers = [
		'path'          => '/lists/subscribers.json',
		'method'        => 'GET',
		'query'         => [
			'list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'cursor', 'trim_user', 'skip_status', 'include_entities',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-subscribers-show
	 */
	protected $listsSubscribersShow = [
		'path'          => '/lists/subscribers/show.json',
		'method'        => 'GET',
		'query'         => [
			'owner_screen_name', 'owner_id', 'list_id', 'slug', 'user_id', 'screen_name', 'skip_status', 'include_entities',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-subscriptions
	 */
	protected $listsSubscriptions = [
		'path'          => '/lists/subscriptions.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'count', 'cursor'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-create
	 */
	protected $listsCreate = [
		'path'          => '/lists/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['name', 'mode', 'description'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-destroy
	 */
	protected $listsDestroy = [
		'path'          => '/lists/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['list_id', 'slug', 'owner_screen_name', 'owner_id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-members-create
	 */
	protected $listsMembersCreate = [
		'path'          => '/lists/members/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-members-create_all
	 */
	protected $listsMembersCreateAll = [
		'path'          => '/lists/members/create_all.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-members-destroy
	 */
	protected $listsMembersDestroy = [
		'path'          => '/lists/members/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-members-destroy_all
	 */
	protected $listsMembersDestroyAll = [
		'path'          => '/lists/members/destroy_all.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-subscribers-create
	 */
	protected $listsSubscribersCreate = [
		'path'          => '/lists/subscribers/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['list_id', 'slug', 'owner_screen_name', 'owner_id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-subscribers-destroy
	 */
	protected $listsSubscribersDestroy = [
		'path'          => '/lists/subscribers/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['list_id', 'slug', 'owner_screen_name', 'owner_id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-update
	 */
	protected $listsUpdate = [
		'path'          => '/lists/update.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['list_id', 'slug', 'name', 'mode', 'description', 'owner_screen_name', 'owner_id'],
		'headers'       => [],
	];

	/**
	 * 3 Tweets
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/optimize-with-cards/overview/abouts-cards
	 */

	/**
	 * 3.1 Post, retrieve and engage with Tweets
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-statuses-update
	 * @see \chillerlan\Twitter\Twitter::tweet()
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-statuses-destroy-id
	 */
	protected $statusesDestroyId = [
		'path'          => '/statuses/destroy/%1$s.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['id'],
		'body'          => ['trim_user'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-show-id
	 */
	protected $statusesShowId = [
		'path'          => '/statuses/show/%1$s.json',
		'method'        => 'GET',
		'query'         => ['trim_user', 'include_my_retweet', 'include_entities', 'include_ext_alt_text'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @todo GET statuses/oembed
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-oembed
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-lookup
	 */
	protected $statusesLookup = [
		'path'          => '/statuses/lookup.json',
		'method'        => 'GET',
		'query'         => ['id', 'trim_user', 'map', 'include_ext_alt_text', 'skip_status', 'include_entities'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-statuses-retweet-id
	 */
	protected $retweet = [
		'path'          => '/statuses/retweet/%1$s.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['id'],
		'body'          => ['trim_user'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-statuses-unretweet-id
	 */
	protected $unretweet = [
		'path'          => '/statuses/unretweet/%1$s.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['id'],
		'body'          => ['trim_user'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-retweets-id
	 */
	protected $statusesRetweetsId = [
		'path'          => '/statuses/retweets/%1$s.json',
		'method'        => 'GET',
		'query'         => ['trim_user', 'include_my_retweet', 'include_entities', 'include_ext_alt_text'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-retweets_of_me
	 */
	protected $statusesRetweetsOfMe = [
		'path'          => '/statuses/retweets_of_me.json',
		'method'        => 'GET',
		'query'         => [
			'count', 'since_id', 'max_id', 'trim_user', 'skip_status', 'include_entities', 'include_user_entities',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-retweeters-ids
	 */
	protected $statusesRetweetersIds = [
		'path'          => '/statuses/retweeters/ids.json',
		'method'        => 'GET',
		'query'         => ['id', 'stringify_ids', 'cursor'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-favorites-create
	 */
	protected $favorite = [
		'path'          => '/favorites/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id', 'include_entities'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-favorites-destroy
	 */
	protected $unfavorite = [
		'path'          => '/favorites/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id', 'include_entities'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-favorites-list
	 */
	protected $favoritesList = [
		'path'          => '/favorites/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'count', 'since_id', 'max_id', 'skip_status', 'include_entities'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 3.2 Get Tweet timelines
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/timelines/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-home_timeline
	 */
	protected $homeTimeline = [
		'path'          => '/statuses/home_timeline.json',
		'method'        => 'GET',
		'query'         => [
			'exclude_replies', 'trim_user', 'count', 'until', 'since_id', 'max_id', 'skip_status', 'include_entities',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-mentions_timeline
	 */
	protected $mentionsTimeline = [
		'path'          => '/statuses/mentions_timeline.json',
		'method'        => 'GET',
		'query'         => ['count', 'since_id', 'max_id', 'trim_user', 'skip_status', 'include_entities'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-user_timeline
	 */
	protected $userTimeline = [
		'path'          => '/statuses/user_timeline.json',
		'method'        => 'GET',
		'query'         => [
			'user_id', 'screen_name', 'since_id', 'count', 'max_id', 'trim_user',
			'exclude_replies', 'include_rts', 'include_entities',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 3.3 Curate a collection of Tweets
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/overview/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/get-collections-entries
	 */
	protected $collectionsEntries = [
		'path'          => '/collections/entries.json',
		'method'        => 'GET',
		'query'         => ['id', 'count', 'max_position', 'min_position'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/get-collections-list
	 */
	protected $collectionsList = [
		'path'          => '/collections/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'tweet_id', 'cursor', 'count'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/get-collections-show
	 */
	protected $collectionsShow = [
		'path'          => '/collections/show.json',
		'method'        => 'GET',
		'query'         => ['id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-create
	 */
	protected $collectionsCreate = [
		'path'          => '/collections/create.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['name', 'description', 'url', 'timeline_order'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-destroy
	 */
	protected $collectionsDestroy = [
		'path'          => '/collections/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-entries-add
	 */
	protected $collectionsEntriesAdd = [
		'path'          => '/collections/entries/add.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id', 'tweet_id', 'relative_to', 'above'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-entries-curate
	 */
	protected $collectionsEntriesCurate = [
		'path'          => '/collections/entries/curate.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id', 'changes'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-entries-move
	 */
	protected $collectionsEntriesMove = [
		'path'          => '/collections/entries/move.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id', 'tweet_id', 'relative_to', 'above'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-entries-remove
	 */
	protected $collectionsEntriesRemove = [
		'path'          => '/collections/entries/remove.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id', 'tweet_id'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-update
	 */
	protected $collectionsUpdate = [
		'path'          => '/collections/update.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id', 'name', 'description', 'url'],
		'headers'       => [],
	];

	/**
	 * 3.4 Search Tweets
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/search/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/search/api-reference/get-search-tweets
	 */
	protected $searchTweets = [
		'path'          => '/search/tweets.json',
		'method'        => 'GET',
		'query'         => [
			'q', 'geocode', 'lang', 'locale', 'result_type', 'count', 'until',
			'since_id', 'max_id', 'skip_status', 'include_entities',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 4 Direct Messages
	 */

	/**
	 * 4.1 Sending and receiving events
	 *
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/delete-message
	 * @deprecated
	 */
	protected $directMessagesDestroy = [
		'path'          => '/direct_messages/destroy.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['id', 'include_entities'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/get-event
	 */
	protected $directMessagesEventsShow = [
		'path'          => '/direct_messages/events/show.json',
		'method'        => 'GET',
		'query'         => ['id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/list-events
	 */
	protected $directMessagesEventsList = [
		'path'          => '/direct_messages/events/list.json',
		'method'        => 'GET',
		'query'         => ['cursor'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/new-event
	 * @see \chillerlan\Twitter\Twitter::dmEvent()
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/get-message
	 * @deprecated June 19, 2018
	 */
	protected $directMessagesShow = [
		'path'          => '/direct_messages/show.json',
		'method'        => 'GET',
		'query'         => ['id', 'trim_user', 'include_entities'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/get-messages
	 * @deprecated June 19, 2018
	 */
	protected $directMessages = [
		'path'          => '/direct_messages.json',
		'method'        => 'GET',
		'query'         => ['since_id', 'max_id', 'count', 'trim_user', 'include_entities', 'skip_status'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/get-sent-message
	 * @deprecated June 19, 2018
	 */
	protected $directMessagesSent = [
		'path'          => '/direct_messages/sent.json',
		'method'        => 'GET',
		'query'         => ['since_id', 'max_id', 'count', 'page', 'trim_user', 'include_entities'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/new-message
	 * @see \chillerlan\Twitter\Twitter::dm()
	 * @deprecated June 19, 2018
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/delete-message-event
	 */
	protected $directMessagesEventsDestroy = [
		'path'          => '/direct_messages/events/destroy.json',
		'method'        => 'DELETE',
		'query'         => ['id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 4.2 Welcome Messages
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/delete-welcome-message
	 */
	protected $directMessagesWelcomeMessagesDestroy = [
		'path'          => '/direct_messages/welcome_messages/destroy.json',
		'method'        => 'DELETE',
		'query'         => ['id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/delete-welcome-message-rule
	 */
	protected $directMessagesWelcomeMessagesRulesDestroy = [
		'path'          => '/direct_messages/welcome_messages/rules/destroy.json',
		'method'        => 'DELETE',
		'query'         => ['id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/get-welcome-message
	 */
	protected $directMessagesWelcomeMessagesShow = [
		'path'          => '/direct_messages/welcome_messages/show.json',
		'method'        => 'GET',
		'query'         => ['id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/get-welcome-message-rule
	 */
	protected $directMessagesWelcomeMessagesRulesShow = [
		'path'          => '/direct_messages/welcome_messages/rules/show.json',
		'method'        => 'GET',
		'query'         => ['id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/list-welcome-message-rules
	 */
	protected $directMessagesWelcomeMessagesRulesList = [
		'path'          => '/direct_messages/welcome_messages/rules/list.json',
		'method'        => 'GET',
		'query'         => ['cursor'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/list-welcome-messages
	 */
	protected $directMessagesWelcomeMessagesList = [
		'path'          => '/direct_messages/welcome_messages/list.json',
		'method'        => 'GET',
		'query'         => ['cursor'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/new-welcome-message
	 */
	protected $directMessagesWelcomeMessagesNew = [
		'path'          => '/direct_messages/welcome_messages/new.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['welcome_message'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/new-welcome-message-rule
	 */
	protected $directMessagesWelcomeMessagesRulesNew = [
		'path'          => '/direct_messages/welcome_messages/rules/new.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['welcome_message_rule'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/update-welcome-message
	 */
	protected $directMessagesWelcomeMessagesUpdate = [
		'path'          => '/direct_messages/welcome_messages/update.json',
		'method'        => 'PUT ',
		'query'         => ['id'],
		'path_elements' => [],
		'body'          => ['message_data'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * 4.3 Typing indicator and read receipts
	 *
	 * @link https://developer.twitter.com/en/docs/direct-messages/typing-indicator-and-read-receipts/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/typing-indicator-and-read-receipts/api-reference/new-read-receipt
	 */
	protected $directMessagesMarkRead = [
		'path'          => '/direct_messages/mark_read.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['last_read_event_id', 'recipient_id'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/typing-indicator-and-read-receipts/api-reference/new-typing-indicator
	 */
	protected $directMessagesIndicateTyping = [
		'path'          => '/direct_messages/indicate_typing.json',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['recipient_id'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * 5 Media
	 * @see \chillerlan\Twitter\TwitterUploadEndpoints
	 */

	/**
	 * 6 Trends
	 */

	/**
	 * 6.1
	 *
	 * @link https://developer.twitter.com/en/docs/trends/trends-for-location/overview
	 */

	/**
	 * @link
	 */
	protected $trendsPlace = [
		'path'          => '/trends/place.json',
		'method'        => 'GET',
		'query'         => ['id', 'exclude'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 6.2 Get locations with trending topics
	 *
	 * @link https://developer.twitter.com/en/docs/trends/locations-with-trending-topics/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/trends/locations-with-trending-topics/api-reference/get-trends-available
	 */
	protected $trendsAvailable = [
		'path'          => '/trends/available.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/trends/locations-with-trending-topics/api-reference/get-trends-closest
	 */
	protected $trendsClosest = [
		'path'          => '/trends/closest.json',
		'method'        => 'GET',
		'query'         => ['lat', 'long'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 7 Geo
	 */

	/**
	 * 7.1
	 *
	 * @link https://developer.twitter.com/en/docs/geo/place-information/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/geo/place-information/api-reference/get-geo-id-place_id
	 */
	protected $geoPlace = [
		'path'          => '/geo/id/%1$s.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['place_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 7.2
	 *
	 * @link https://developer.twitter.com/en/docs/geo/places-near-location/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/geo/places-near-location/api-reference/get-geo-reverse_geocode
	 */
	protected $geoReverseGeocode = [
		'path'          => '/geo/reverse_geocode.json',
		'method'        => 'GET',
		'query'         => ['lat', 'long', 'accuracy', 'granularity', 'max_results'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/geo/places-near-location/api-reference/get-geo-search
	 */
	protected $geoSearch = [
		'path'          => '/geo/search.json',
		'method'        => 'GET',
		'query'         => ['query', 'lat', 'long', 'ip', 'accuracy', 'granularity', 'max_results', 'contained_within'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * 8 Metrics
	 */

	/**
	 * 8.1 Get Tweet engagement
	 *
	 * @link https://developer.twitter.com/en/docs/metrics/get-tweet-engagement/overview
	 *
	 * @todo https://developer.twitter.com/en/docs/metrics/get-tweet-engagement/api-reference/post-insights-engagement
	 *
	 * POST /insights/engagement/totals
	 * POST /insights/engagement/28hr
	 * POST /insights/engagement/historical
	 */

	/**
	 * 9 Developer utilities
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/rate-limit-status/api-reference/get-application-rate_limit_status
	 */
	protected $rateLimitStatus = [
		'path'          => '/application/rate_limit_status.json',
		'method'        => 'GET',
		'query'         => ['resources'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/configuration/api-reference/get-help-configuration
	 */
	protected $helpConfiguration = [
		'path'          => '/help/configuration.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/supported-languages/api-reference/get-help-languages
	 */
	protected $helpLanguages = [
		'path'          => '/help/languages.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/privacy-policy/api-reference/get-help-privacy
	 */
	protected $helpPrivacy = [
		'path'          => '/help/privacy.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/terms-of-service/api-reference/get-help-tos
	 */
	protected $helpTos = [
		'path'          => '/help/tos.json',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
