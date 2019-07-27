<?php
/**
 * Class Vimeo
 *
 * @link https://developer.vimeo.com/
 * @link https://developer.vimeo.com/api/authentication
 *
 * @filesource   Vimeo.php
 * @created      09.04.2018
 * @package      chillerlan\OAuth\Providers\Vimeo
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Vimeo;

use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, TokenExpires};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 * @method \Psr\Http\Message\ResponseInterface meAlbumAddVideo(string $album_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface meAlbumAddVideos(string $album_id, array $body = ['videos'])
 * @method \Psr\Http\Message\ResponseInterface meAlbumDeleteVideo(string $album_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface meAlbumGetVideo(string $album_id, string $video_id, array $params = ['password'])
 * @method \Psr\Http\Message\ResponseInterface meAlbumGetVideos(string $album_id, array $params = ['containing_uri', 'direction', 'filter', 'filter_embeddable', 'page', 'password', 'per_page', 'query', 'sort', 'weak_search'])
 * @method \Psr\Http\Message\ResponseInterface meCreateAlbum(array $body = ['brand_color', 'description', 'hide_nav', 'layout', 'name', 'password', 'privacy', 'review_mode', 'sort', 'theme'])
 * @method \Psr\Http\Message\ResponseInterface meCreateCustomlogo()
 * @method \Psr\Http\Message\ResponseInterface meDeleteAlbum(string $album_id)
 * @method \Psr\Http\Message\ResponseInterface meEditAlbum(string $album_id, array $body = ['brand_color', 'description', 'hide_nav', 'layout', 'name', 'password', 'privacy', 'review_mode', 'sort', 'theme'])
 * @method \Psr\Http\Message\ResponseInterface meFeed(array $params = ['offset', 'page', 'per_page', 'type'])
 * @method \Psr\Http\Message\ResponseInterface meFollowers(array $params = ['direction', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface meFollowing(array $params = ['direction', 'filter', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface meFollowingContains(string $follow_user_id)
 * @method \Psr\Http\Message\ResponseInterface meGetAlbum(string $album_id)
 * @method \Psr\Http\Message\ResponseInterface meGetAlbums(array $params = ['direction', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface meGetEmbedPreset(string $preset_id)
 * @method \Psr\Http\Message\ResponseInterface meGetPicture(string $portraitset_id)
 * @method \Psr\Http\Message\ResponseInterface meLikeVideo(string $video_id)
 * @method \Psr\Http\Message\ResponseInterface meLikes(array $params = ['filter', 'filter_embeddable', 'query', 'page', 'per_page', 'sort', 'direction'])
 * @method \Psr\Http\Message\ResponseInterface meLikesContains(string $video_id)
 * @method \Psr\Http\Message\ResponseInterface mePictures(array $params = ['page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface mePortfolio(string $portfolio_id)
 * @method \Psr\Http\Message\ResponseInterface mePortfolioGetVideo(string $portfolio_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface mePortfolioVideos(string $portfolio_id, array $params = ['containing_uri', 'filter', 'filter_embeddable', 'query', 'page', 'per_page', 'sort', 'direction'])
 * @method \Psr\Http\Message\ResponseInterface mePortfolios(array $params = ['direction', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface meUnlikeVideo(string $video_id)
 * @method \Psr\Http\Message\ResponseInterface meWatchedVideos(array $params = ['page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface meWatchlater(array $params = ['direction', 'filter', 'filter_embeddable', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface meWatchlaterContains(string $video_id)
 * @method \Psr\Http\Message\ResponseInterface ondemandLikes(string $ondemand_id, array $params = ['filter', 'query', 'page', 'per_page', 'sort', 'direction'])
 * @method \Psr\Http\Message\ResponseInterface revokeToken()
 * @method \Psr\Http\Message\ResponseInterface tags(string $word)
 * @method \Psr\Http\Message\ResponseInterface user(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userActivities(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userAlbumAddVideo(string $user_id, string $album_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface userAlbumAddVideos(string $user_id, string $album_id, array $body = ['videos'])
 * @method \Psr\Http\Message\ResponseInterface userAlbumDeleteVideo(string $user_id, string $album_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface userAlbumGetVideo(string $user_id, string $album_id, string $video_id, array $params = ['password'])
 * @method \Psr\Http\Message\ResponseInterface userAlbumGetVideos(string $user_id, string $album_id, array $params = ['containing_uri', 'direction', 'filter', 'filter_embeddable', 'page', 'password', 'per_page', 'query', 'sort', 'weak_search'])
 * @method \Psr\Http\Message\ResponseInterface userAppearances(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userCategories(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userChannels(string $user_id, array $params = ['moderated'])
 * @method \Psr\Http\Message\ResponseInterface userCreateAlbum(string $user_id, array $body = ['brand_color', 'description', 'hide_nav', 'layout', 'name', 'password', 'privacy', 'review_mode', 'sort', 'theme'])
 * @method \Psr\Http\Message\ResponseInterface userCreateCustomlogo(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userDeleteAlbum(string $user_id, string $album_id)
 * @method \Psr\Http\Message\ResponseInterface userEditAlbum(string $user_id, string $album_id, array $body = ['brand_color', 'description', 'hide_nav', 'layout', 'name', 'password', 'privacy', 'review_mode', 'sort', 'theme'])
 * @method \Psr\Http\Message\ResponseInterface userFeed(string $user_id, array $params = ['offset', 'page', 'per_page', 'type'])
 * @method \Psr\Http\Message\ResponseInterface userFollowers(string $user_id, array $params = ['direction', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface userFollowing(string $user_id, array $params = ['direction', 'filter', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface userFollowingContains(string $user_id, string $follow_user_id)
 * @method \Psr\Http\Message\ResponseInterface userGetAlbum(string $user_id, string $album_id)
 * @method \Psr\Http\Message\ResponseInterface userGetAlbums(string $user_id, array $params = ['direction', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface userGetEmbedPreset(string $user_id, string $preset_id)
 * @method \Psr\Http\Message\ResponseInterface userGetPicture(string $user_id, string $portraitset_id)
 * @method \Psr\Http\Message\ResponseInterface userGroups(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userLikeVideo(string $user_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface userLikes(string $user_id, array $params = ['filter', 'filter_embeddable', 'query', 'page', 'per_page', 'sort', 'direction'])
 * @method \Psr\Http\Message\ResponseInterface userLikesContains(string $user_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface userPictures(string $user_id, array $params = ['page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface userPortfolio(string $user_id, string $portfolio_id)
 * @method \Psr\Http\Message\ResponseInterface userPortfolioGetVideo(string $user_id, string $portfolio_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface userPortfolioVideos(string $user_id, string $portfolio_id, array $params = ['containing_uri', 'filter', 'filter_embeddable', 'query', 'page', 'per_page', 'sort', 'direction'])
 * @method \Psr\Http\Message\ResponseInterface userPortfolios(string $user_id, array $params = ['direction', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface userPresetVideos(string $user_id, string $preset_id)
 * @method \Psr\Http\Message\ResponseInterface userPresets(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userSearch(array $params = ['direction', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface userServiceConnection(string $user_id, string $service_type, string $service_id)
 * @method \Psr\Http\Message\ResponseInterface userServices(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userSharedVideos(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userTriggers(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userUnlikeVideo(string $user_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface userVideos(string $user_id)
 * @method \Psr\Http\Message\ResponseInterface userWatchlater(string $user_id, array $params = ['direction', 'filter', 'filter_embeddable', 'page', 'per_page', 'query', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface userWatchlaterContains(string $user_id, string $video_id)
 * @method \Psr\Http\Message\ResponseInterface verifyToken()
 * @method \Psr\Http\Message\ResponseInterface videoAssignPreset(string $video_id, string $preset_id)
 * @method \Psr\Http\Message\ResponseInterface videoLikes(string $video_id, array $params = ['query', 'page', 'per_page', 'sort', 'direction'])
 */
