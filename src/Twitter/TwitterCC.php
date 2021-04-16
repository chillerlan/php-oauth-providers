<?php
/**
 * Class TwitterCC
 *
 * @link https://dev.twitter.com/overview/api
 * @link https://developer.twitter.com/en/docs/basics/authentication/overview/application-only
 *
 * @todo: https://developer.twitter.com/en/docs/basics/authentication/api-reference/invalidate_token
 *
 * @created      08.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Twitter;

use chillerlan\OAuth\Core\{ClientCredentials, OAuth2Provider, ProviderException, AccessToken};
use Psr\Http\Message\UriInterface;

/**
 * @method \Psr\Http\Message\ResponseInterface favoritesList(array $params = ['user_id', 'screen_name', 'count', 'since_id', 'max_id', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface followersIds(array $params = ['user_id', 'screen_name', 'stringify_ids', 'cursor', 'count'])
 * @method \Psr\Http\Message\ResponseInterface followersList(array $params = ['user_id', 'screen_name', 'cursor', 'count', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface friendsIds(array $params = ['user_id', 'screen_name', 'stringify_ids', 'cursor', 'count'])
 * @method \Psr\Http\Message\ResponseInterface friendsList(array $params = ['user_id', 'screen_name', 'cursor', 'count', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface friendshipsShow(array $params = ['source_id', 'source_screen_name', 'target_id', 'target_screen_name'])
 * @method \Psr\Http\Message\ResponseInterface helpConfiguration()
 * @method \Psr\Http\Message\ResponseInterface helpLanguages()
 * @method \Psr\Http\Message\ResponseInterface helpPrivacy()
 * @method \Psr\Http\Message\ResponseInterface helpTos()
 * @method \Psr\Http\Message\ResponseInterface homeTimeline(array $params = ['exclude_replies', 'trim_user', 'count', 'until', 'since_id', 'max_id', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface lists(array $params = ['user_id', 'screen_name', 'reverse'])
 * @method \Psr\Http\Message\ResponseInterface listsMembers(array $params = ['list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'cursor', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface listsMembersShow(array $params = ['list_id', 'slug', 'user_id', 'screen_name', 'owner_screen_name', 'owner_id', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface listsMemberships(array $params = ['user_id', 'screen_name', 'count', 'cursor', 'filter_to_owned_lists'])
 * @method \Psr\Http\Message\ResponseInterface listsOwnerships(array $params = ['user_id', 'screen_name', 'count', 'cursor'])
 * @method \Psr\Http\Message\ResponseInterface listsShow(array $params = ['list_id', 'slug', 'owner_screen_name', 'owner_id'])
 * @method \Psr\Http\Message\ResponseInterface listsStatuses(array $params = ['list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'since_id', 'max_id', 'trim_user', 'include_rts', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface listsSubscribers(array $params = ['list_id', 'slug', 'owner_screen_name', 'owner_id', 'count', 'cursor', 'trim_user', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface listsSubscribersShow(array $params = ['owner_screen_name', 'owner_id', 'list_id', 'slug', 'user_id', 'screen_name', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface listsSubscriptions(array $params = ['user_id', 'screen_name', 'count', 'cursor'])
 * @method \Psr\Http\Message\ResponseInterface mentionsTimeline(array $params = ['count', 'since_id', 'max_id', 'trim_user', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface rateLimitStatus(array $params = ['resources'])
 * @method \Psr\Http\Message\ResponseInterface searchTweets(array $params = ['q', 'geocode', 'lang', 'locale', 'result_type', 'count', 'until', 'since_id', 'max_id', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface statusesLookup(array $params = ['id', 'trim_user', 'map', 'include_ext_alt_text', 'skip_status', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface statusesRetweetersIds(array $params = ['id', 'stringify_ids', 'cursor'])
 * @method \Psr\Http\Message\ResponseInterface statusesRetweetsId(string $id, array $params = ['trim_user', 'include_my_retweet', 'include_entities', 'include_ext_alt_text'])
 * @method \Psr\Http\Message\ResponseInterface statusesShowId(string $id, array $params = ['trim_user', 'include_my_retweet', 'include_entities', 'include_ext_alt_text'])
 * @method \Psr\Http\Message\ResponseInterface trendsAvailable()
 * @method \Psr\Http\Message\ResponseInterface trendsClosest(array $params = ['lat', 'long'])
 * @method \Psr\Http\Message\ResponseInterface trendsPlace(array $params = ['id', 'exclude'])
 * @method \Psr\Http\Message\ResponseInterface userTimeline(array $params = ['user_id', 'screen_name', 'since_id', 'count', 'max_id', 'trim_user', 'exclude_replies', 'include_rts', 'include_entities'])
 * @method \Psr\Http\Message\ResponseInterface usersLookup(array $params = ['user_id', 'screen_name', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface usersSearch(array $params = ['q', 'page', 'count', 'include_entities', 'skip_status'])
 * @method \Psr\Http\Message\ResponseInterface usersShow(array $params = ['user_id', 'screen_name', 'include_entities', 'skip_status'])
 */
class TwitterCC extends OAuth2Provider implements ClientCredentials{

	protected const AUTH_ERRMSG = 'TwitterCC only supports Client Credentials Grant, use the Twitter OAuth1 class for authentication instead.';

	protected ?string $apiURL                    = 'https://api.twitter.com';
	protected ?string $clientCredentialsTokenURL = 'https://api.twitter.com/oauth2/token';
	protected ?string $userRevokeURL             = 'https://twitter.com/settings/applications';
	protected ?string $endpointMap               = TwitterCCEndpoints::class;
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
