<?php
/**
 * Class TwitterCC
 *
 * @link https://dev.twitter.com/overview/api
 * @link https://developer.twitter.com/en/docs/basics/authentication/overview/application-only
 *
 * @todo: https://developer.twitter.com/en/docs/basics/authentication/api-reference/invalidate_token
 *
 * @filesource   TwitterCC.php
 * @created      08.04.2018
 * @package      chillerlan\OAuth\Providers\Twitter
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitter;

use chillerlan\OAuth\Core\{ClientCredentials, OAuth2Provider, ProviderException, AccessToken};
use Psr\Http\Message\UriInterface;

/**
 * @method \Psr\Http\Message\ResponseInterface accountRemoveProfileBanner()
 * @method \Psr\Http\Message\ResponseInterface accountSettings()
 * @method \Psr\Http\Message\ResponseInterface accountUpdateProfile(array $body = ['name', 'url', 'location', 'description', 'profile_link_color', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface accountUpdateSettings(array $body = ['sleep_time_enabled', 'start_sleep_time', 'end_sleep_time', 'time_zone', 'trend_location_woeid', 'lang'])
 * @method \Psr\Http\Message\ResponseInterface block(array $body = ['user_id', 'screen_name', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface blocksIds(array $params = ['cursor', 'stringify_ids'])
 * @method \Psr\Http\Message\ResponseInterface blocksList(array $params = ['cursor', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface collectionsCreate(array $body = ['name', 'description', 'url', 'timeline_order'])
 * @method \Psr\Http\Message\ResponseInterface collectionsDestroy(array $body = ['id'])
 * @method \Psr\Http\Message\ResponseInterface collectionsEntries(array $params = ['id', 'count', 'max_position', 'min_position'])
 * @method \Psr\Http\Message\ResponseInterface collectionsEntriesAdd(array $body = ['id', 'tweet_id', 'relative_to', 'above'])
 * @method \Psr\Http\Message\ResponseInterface collectionsEntriesCurate(array $body = ['id', 'changes'])
 * @method \Psr\Http\Message\ResponseInterface collectionsEntriesMove(array $body = ['id', 'tweet_id', 'relative_to', 'above'])
 * @method \Psr\Http\Message\ResponseInterface collectionsEntriesRemove(array $body = ['id', 'tweet_id'])
 * @method \Psr\Http\Message\ResponseInterface collectionsList(array $params = ['user_id', 'screen_name', 'tweet_id', 'cursor', 'count'])
 * @method \Psr\Http\Message\ResponseInterface collectionsShow(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface collectionsUpdate(array $body = ['id', 'name', 'description', 'url'])
 * @method \Psr\Http\Message\ResponseInterface directMessages(array $params = ['since_id', 'max_id', 'count', 'trim_user', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesDestroy(array $body = ['id', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesEventsDestroy(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesEventsList(array $params = ['cursor'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesEventsShow(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesIndicateTyping(array $body = ['recipient_id'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesMarkRead(array $body = ['last_read_event_id', 'recipient_id'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesSent(array $params = ['since_id', 'max_id', 'count', 'page', 'trim_user', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesShow(array $params = ['id', 'trim_user', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesDestroy(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesList(array $params = ['cursor'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesNew(array $body = ['welcome_message'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesRulesDestroy(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesRulesList(array $params = ['cursor'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesRulesNew(array $body = ['welcome_message_rule'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesRulesShow(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesShow(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface directMessagesWelcomeMessagesUpdate(array $params = ['id'])
 * @method \Psr\Http\Message\ResponseInterface favorite(array $body = ['id', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface favoritesList(array $params = ['user_id', 'screen_name', 'count', 'since_id', 'max_id', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface follow(array $body = ['user_id', 'screen_name', 'follow'])
 * @method \Psr\Http\Message\ResponseInterface followersIds(array $params = ['user_id', 'screen_name', 'stringify_ids', 'cursor', 'count'])
 * @method \Psr\Http\Message\ResponseInterface followersList(array $params = ['user_id', 'screen_name', 'cursor', 'count', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface friendsIds(array $params = ['user_id', 'screen_name', 'stringify_ids', 'cursor', 'count'])
 * @method \Psr\Http\Message\ResponseInterface friendsList(array $params = ['user_id', 'screen_name', 'cursor', 'count', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface friendshipsIncoming(array $params = ['cursor', 'stringify_ids'])
 * @method \Psr\Http\Message\ResponseInterface friendshipsLookup(array $params = ['user_id', 'screen_name'])
 * @method \Psr\Http\Message\ResponseInterface friendshipsNoRetweetsIds(array $params = ['stringify_ids'])
 * @method \Psr\Http\Message\ResponseInterface friendshipsOutgoing(array $params = ['cursor', 'stringify_ids'])
 * @method \Psr\Http\Message\ResponseInterface friendshipsShow(array $params = ['source_id', 'source_screen_name', 'target_id', 'target_screen_name'])
 * @method \Psr\Http\Message\ResponseInterface friendshipsUpdate(array $body = ['user_id', 'screen_name', 'device', 'retweets'])
 * @method \Psr\Http\Message\ResponseInterface geoPlace(string $place_id)
 * @method \Psr\Http\Message\ResponseInterface geoReverseGeocode(array $params = ['lat', 'long', 'accuracy', 'granularity', 'max_results'])
 * @method \Psr\Http\Message\ResponseInterface geoSearch(array $params = ['query', 'lat', 'long', 'ip', 'accuracy', 'granularity', 'max_results', 'contained_within'])
 * @method \Psr\Http\Message\ResponseInterface helpConfiguration()
 * @method \Psr\Http\Message\ResponseInterface helpLanguages()
 * @method \Psr\Http\Message\ResponseInterface helpPrivacy()
 * @method \Psr\Http\Message\ResponseInterface helpTos()
 * @method \Psr\Http\Message\ResponseInterface homeTimeline(array $params = ['exclude_replies', 'trim_user', 'count', 'until', 'since_id', 'max_id', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface lists(array $params = ['user_id', 'screen_name', 'reverse'])
 * @method \Psr\Http\Message\ResponseInterface listsCreate(array $body = ['name', 'mode', 'description'])
 * @method \Psr\Http\Message\ResponseInterface listsDestroy(array $body = ['list_id', 'slug', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsMembers(array $params = ['list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'cursor', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface listsMembersCreate(array $body = ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsMembersCreateAll(array $body = ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsMembersDestroy(array $body = ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsMembersDestroyAll(array $body = ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsMembersShow(array $params = ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface listsMemberships(array $params = ['user_id', 'screen_name', 'count', 'cursor', 'filter_to_owned_lists'])
 * @method \Psr\Http\Message\ResponseInterface listsOwnerships(array $params = ['user_id', 'screen_name', 'count', 'cursor'])
 * @method \Psr\Http\Message\ResponseInterface listsShow(array $params = ['list_id', 'slug', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsStatuses(array $params = ['list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'since_id', 'max_id', 'trim_user', 'include_rts', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface listsSubscribers(array $params = ['list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'cursor', 'trim_user', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface listsSubscribersCreate(array $body = ['list_id', 'slug', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsSubscribersDestroy(array $body = ['list_id', 'slug', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsSubscribersShow(array $params = ['owner_screen_name', 'owner_id', 'list_id', 'slug', 'user_id', 'screen_name', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface listsSubscriptions(array $params = ['user_id', 'screen_name', 'count', 'cursor'])
 * @method \Psr\Http\Message\ResponseInterface listsUpdate(array $body = ['list_id', 'slug', 'name', 'mode', 'description', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface mentionsTimeline(array $params = ['count', 'since_id', 'max_id', 'trim_user', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface mute(array $body = ['user_id', 'screen_name', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface mutesUsersIds(array $params = ['cursor', 'stringify_ids'])
 * @method \Psr\Http\Message\ResponseInterface mutesUsersList(array $params = ['cursor', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface rateLimitStatus(array $params = ['resources'])
 * @method \Psr\Http\Message\ResponseInterface reportSpam(array $body = ['user_id', 'screen_name', 'perform_block'])
 * @method \Psr\Http\Message\ResponseInterface retweet(string $id, array $body = ['trim_user'])
 * @method \Psr\Http\Message\ResponseInterface savedSearchesCreate(array $body = ['query'])
 * @method \Psr\Http\Message\ResponseInterface savedSearchesDestroy(string $id)
 * @method \Psr\Http\Message\ResponseInterface savedSearchesList()
 * @method \Psr\Http\Message\ResponseInterface savedSearchesShow(string $id)
 * @method \Psr\Http\Message\ResponseInterface searchTweets(array $params = ['q', 'geocode', 'lang', 'locale', 'result_type', 'count', 'until', 'since_id', 'max_id', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface statusesDestroyId(string $id, array $body = ['trim_user'])
 * @method \Psr\Http\Message\ResponseInterface statusesLookup(array $params = ['id', 'trim_user', 'map', 'include_ext_alt_text', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface statusesRetweetersIds(array $params = ['id', 'stringify_ids', 'cursor'])
 * @method \Psr\Http\Message\ResponseInterface statusesRetweetsId(string $id, array $params = ['trim_user', 'include_my_retweet', 'include_entities', 'include_ext_alt_text'])
 * @method \Psr\Http\Message\ResponseInterface statusesRetweetsOfMe(array $params = ['count', 'since_id', 'max_id', 'trim_user', 'skip_status', 'include_entities', 'include_user_entities'])
 * @method \Psr\Http\Message\ResponseInterface statusesShowId(string $id, array $params = ['trim_user', 'include_my_retweet', 'include_entities', 'include_ext_alt_text'])
 * @method \Psr\Http\Message\ResponseInterface trendsAvailable()
 * @method \Psr\Http\Message\ResponseInterface trendsClosest(array $params = ['lat', 'long'])
 * @method \Psr\Http\Message\ResponseInterface trendsPlace(array $params = ['id', 'exclude'])
 * @method \Psr\Http\Message\ResponseInterface unblock(array $body = ['user_id', 'screen_name', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface unfavorite(array $body = ['id', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface unfollow(array $body = ['user_id', 'screen_name'])
 * @method \Psr\Http\Message\ResponseInterface unmute(array $body = ['user_id', 'screen_name', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface unretweet(string $id, array $body = ['trim_user'])
 * @method \Psr\Http\Message\ResponseInterface userTimeline(array $params = ['user_id', 'screen_name', 'since_id', 'count', 'max_id', 'trim_user', 'exclude_replies', 'include_rts', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface usersLookup(array $params = ['user_id', 'screen_name', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface usersProfileBanner(array $params = ['user_id', 'screen_name'])
 * @method \Psr\Http\Message\ResponseInterface usersSearch(array $params = ['q', 'page', 'count', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface usersShow(array $params = ['user_id', 'screen_name', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface usersSuggestions(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface usersSuggestionsSlug(string $slug, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface usersSuggestionsSlugMembers(string $slug, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface verifyCredentials(array $params = ['include_entities', 'skip_status'])
 */
class TwitterCC extends OAuth2Provider implements ClientCredentials{

	protected const AUTH_ERRMSG = 'TwitterCC only supports Client Credentials Grant, use the Twitter OAuth1 class for authentication instead.';

	protected ?string $apiURL                    = 'https://api.twitter.com/1.1';
	protected ?string $clientCredentialsTokenURL = 'https://api.twitter.com/oauth2/token';
	protected ?string $userRevokeURL             = 'https://twitter.com/settings/applications';
	protected ?string $endpointMap               = TwitterEndpoints::class;
	protected ?string $apiDocs                   = 'https://developer.twitter.com/en/docs/basics/authentication/overview/application-only';
	protected ?string $applicationURL            = 'https://developer.twitter.com/apps';

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function getAuthURL(array $params = null, array $scopes = null):UriInterface{
		throw new ProviderException($this::AUTH_ERRMSG);
	}

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function getAccessToken(string $code, string $state = null):AccessToken{
		throw new ProviderException($this::AUTH_ERRMSG);
	}

}