class Vimeo extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenExpires{

	public const SCOPE_PRIVATE     = 'private';
	public const SCOPE_PUBLIC      = 'public';
	public const SCOPE_PURCHASED   = 'purchased';
	public const SCOPE_PURCHASE    = 'purchase';
	public const SCOPE_CREATE      = 'create';
	public const SCOPE_EDIT        = 'edit';
	public const SCOPE_DELETE      = 'delete';
	public const SCOPE_INTERACT    = 'interact';
	public const SCOPE_UPLOAD      = 'upload';
	public const SCOPE_PROMO_CODES = 'promo_codes';
	public const SCOPE_VIDEO_FILES = 'video_files';

	protected const API_VERSION = '3.4';

	protected $apiURL                    = 'https://api.vimeo.com';
	protected $authURL                   = 'https://api.vimeo.com/oauth/authorize';
	protected $accessTokenURL            = 'https://api.vimeo.com/oauth/access_token';
	protected $userRevokeURL             = 'https://vimeo.com/settings/apps';
	protected $authHeaders               = ['Accept' => 'application/vnd.vimeo.*+json;version='.self::API_VERSION];
	protected $apiHeaders                = ['Accept' => 'application/vnd.vimeo.*+json;version='.self::API_VERSION];
	protected $clientCredentialsTokenURL = 'https://api.vimeo.com/oauth/authorize/client';
	protected $endpointMap               = VimeoEndpoints::class;
	protected $apiDocs                   = 'https://developer.vimeo.com';
	protected $applicationURL            = 'https://developer.vimeo.com/apps';

}
