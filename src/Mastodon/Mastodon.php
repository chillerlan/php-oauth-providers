<?php
/**
 * Class Mastodon
 *
 * @link https://github.com/tootsuite/documentation/blob/master/Using-the-API/API.md
 * @link https://github.com/tootsuite/documentation/blob/master/Using-the-API/OAuth-details.md
 *
 * @filesource   Mastodon.php
 * @created      19.08.2018
 * @package      chillerlan\OAuth\Providers\Mastodon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Mastodon;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2CSRFTokenTrait, OAuth2Provider, OAuth2TokenRefreshTrait, TokenExpires, TokenRefresh};
use chillerlan\OAuth\OAuthException;

/**
 * @method \Psr\Http\Message\ResponseInterface acceptFollowRequest(string $request_id)
 * @method \Psr\Http\Message\ResponseInterface addListMembers(string $list_id, array $body = ['account_ids'])
 * @method \Psr\Http\Message\ResponseInterface addPushSubscription(array $body = ['subscription', 'data'])
 * @method \Psr\Http\Message\ResponseInterface block(string $account_id)
 * @method \Psr\Http\Message\ResponseInterface blockDomain(array $body = ['domain'])
 * @method \Psr\Http\Message\ResponseInterface boost(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface clearNotifications()
 * @method \Psr\Http\Message\ResponseInterface createApp(array $body = ['client_name', 'redirect_uris', 'scopes', 'website'])
 * @method \Psr\Http\Message\ResponseInterface createAttachment(array $body = ['file', 'description', 'focus'])
 * @method \Psr\Http\Message\ResponseInterface createFilter(array $body = ['phrase', 'context', 'irreversible', 'whole_word', 'expires_in'])
 * @method \Psr\Http\Message\ResponseInterface createList(array $body = ['title'])
 * @method \Psr\Http\Message\ResponseInterface deleteFilter(string $filter_id)
 * @method \Psr\Http\Message\ResponseInterface deleteFollowSuggestion(string $account_id)
 * @method \Psr\Http\Message\ResponseInterface deleteList(string $list_id)
 * @method \Psr\Http\Message\ResponseInterface deletePushSubscription()
 * @method \Psr\Http\Message\ResponseInterface deleteToot(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface dismissNotification(array $body = ['notification_id'])
 * @method \Psr\Http\Message\ResponseInterface favourite(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface follow(string $account_id, array $params = ['reblogs'])
 * @method \Psr\Http\Message\ResponseInterface follows(array $body = ['uri'])
 * @method \Psr\Http\Message\ResponseInterface getAccount(string $account_id)
 * @method \Psr\Http\Message\ResponseInterface getCurrentUser()
 * @method \Psr\Http\Message\ResponseInterface getCurrentUserBlocks(array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getCurrentUserDomainBlocks(array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getCurrentUserRelationships(array $params = ['account_id'])
 * @method \Psr\Http\Message\ResponseInterface getFilter(string $filter_id)
 * @method \Psr\Http\Message\ResponseInterface getFilters()
 * @method \Psr\Http\Message\ResponseInterface getFollowRequests(array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getFollowSuggestions()
 * @method \Psr\Http\Message\ResponseInterface getFollowers(string $account_id, array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getFollowing(string $account_id, array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getHomeTimeline(array $params = ['local', 'only_media', 'max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getInstance()
 * @method \Psr\Http\Message\ResponseInterface getInstanceCustomEmojis()
 * @method \Psr\Http\Message\ResponseInterface getList(string $list_id)
 * @method \Psr\Http\Message\ResponseInterface getListMembers(string $list_id, array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getListTimeline(string $list_id, array $params = ['local', 'only_media', 'max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getLists()
 * @method \Psr\Http\Message\ResponseInterface getListsByMembership(string $account_id)
 * @method \Psr\Http\Message\ResponseInterface getMutes(string $list_id, array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getNotification(string $notification_id)
 * @method \Psr\Http\Message\ResponseInterface getNotifications(string $list_id, array $params = ['exclude_types', 'max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getPublicTimeline(array $params = ['local', 'only_media', 'max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getPushSubscriptionStatus()
 * @method \Psr\Http\Message\ResponseInterface getReports()
 * @method \Psr\Http\Message\ResponseInterface getStatuses(string $account_id, array $params = ['only_media', 'pinned', 'exclude_replies', 'max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getTagTimeline(string $hashtag, array $params = ['local', 'only_media', 'max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getToot(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface getTootBoostedBy(string $toot_id, array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface getTootCard(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface getTootContext(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface getTootFavouritedBy(string $toot_id, array $params = ['max_id', 'since_id', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface mute(string $account_id, array $body = ['notifications'])
 * @method \Psr\Http\Message\ResponseInterface muteToot(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface pinToot(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface rejectFollowRequest(string $request_id)
 * @method \Psr\Http\Message\ResponseInterface removeListMembers(string $list_id, array $body = ['account_ids'])
 * @method \Psr\Http\Message\ResponseInterface report(array $body = ['account_id', 'status_ids', 'comment'])
 * @method \Psr\Http\Message\ResponseInterface search(array $params = ['q', 'resolve'])
 * @method \Psr\Http\Message\ResponseInterface searchV2(array $params = ['q', 'resolve'])
 * @method \Psr\Http\Message\ResponseInterface toot(array $body = ['status', 'in_reply_to_id', 'media_ids', 'sensitive', 'spoiler_text', 'visibility', 'language'])
 * @method \Psr\Http\Message\ResponseInterface unblock(string $account_id)
 * @method \Psr\Http\Message\ResponseInterface unblockDomain(array $body = ['domain'])
 * @method \Psr\Http\Message\ResponseInterface unboost(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface unfavourite(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface unfollow(string $account_id)
 * @method \Psr\Http\Message\ResponseInterface unmute(string $account_id)
 * @method \Psr\Http\Message\ResponseInterface unmuteToot(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface unpinToot(string $toot_id)
 * @method \Psr\Http\Message\ResponseInterface updateAttachment(string $attachment_id, array $body = ['description', 'focus'])
 * @method \Psr\Http\Message\ResponseInterface updateCurrentUser(array $body = ['display_name', 'note', 'avatar', 'header', 'locked', 'source', 'fields_attributes'])
 * @method \Psr\Http\Message\ResponseInterface updateFilter(string $filter_id, array $body = ['phrase', 'context', 'irreversible', 'whole_word', 'expires_in'])
 * @method \Psr\Http\Message\ResponseInterface updateList(string $list_id, array $body = ['title'])
 * @method \Psr\Http\Message\ResponseInterface updatePushSubscription(array $body = ['data'])
 * @method \Psr\Http\Message\ResponseInterface userSearch(array $params = ['q', 'limit', 'following'])
 */
