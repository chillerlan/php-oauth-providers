<?php
/**
 * Class TwitterCCEndpoints
 *
 * @created      08.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitter;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * https://developer.twitter.com/en/docs/basics/getting-started
 *
 * Note: the endpoints are ordered by the api docs (against any logical pattern)
 */
class TwitterCCEndpoints extends EndpointMap{

	/**
	 * 2.4 Follow, search, and get users
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-followers-ids
	 */
	protected array $followersIds = [
		'path'          => '/1.1/followers/ids.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'stringify_ids', 'cursor', 'count'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-followers-list
	 */
	protected array $followersList = [
		'path'          => '/1.1/followers/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'cursor', 'count', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friends-ids
	 */
	protected array $friendsIds = [
		'path'          => '/1.1/friends/ids.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'stringify_ids', 'cursor', 'count'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friends-list
	 */
	protected array $friendsList = [
		'path'          => '/1.1/friends/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'cursor', 'count', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-friendships-show
	 */
	protected array $friendshipsShow = [
		'path'          => '/1.1/friendships/show.json',
		'method'        => 'GET',
		'query'         => ['source_id', 'source_screen_name', 'target_id', 'target_screen_name',],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-lookup
	 */
	protected array $usersLookup = [
		'path'          => '/1.1/users/lookup.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-search
	 */
	protected array $usersSearch = [
		'path'          => '/1.1/users/search.json',
		'method'        => 'GET',
		'query'         => ['q', 'page', 'count', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/follow-search-get-users/api-reference/get-users-show
	 */
	protected array $usersShow = [
		'path'          => '/1.1/users/show.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'include_entities', 'skip_status'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 2.6 Create and manage lists
	 *
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-list
	 */
	protected array $lists = [
		'path'          => '/1.1/lists/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'reverse'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-members
	 */
	protected array $listsMembers = [
		'path'          => '/1.1/lists/members.json',
		'method'        => 'GET',
		'query'         => [
			'list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'cursor', 'include_entities', 'skip_status',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-members-show
	 */
	protected array $listsMembersShow = [
		'path'          => '/1.1/lists/members/show.json',
		'method'        => 'GET',
		'query'         => [
			'list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id', 'include_entities', 'skip_status',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-memberships
	 */
	protected array $listsMemberships = [
		'path'          => '/1.1/lists/memberships.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'count', 'cursor', 'filter_to_owned_lists'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-ownerships
	 */
	protected array $listsOwnerships = [
		'path'          => '/1.1/lists/ownerships.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'count', 'cursor'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-show
	 */
	protected array $listsShow = [
		'path'          => '/1.1/lists/show.json',
		'method'        => 'GET',
		'query'         => ['list_id', 'slug', 'owner_screen_name', 'owner_id'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-statuses
	 */
	protected array $listsStatuses = [
		'path'          => '/1.1/lists/statuses.json',
		'method'        => 'GET',
		'query'         => [
			'list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'since_id',
			'max_id', 'trim_user', 'include_rts', 'include_entities',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-subscribers
	 */
	protected array $listsSubscribers = [
		'path'          => '/1.1/lists/subscribers.json',
		'method'        => 'GET',
		'query'         => [
			'list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'cursor', 'trim_user', 'skip_status', 'include_entities',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-subscribers-show
	 */
	protected array $listsSubscribersShow = [
		'path'          => '/1.1/lists/subscribers/show.json',
		'method'        => 'GET',
		'query'         => [
			'owner_screen_name', 'owner_id', 'list_id', 'slug', 'user_id', 'screen_name', 'skip_status', 'include_entities',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/accounts-and-users/create-manage-lists/api-reference/get-lists-subscriptions
	 */
	protected array $listsSubscriptions = [
		'path'          => '/1.1/lists/subscriptions.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'count', 'cursor'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 3.1 Post, retrieve and engage with Tweets
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-show-id
	 */
	protected array $statusesShowId = [
		'path'          => '/1.1/statuses/show/%1$s.json',
		'method'        => 'GET',
		'query'         => ['trim_user', 'include_my_retweet', 'include_entities', 'include_ext_alt_text'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-lookup
	 */
	protected array $statusesLookup = [
		'path'          => '/1.1/statuses/lookup.json',
		'method'        => 'GET',
		'query'         => ['id', 'trim_user', 'map', 'include_ext_alt_text', 'skip_status', 'include_entities'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-retweets-id
	 */
	protected array $statusesRetweetsId = [
		'path'          => '/1.1/statuses/retweets/%1$s.json',
		'method'        => 'GET',
		'query'         => ['trim_user', 'include_my_retweet', 'include_entities', 'include_ext_alt_text'],
		'path_elements' => ['id'],
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-statuses-retweeters-ids
	 */
	protected array $statusesRetweetersIds = [
		'path'          => '/1.1/statuses/retweeters/ids.json',
		'method'        => 'GET',
		'query'         => ['id', 'stringify_ids', 'cursor'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/post-and-engage/api-reference/get-favorites-list
	 */
	protected array $favoritesList = [
		'path'          => '/1.1/favorites/list.json',
		'method'        => 'GET',
		'query'         => ['user_id', 'screen_name', 'count', 'since_id', 'max_id', 'skip_status', 'include_entities'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 3.2 Get Tweet timelines
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/timelines/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-home_timeline
	 */
	protected array $homeTimeline = [
		'path'          => '/1.1/statuses/home_timeline.json',
		'method'        => 'GET',
		'query'         => [
			'exclude_replies', 'trim_user', 'count', 'until', 'since_id', 'max_id', 'skip_status', 'include_entities',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-mentions_timeline
	 */
	protected array $mentionsTimeline = [
		'path'          => '/1.1/statuses/mentions_timeline.json',
		'method'        => 'GET',
		'query'         => ['count', 'since_id', 'max_id', 'trim_user', 'skip_status', 'include_entities'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-user_timeline
	 */
	protected array $userTimeline = [
		'path'          => '/1.1/statuses/user_timeline.json',
		'method'        => 'GET',
		'query'         => [
			'user_id', 'screen_name', 'since_id', 'count', 'max_id', 'trim_user',
			'exclude_replies', 'include_rts', 'include_entities',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 3.4 Search Tweets
	 *
	 * @link https://developer.twitter.com/en/docs/tweets/search/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/tweets/search/api-reference/get-search-tweets
	 */
	protected array $searchTweets = [
		'path'          => '/1.1/search/tweets.json',
		'method'        => 'GET',
		'query'         => [
			'q', 'geocode', 'lang', 'locale', 'result_type', 'count', 'until',
			'since_id', 'max_id', 'skip_status', 'include_entities',
		],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

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
	protected array $trendsPlace = [
		'path'          => '/1.1/trends/place.json',
		'method'        => 'GET',
		'query'         => ['id', 'exclude'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * 6.2 Get locations with trending topics
	 *
	 * @link https://developer.twitter.com/en/docs/trends/locations-with-trending-topics/overview
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/trends/locations-with-trending-topics/api-reference/get-trends-available
	 */
	protected array $trendsAvailable = [
		'path'          => '/1.1/trends/available.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/trends/locations-with-trending-topics/api-reference/get-trends-closest
	 */
	protected array $trendsClosest = [
		'path'          => '/1.1/trends/closest.json',
		'method'        => 'GET',
		'query'         => ['lat', 'long'],
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

	/**
	 * 9 Developer utilities
	 */

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/rate-limit-status/api-reference/get-application-rate_limit_status
	 */
	protected array $rateLimitStatus = [
		'path'          => '/1.1/application/rate_limit_status.json',
		'method'        => 'GET',
		'query'         => ['resources'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/configuration/api-reference/get-help-configuration
	 */
	protected array $helpConfiguration = [
		'path'          => '/1.1/help/configuration.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/supported-languages/api-reference/get-help-languages
	 */
	protected array $helpLanguages = [
		'path'          => '/1.1/help/languages.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/privacy-policy/api-reference/get-help-privacy
	 */
	protected array $helpPrivacy = [
		'path'          => '/1.1/help/privacy.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	/**
	 * @link https://developer.twitter.com/en/docs/developer-utilities/terms-of-service/api-reference/get-help-tos
	 */
	protected array $helpTos = [
		'path'          => '/1.1/help/tos.json',
		'method'        => 'GET',
		'query'         => null,
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
