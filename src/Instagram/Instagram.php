<?php
/**
 * Class Instagram
 *
 * @link https://www.instagram.com/developer/endpoints/
 * @link https://www.instagram.com/developer/authentication/
 *
 * @filesource   Instagram.php
 * @created      10.04.2018
 * @package      chillerlan\OAuth\Providers\Instagram
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Instagram;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2CSRFTokenTrait, OAuth2Provider};

/**
 * @method \Psr\Http\Message\ResponseInterface locationRecentMedia(string $location_id, array $params = ['max_id', 'min_id', 'count'])
 * @method \Psr\Http\Message\ResponseInterface locations(string $location_id)
 * @method \Psr\Http\Message\ResponseInterface media(string $media_id)
 * @method \Psr\Http\Message\ResponseInterface mediaAddComment(string $media_id, array $params = ['text'])
 * @method \Psr\Http\Message\ResponseInterface mediaComments(string $media_id)
 * @method \Psr\Http\Message\ResponseInterface mediaLike(string $media_id)
 * @method \Psr\Http\Message\ResponseInterface mediaLikes(string $media_id)
 * @method \Psr\Http\Message\ResponseInterface mediaRemoveComment(string $media_id, string $comment_id)
 * @method \Psr\Http\Message\ResponseInterface mediaShortcode(string $shortcode)
 * @method \Psr\Http\Message\ResponseInterface mediaUnlike(string $media_id)
 * @method \Psr\Http\Message\ResponseInterface profile(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface recentMedia(string $user_id, array $params = ['max_id', 'min_id', 'count'])
 * @method \Psr\Http\Message\ResponseInterface relationship(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface relationshipUpdate(string $user_id, array $params = ['action'])
 * @method \Psr\Http\Message\ResponseInterface searchLocations(array $params = ['lat', 'lng', 'distance', 'facebook_places_id'])
 * @method \Psr\Http\Message\ResponseInterface searchMedia(array $params = ['lat', 'lng', 'distance'])
 * @method \Psr\Http\Message\ResponseInterface searchTags(array $params = ['q'])
 * @method \Psr\Http\Message\ResponseInterface searchUser(array $params = ['q', 'count'])
 * @method \Psr\Http\Message\ResponseInterface selfFollowedBy()
 * @method \Psr\Http\Message\ResponseInterface selfFollows()
 * @method \Psr\Http\Message\ResponseInterface selfMediaLiked(array $params = ['max_like_id', 'count'])
 * @method \Psr\Http\Message\ResponseInterface selfRequestedBy()
 * @method \Psr\Http\Message\ResponseInterface tags(string $tagname)
 * @method \Psr\Http\Message\ResponseInterface tagsRecentMedia(string $tagname, array $params = ['max_tag_id', 'min_tag_id', 'count'])
 */
class Instagram extends OAuth2Provider implements CSRFToken{
	use OAuth2CSRFTokenTrait;

	public const SCOPE_BASIC          = 'basic';
	public const SCOPE_COMMENTS       = 'comments';
	public const SCOPE_RELATIONSHIPS  = 'relationships';
	public const SCOPE_LIKES          = 'likes';
	public const SCOPE_PUBLIC_CONTENT = 'public_content';
	public const SCOPE_FOLLOWER_LIST  = 'follower_list';

	protected $apiURL         = 'https://api.instagram.com/v1';
	protected $authURL        = 'https://api.instagram.com/oauth/authorize';
	protected $accessTokenURL = 'https://api.instagram.com/oauth/access_token';
	protected $userRevokeURL  = 'https://www.instagram.com/accounts/manage_access/';
	protected $authMethod     = self::QUERY_ACCESS_TOKEN;
	protected $endpointMap    = InstagramEndpoints::class;

}