class Mastodon extends OAuth2Provider implements CSRFToken, TokenExpires, TokenRefresh{
	use OAuth2CSRFTokenTrait, OAuth2TokenRefreshTrait;

	public const SCOPE_READ   = 'read';
	public const SCOPE_WRITE  = 'write';
	public const SCOPE_FOLLOW = 'follow';
	public const SCOPE_PUSH   = 'push';

	protected $endpointMap = MastodonEndpoints::class;

	/**
	 * set the internal URLs for the given Mastodon instance
	 *
	 * @param string $instance
	 *
	 * @return \chillerlan\OAuth\Providers\Mastodon\Mastodon
	 * @throws \chillerlan\OAuth\OAuthException
	 */
	public function setInstance(string $instance):Mastodon{
		$instance = parse_url($instance);

		if(!isset($instance['scheme']) || !isset($instance['host'])){
			throw new OAuthException('invalid instance URL');
		}

		// @todo: check if host exists/responds

		$instance = $instance['scheme'].'://'.$instance['host'];

		$this->apiURL         = $instance.'/api';
		$this->authURL        = $instance.'/oauth/authorize';
		$this->accessTokenURL = $instance.'/oauth/token';
		$this->userRevokeURL  = $instance.'/oauth/authorized_applications';

		return $this;
	}

}
