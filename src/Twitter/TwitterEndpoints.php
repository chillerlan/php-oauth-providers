<?php
/**
 * Class TwitterEndpoints
 *
 * @created      08.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitter;

/**
 * https://developer.twitter.com/en/docs/basics/getting-started
 *
 * Note: the endpoints are ordered by the api docs (against any logical pattern)
 */
class TwitterEndpoints extends TwitterCCEndpoints{

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
	protected array $accountSettings = [
		'path'          => '/account/settings.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/get-account-verify_credentials
	 */
	protected array $verifyCredentials = [
		'path'          => '/account/verify_credentials.json',
		'method'        => 'GET',
		'query'         => ['include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/get-users-profile_banner
	 */
	protected array $usersProfileBanner = [
		'path'          => '/users/profile_banner.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-remove_profile_banner
	 */
	protected array $accountRemoveProfileBanner = [
		'path'          => '/account/remove_profile_banner.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-settings
	 */
	protected array $accountUpdateSettings = [
		'path'          => '/account/settings.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => [
			'sleep_time_enabled', 'start_sleep_time', 'end_sleep_time', 'time_zone', 'trend_location_woeid', 'lang',
		],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-account-update_profile
	 */
	protected array $accountUpdateProfile = [
		'path'          => '/account/update_profile.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['name', 'url', 'location', 'description', 'profile_link_color', 'include_entities', 'skip_status',],
		'headers'       => null,
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
	protected array $savedSearchesList = [
		'path'          => '/saved_searches/list.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/get-saved_searches-show-id
	 */
	protected array $savedSearchesShow = [
		'path'          => '/saved_searches/show/%1$s.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-saved_searches-create
	 */
	protected array $savedSearchesCreate = [
		'path'          => '/saved_searches/create.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['query'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/manage-account-settings/api-reference/post-saved_searches-destroy-id
	 */
	protected array $savedSearchesDestroy = [
		'path'          => '/saved_searches/destroy/%1$s.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 2.3 Mute, block and report users
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/get-blocks-ids
	 */
	protected array $blocksIds = [
		'path'          => '/blocks/ids.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'stringify_ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/get-blocks-list
	 */
	protected array $blocksList = [
		'path'          => '/blocks/list.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/get-mutes-users-ids
	 */
	protected array $mutesUsersIds = [
		'path'          => '/mutes/users/ids.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'stringify_ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/get-mutes-users-list
	 */
	protected array $mutesUsersList = [
		'path'          => '/mutes/users/list.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-blocks-create
	 */
	protected array $block = [
		'path'          => '/blocks/create.json',
		'method'        => 'POST',
		'query'         => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-blocks-destroy
	 */
	protected array $unblock = [
		'path'          => '/blocks/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-mutes-users-create
	 */
	protected array $mute = [
		'path'          => '/mutes/users/create.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-mutes-users-destroy
	 */
	protected array $unmute = [
		'path'          => '/mutes/users/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/mute-block-report-users/api-reference/post-users-report_spam
	 */
	protected array $reportSpam = [
		'path'          => '/users/report_spam.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['user_id', 'screen_name', 'perform_block'],
		'headers'       => null,
	];

	/**
	 * 2.4 Follow, search, and get users
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-incoming
	 */
	protected array $friendshipsIncoming = [
		'path'          => '/friendships/incoming.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'stringify_ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-lookup
	 */
	protected array $friendshipsLookup = [
		'path'          => '/friendships/lookup.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-no_retweets-ids
	 */
	protected array $friendshipsNoRetweetsIds = [
		'path'          => '/friendships/no_retweets/ids.json',
		'method'        => 'GET',
		'query'         => ['stringify_ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-outgoing
	 */
	protected array $friendshipsOutgoing = [
		'path'          => '/friendships/outgoing.json',
		'method'        => 'GET',
		'query'         => ['cursor', 'stringify_ids'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/post-friendships-create
	 */
	protected array $follow = [
		'path'          => '/friendships/create.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['user_id', 'screen_name', 'follow'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/post-friendships-destroy
	 */
	protected array $unfollow = [
		'path'          => '/friendships/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['user_id', 'screen_name'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/post-friendships-update
	 */
	protected array $friendshipsUpdate = [
		'path'          => '/friendships/update.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['user_id', 'screen_name', 'device', 'retweets'],
		'headers'       => null,
	];

	/**
	 * 2.6 Create and manage lists
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-create
	 */
	protected array $listsCreate = [
		'path'          => '/lists/create.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['name', 'mode', 'description'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-destroy
	 */
	protected array $listsDestroy = [
		'path'          => '/lists/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['list_id', 'slug', 'owner_screen_name', 'owner_id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-members-create
	 */
	protected array $listsMembersCreate = [
		'path'          => '/lists/members/create.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-members-create_all
	 */
	protected array $listsMembersCreateAll = [
		'path'          => '/lists/members/create_all.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-members-destroy
	 */
	protected array $listsMembersDestroy = [
		'path'          => '/lists/members/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-members-destroy_all
	 */
	protected array $listsMembersDestroyAll = [
		'path'          => '/lists/members/destroy_all.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-subscribers-create
	 */
	protected array $listsSubscribersCreate = [
		'path'          => '/lists/subscribers/create.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['list_id', 'slug', 'owner_screen_name', 'owner_id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-subscribers-destroy
	 */
	protected array $listsSubscribersDestroy = [
		'path'          => '/lists/subscribers/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['list_id', 'slug', 'owner_screen_name', 'owner_id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/post-lists-update
	 */
	protected array $listsUpdate = [
		'path'          => '/lists/update.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['list_id', 'slug', 'name', 'mode', 'description', 'owner_screen_name', 'owner_id'],
		'headers'       => null,
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
	 * @see \chillerlan\OAuth\Providers\Twitter::tweet()
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-statuses-destroy-id
	 */
	protected array $statusesDestroyId = [
		'path'          => '/statuses/destroy/%1$s.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => ['trim_user'],
		'headers'       => null,
	];

	/**
	 * @todo GET statuses/oembed
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-oembed
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-statuses-retweet-id
	 */
	protected array $retweet = [
		'path'          => '/statuses/retweet/%1$s.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => ['trim_user'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-statuses-unretweet-id
	 */
	protected array $unretweet = [
		'path'          => '/statuses/unretweet/%1$s.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => ['id'],
		'body'          => ['trim_user'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-retweets_of_me
	 */
	protected array $statusesRetweetsOfMe = [
		'path'          => '/statuses/retweets_of_me.json',
		'method'        => 'GET',
		'query'         => [
			'count', 'since_id', 'max_id', 'trim_user', 'skip_status', 'include_entities', 'include_user_entities',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-favorites-create
	 */
	protected array $favorite = [
		'path'          => '/favorites/create.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id', 'include_entities'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/post-favorites-destroy
	 */
	protected array $unfavorite = [
		'path'          => '/favorites/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id', 'include_entities'],
		'headers'       => null,
	];

	/**
	 * 3.3 Curate a collection of Tweets
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/overview/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/get-collections-entries
	 */
	protected array $collectionsEntries = [
		'path'          => '/collections/entries.json',
		'method'        => 'GET',
		'query'         => ['id', 'count', 'max_position', 'min_position'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/get-collections-list
	 */
	protected array $collectionsList = [
		'path'          => '/collections/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'tweet_id', 'cursor', 'count'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/get-collections-show
	 */
	protected array $collectionsShow = [
		'path'          => '/collections/show.json',
		'method'        => 'GET',
		'query'         => ['id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-create
	 */
	protected array $collectionsCreate = [
		'path'          => '/collections/create.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['name', 'description', 'url', 'timeline_order'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-destroy
	 */
	protected array $collectionsDestroy = [
		'path'          => '/collections/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-entries-add
	 */
	protected array $collectionsEntriesAdd = [
		'path'          => '/collections/entries/add.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id', 'tweet_id', 'relative_to', 'above'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-entries-curate
	 */
	protected array $collectionsEntriesCurate = [
		'path'          => '/collections/entries/curate.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id', 'changes'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-entries-move
	 */
	protected array $collectionsEntriesMove = [
		'path'          => '/collections/entries/move.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id', 'tweet_id', 'relative_to', 'above'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-entries-remove
	 */
	protected array $collectionsEntriesRemove = [
		'path'          => '/collections/entries/remove.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id', 'tweet_id'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/curate-a-collection/api-reference/post-collections-update
	 */
	protected array $collectionsUpdate = [
		'path'          => '/collections/update.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id', 'name', 'description', 'url'],
		'headers'       => null,
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
	protected array $directMessagesDestroy = [
		'path'          => '/direct_messages/destroy.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['id', 'include_entities'],
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/get-event
	 */
	protected array $directMessagesEventsShow = [
		'path'          => '/direct_messages/events/show.json',
		'method'        => 'GET',
		'query'         => ['id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/list-events
	 */
	protected array $directMessagesEventsList = [
		'path'          => '/direct_messages/events/list.json',
		'method'        => 'GET',
		'query'         => ['cursor'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/new-event
	 * @see \chillerlan\OAuth\Providers\Twitter\Twitter::dmEvent()
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/get-message
	 * @deprecated June 19, 2018
	 */
	protected array $directMessagesShow = [
		'path'          => '/direct_messages/show.json',
		'method'        => 'GET',
		'query'         => ['id', 'trim_user', 'include_entities'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/get-messages
	 * @deprecated June 19, 2018
	 */
	protected array $directMessages = [
		'path'          => '/direct_messages.json',
		'method'        => 'GET',
		'query'         => ['since_id', 'max_id', 'count', 'trim_user', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/get-sent-message
	 * @deprecated June 19, 2018
	 */
	protected array $directMessagesSent = [
		'path'          => '/direct_messages/sent.json',
		'method'        => 'GET',
		'query'         => ['since_id', 'max_id', 'count', 'page', 'trim_user', 'include_entities'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/new-message
	 * @see \chillerlan\OAuth\Providers\Twitter\Twitter::dm()
	 * @deprecated June 19, 2018
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/sending-and-receiving/api-reference/delete-message-event
	 */
	protected array $directMessagesEventsDestroy = [
		'path'          => '/direct_messages/events/destroy.json',
		'method'        => 'DELETE',
		'query'         => ['id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 4.2 Welcome Messages
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/delete-welcome-message
	 */
	protected array $directMessagesWelcomeMessagesDestroy = [
		'path'          => '/direct_messages/welcome_messages/destroy.json',
		'method'        => 'DELETE',
		'query'         => ['id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/delete-welcome-message-rule
	 */
	protected array $directMessagesWelcomeMessagesRulesDestroy = [
		'path'          => '/direct_messages/welcome_messages/rules/destroy.json',
		'method'        => 'DELETE',
		'query'         => ['id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/get-welcome-message
	 */
	protected array $directMessagesWelcomeMessagesShow = [
		'path'          => '/direct_messages/welcome_messages/show.json',
		'method'        => 'GET',
		'query'         => ['id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/get-welcome-message-rule
	 */
	protected array $directMessagesWelcomeMessagesRulesShow = [
		'path'          => '/direct_messages/welcome_messages/rules/show.json',
		'method'        => 'GET',
		'query'         => ['id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/list-welcome-message-rules
	 */
	protected array $directMessagesWelcomeMessagesRulesList = [
		'path'          => '/direct_messages/welcome_messages/rules/list.json',
		'method'        => 'GET',
		'query'         => ['cursor'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/list-welcome-messages
	 */
	protected array $directMessagesWelcomeMessagesList = [
		'path'          => '/direct_messages/welcome_messages/list.json',
		'method'        => 'GET',
		'query'         => ['cursor'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/new-welcome-message
	 */
	protected array $directMessagesWelcomeMessagesNew = [
		'path'          => '/direct_messages/welcome_messages/new.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['welcome_message'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/new-welcome-message-rule
	 */
	protected array $directMessagesWelcomeMessagesRulesNew = [
		'path'          => '/direct_messages/welcome_messages/rules/new.json',
		'method'        => 'POST',
		'query'         => null,
		'path_elements' => null,
		'body'          => ['welcome_message_rule'],
		'headers'       => ['Content-type' => 'application/json'],
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/welcome-messages/api-reference/update-welcome-message
	 */
	protected array $directMessagesWelcomeMessagesUpdate = [
		'path'          => '/direct_messages/welcome_messages/update.json',
		'method'        => 'PUT ',
		'query'         => ['id'],
		'path_elements' => null,
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
	protected array $directMessagesMarkRead = [
		'path'          => '/direct_messages/mark_read.json',
		'method'        => 'POST',
		'query'         => ['last_read_event_id', 'recipient_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/direct-messages/typing-indicator-and-read-receipts/api-reference/new-typing-indicator
	 */
	protected array $directMessagesIndicateTyping = [
		'path'          => '/direct_messages/indicate_typing.json',
		'method'        => 'POST',
		'query'         => ['recipient_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 5 Media
	 * @see \chillerlan\OAuth\Providers\TwitterUploadEndpoints
	 */

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
	protected array $geoPlace = [
		'path'          => '/geo/id/%1$s.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => ['place_id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 7.2
	 *
	 * @link https://developer.twitter.com/en/docs/geo/places-near-location/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/geo/places-near-location/api-reference/get-geo-reverse_geocode
	 */
	protected array $geoReverseGeocode = [
		'path'          => '/geo/reverse_geocode.json',
		'method'        => 'GET',
		'query'         => ['lat', 'long', 'accuracy', 'granularity', 'max_results'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/geo/places-near-location/api-reference/get-geo-search
	 */
	protected array $geoSearch = [
		'path'          => '/geo/search.json',
		'method'        => 'GET',
		'query'         => ['query', 'lat', 'long', 'ip', 'accuracy', 'granularity', 'max_results', 'contained_within'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
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

}
