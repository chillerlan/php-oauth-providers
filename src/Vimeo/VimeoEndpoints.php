<?php
/**
 * Class VimeoEndpoints
 *
 * @filesource   VimeoEndpoints.php
 * @created      09.04.2018
 * @package      chillerlan\OAuth\Providers\Vimeo
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Vimeo;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @todo WIP
 * @link https://developer.vimeo.com/api/reference
 *
 * Note: the endpoints are ordered by the api docs (against any logical pattern)
 */
class VimeoEndpoints extends EndpointMap{

	/**
	 * Albums
	 *
	 * @link https://developer.vimeo.com/api/reference/albums
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#PUT/users/{user_id}/albums/{album_id}/videos/{video_id}
	 */
	protected array $userAlbumAddVideo = [
		'path'          => '/users/%1$s/albums/%2$s/videos/%3$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['user_id', 'album_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meAlbumAddVideo = [
		'path'          => '/me/albums/%1$s/videos/%2$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['album_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#PUT/users/{user_id}/albums/{album_id}/videos
	 */
	protected array $userAlbumAddVideos = [
		'path'          => '/users/%1$s/albums/%2$s/videos',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['user_id', 'album_id'],
		'body'          => ['videos'],
		'headers'       => [],
	];

	protected array $meAlbumAddVideos = [
		'path'          => '/me/albums/%1$s/videos',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['album_id'],
		'body'          => ['videos'],
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#POST/users/{user_id}/albums
	 */
	protected array $userCreateAlbum = [
		'path'          => '/users/%1$s/albums',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => [
			'brand_color', 'description', 'hide_nav', 'layout', 'name',
			'password', 'privacy', 'review_mode', 'sort', 'theme'
		],
		'headers'       => [],
	];

	protected array $meCreateAlbum = [
		'path'          => '/me/albums',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => [
			'brand_color', 'description', 'hide_nav', 'layout', 'name',
			'password', 'privacy', 'review_mode', 'sort', 'theme'
		],
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#DELETE/users/{user_id}/albums/{album_id}
	 */
	protected array $userDeleteAlbum = [
		'path'          => '/users/%1$s/albums/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['user_id', 'album_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meDeleteAlbum = [
		'path'          => '/me/albums/%1$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['album_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#PATCH/users/{user_id}/albums/{album_id}
	 */
	protected array $userEditAlbum = [
		'path'          => '/users/%1$s/albums/%2$s',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['user_id', 'album_id'],
		'body'          => [
			'brand_color', 'description', 'hide_nav', 'layout', 'name',
			'password', 'privacy', 'review_mode', 'sort', 'theme'
		],
		'headers'       => [],
	];

	protected array $meEditAlbum = [
		'path'          => '/me/albums/%1$s',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['album_id'],
		'body'          => [
			'brand_color', 'description', 'hide_nav', 'layout', 'name',
			'password', 'privacy', 'review_mode', 'sort', 'theme'
		],
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#GET/users/{user_id}/albums/{album_id}/videos/{video_id}
	 */
	protected array $userAlbumGetVideo = [
		'path'          => '/users/%1$s/albums/%2$s/videos/%3$s',
		'method'        => 'GET',
		'query'         => ['password'],
		'path_elements' => ['user_id', 'album_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meAlbumGetVideo = [
		'path'          => '/me/albums/%1$s/videos/%2$s',
		'method'        => 'GET',
		'query'         => ['password'],
		'path_elements' => ['album_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#GET/users/{user_id}/albums
	 */
	protected array $userGetAlbums = [
		'path'          => '/users/%1$s/albums',
		'method'        => 'GET',
		'query'         => ['direction', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meGetAlbums = [
		'path'          => '/me/albums',
		'method'        => 'GET',
		'query'         => ['direction', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#GET/users/{user_id}/albums/{album_id}/videos
	 */
	protected array $userAlbumGetVideos = [
		'path'          => '/users/%1$s/albums/%2$s/videos',
		'method'        => 'GET',
		'query'         => [
			'containing_uri', 'direction', 'filter', 'filter_embeddable', 'page',
			'password', 'per_page', 'query', 'sort', 'weak_search'
		],
		'path_elements' => ['user_id', 'album_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meAlbumGetVideos = [
		'path'          => '/me/albums/%1$s/videos',
		'method'        => 'GET',
		'query'         => [
			'containing_uri', 'direction', 'filter', 'filter_embeddable', 'page',
			'password', 'per_page', 'query', 'sort', 'weak_search'
		],
		'path_elements' => ['album_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/albums#GET/users/{user_id}/albums/{album_id}
	 */
	protected array $userGetAlbum = [
		'path'          => '/users/%1$s/albums/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'album_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meGetAlbum = [
		'path'          => '/me/albums/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['album_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userAlbumDeleteVideo = [
		'path'          => '/users/%1$s/albums/%2$s/videos/%3$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['user_id', 'album_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meAlbumDeleteVideo = [
		'path'          => '/me/albums/%1$s/videos/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['album_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Authentication Extras
	 *
	 * @link https://developer.vimeo.com/api/reference/authenticationextras
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/authenticationextras#DELETE/tokens
	 */
	protected array $revokeToken = [
		'path'          => '/tokens',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/authenticationextras#GET/oauth/verify
	 */
	protected array $verifyToken = [
		'path'          => '/oauth/verify',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Categories
	 *
	 * @link https://developer.vimeo.com/api/reference/categories
	 */

	/**
	 * @todo
	 * @link
	 */


	/**
	 * @todo
	 * @link https://developer.vimeo.com/api/reference/categories#GET/users/{user_id}/categories
	 */
	protected array $userCategories = [
		'path'          => '/users/%1$s/categories',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Channels
	 *
	 * @link  https://developer.vimeo.com/api/reference/channels
	 */

	/**
	 * @todo
	 * @link
	 */

	/**
	 * 5 Creative Commons
	 *
	 * @link https://developer.vimeo.com/api/reference/creativecommons
	 */

	/**
	 * @todo GET /creativecommons
	 * @link https://developer.vimeo.com/api/reference/creativecommons#GET/creativecommons
	 */

	/**
	 * Embed Presets
	 *
	 * @link https://developer.vimeo.com/api/reference/embedpresets
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/embedpresets#PUT/videos/{video_id}/presets/{preset_id}
	 */
	protected array $videoAssignPreset = [
		'path'          => '/videos/%1$s/presets/%2$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['video_id', 'preset_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @todo ???
	 * @link https://developer.vimeo.com/api/reference/embedpresets#POST/users/{user_id}/customlogos
	 */
	protected array $userCreateCustomlogo = [
		'path'          => '/users/%1$s/customlogos',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];
	protected array $meCreateCustomlogo = [
		'path'          => '/me/customlogos',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];






	/**
	 * @todo
	 * @link https://developer.vimeo.com/api/reference/embedpresets#GET/users/{user_id}/presets/{preset_id}
	 */
	protected array $userGetEmbedPreset = [
		'path'          => '/users/%1$s/presets/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'preset_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meGetEmbedPreset = [
		'path'          => '/me/presets/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['preset_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @todo
	 * @link https://developer.vimeo.com/api/reference/embedpresets#GET/users/{user_id}/presets/{preset_id}/videos
	 */
	protected array $userPresetVideos = [
		'path'          => '/users/%1$s/presets/%2$s/videos',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'preset_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @todo
	 * @link
	 */

	/**
	 * Groups
	 *
	 * @link https://developer.vimeo.com/api/reference/groups
	 */

	/**
	 * @todo
	 * @link
	 */

	/**
	 * Likes
	 *
	 * @link https://developer.vimeo.com/api/reference/likes
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/likes#GET/users/{user_id}/likes/{video_id}
	 */
	protected array $userLikesContains = [
		'path'          => '/users/%1$s/likes/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meLikesContains = [
		'path'          => '/me/likes/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['video_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/likes#GET/videos/{video_id}/likes
	 */
	protected array $videoLikes = [
		'path'          => '/videos/%1$s/likes',
		'method'        => 'GET',
		'query'         => ['query', 'page', 'per_page', 'sort', 'direction'],
		'path_elements' => ['video_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/likes#GET/ondemand/pages/{ondemand_id}/likes
	 */
	protected array $ondemandLikes = [
		'path'          => '/ondemand/pages/%1$s/likes',
		'method'        => 'GET',
		'query'         => ['filter', 'query', 'page', 'per_page', 'sort', 'direction'],
		'path_elements' => ['ondemand_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/likes#GET/users/{user_id}/likes
	 */
	protected array $userLikes = [
		'path'          => '/users/%1$s/likes',
		'method'        => 'GET',
		'query'         => ['filter', 'filter_embeddable', 'query', 'page', 'per_page', 'sort', 'direction'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meLikes = [
		'path'          => '/me/likes',
		'method'        => 'GET',
		'query'         => ['filter', 'filter_embeddable', 'query', 'page', 'per_page', 'sort', 'direction'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/likes#PUT/users/{user_id}/likes/{video_id}
	 */
	protected array $userLikeVideo = [
		'path'          => '/users/%1$s/likes/%2$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['user_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meLikeVideo = [
		'path'          => '/me/likes/%1$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['video_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/likes#DELETE/users/{user_id}/likes/{video_id}
	 */
	protected array $userUnlikeVideo = [
		'path'          => '/users/%1$s/likes/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['user_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meUnlikeVideo = [
		'path'          => '/me/likes/%1$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['video_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * On Demand
	 *
	 * @link https://developer.vimeo.com/api/reference/ondemand
	 */

	/**
	 * @todo
	 * @link
	 */

	/**
	 * Portfolios
	 *
	 * @link https://developer.vimeo.com/api/reference/portfolios
	 */

	/**
	 * @todo PUT /users/{user_id}/portfolios/{portfolio_id}/videos/{video_id}
	 * @todo PUT /me/portfolios/{portfolio_id}/videos/{video_id}
	 * @link https://developer.vimeo.com/api/reference/portfolios#PUT/users/{user_id}/portfolios/{portfolio_id}/videos/{video_id}
	 */

	/**
	 * @todo DELETE /users/{user_id}/portfolios/{portfolio_id}/videos/{video_id}
	 * @todo DELETE /me/portfolios/{portfolio_id}/videos/{video_id}
	 * @link https://developer.vimeo.com/api/reference/portfolios#DELETE/users/{user_id}/portfolios/{portfolio_id}/videos/{video_id}
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/portfolios#GET/users/{user_id}/portfolios/{portfolio_id}
	 */
	protected array $userPortfolio = [
		'path'          => '/users/%1$s/portfolios/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'portfolio_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $mePortfolio = [
		'path'          => '/me/portfolios/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['portfolio_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/portfolios#GET/users/{user_id}/portfolios/{portfolio_id}/videos/{video_id}
	 */
	protected array $userPortfolioGetVideo = [
		'path'          => '/users/%1$s/portfolios/%2$s/videos/%3$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'portfolio_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $mePortfolioGetVideo = [
		'path'          => '/me/portfolios/%1$s/videos/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['portfolio_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/portfolios#GET/users/{user_id}/portfolios
	 */
	protected array $userPortfolios = [
		'path'          => '/users/%1$s/portfolios',
		'method'        => 'GET',
		'query'         => ['direction', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $mePortfolios = [
		'path'          => '/me/portfolios',
		'method'        => 'GET',
		'query'         => ['direction', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/portfolios#GET/users/{user_id}/portfolios/{portfolio_id}/videos
	 */
	protected array $userPortfolioVideos = [
		'path'          => '/users/%1$s/portfolios/%2$s/videos',
		'method'        => 'GET',
		'query'         => ['containing_uri', 'filter', 'filter_embeddable', 'query', 'page', 'per_page', 'sort', 'direction'],
		'path_elements' => ['user_id', 'portfolio_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $mePortfolioVideos = [
		'path'          => '/me/portfolios/%1$s/videos',
		'method'        => 'GET',
		'query'         => ['containing_uri', 'filter', 'filter_embeddable', 'query', 'page', 'per_page', 'sort', 'direction'],
		'path_elements' => ['portfolio_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Tags
	 *
	 * @link https://developer.vimeo.com/api/reference/tags
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/tags#GET/tags/{word}
	 */
	protected array $tags = [
		'path'          => '/tags/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['word'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Users
	 *
	 * @link https://developer.vimeo.com/api/reference/users
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/users/{user_id}/following/{follow_user_id}
	 */
	protected array $userFollowingContains = [
		'path'          => '/users/%1$s/following/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'follow_user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meFollowingContains = [
		'path'          => '/me/following/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['follow_user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @todo POST /users/{user_id}/pictures
	 * @todo POST /me/pictures
	 * @link https://developer.vimeo.com/api/reference/users#POST/users/{user_id}/pictures
	 */

	/**
	 * @todo DELETE /users/{user_id}/pictures/{portraitset_id}
	 * @todo DELETE /me/pictures/{portraitset_id}
	 * @link https://developer.vimeo.com/api/reference/users#DELETE/users/{user_id}/pictures/{portraitset_id}
	 */

	/**
	 * @todo DELETE /me/watched/videos
	 * @link https://developer.vimeo.com/api/reference/users#DELETE/me/watched/videos
	 */

	/**
	 * @todo DELETE /me/watched/videos/{video_id}
	 * @link https://developer.vimeo.com/api/reference/users#DELETE/me/watched/videos/{video_id}
	 */

	/**
	 * @todo PATCH /users/{user_id}
	 * @todo PATCH /me
	 * @link https://developer.vimeo.com/api/reference/users#PATCH/users/{user_id}
	 */

	/**
	 * @todo PATCH /users/{user_id}/pictures/{portraitset_id}
	 * @todo PATCH /me/pictures/{portraitset_id}
	 * @link https://developer.vimeo.com/api/reference/users#PATCH/users/{user_id}/pictures/{portraitset_id}
	 */

	/**
	 * @todo POST /users/{user_id}/following
	 * @todo POST /me/following
	 * @link https://developer.vimeo.com/api/reference/users#POST/users/{user_id}/following
	 */

	/**
	 * @todo PUT /users/{user_id}/following/{follow_user_id}
	 * @todo PUT /me/following/{follow_user_id}
	 * @link https://developer.vimeo.com/api/reference/users#PUT/users/{user_id}/following/{follow_user_id}
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/users/{user_id}
	 */
	protected array $user = [
		'path'          => '/users/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $me = [
		'path'          => '/me',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/users/{user_id}/pictures/{portraitset_id}
	 */
	protected array $userGetPicture = [
		'path'          => '/users/%1$s/pictures/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'portraitset_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meGetPicture = [
		'path'          => '/me/pictures/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['portraitset_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/users/{user_id}/pictures
	 */
	protected array $userPictures = [
		'path'          => '/users/%1$s/pictures',
		'method'        => 'GET',
		'query'         => ['page', 'per_page'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $mePictures = [
		'path'          => '/me/pictures',
		'method'        => 'GET',
		'query'         => ['page', 'per_page'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/users/{user_id}/followers
	 */
	protected array $userFollowers = [
		'path'          => '/users/%1$s/followers',
		'method'        => 'GET',
		'query'         => ['direction', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meFollowers = [
		'path'          => '/me/followers',
		'method'        => 'GET',
		'query'         => ['direction', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/me/watched/videos
	 */
	protected array $meWatchedVideos = [
		'path'          => '/me/watched/videos',
		'method'        => 'GET',
		'query'         => ['page', 'per_page'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/users/{user_id}/following
	 */
	protected array $userFollowing = [
		'path'          => '/users/%1$s/following',
		'method'        => 'GET',
		'query'         => ['direction', 'filter', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meFollowing = [
		'path'          => '/me/following',
		'method'        => 'GET',
		'query'         => ['direction', 'filter', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/users/{user_id}/watchlater
	 */
	protected array $userWatchlater = [
		'path'          => '/users/%1$s/watchlater',
		'method'        => 'GET',
		'query'         => ['direction', 'filter', 'filter_embeddable', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meWatchlater = [
		'path'          => '/me/watchlater',
		'method'        => 'GET',
		'query'         => ['direction', 'filter', 'filter_embeddable', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developer.vimeo.com/api/reference/users#GET/users/{user_id}/feed
	 */
	protected array $userFeed = [
		'path'          => '/users/%1$s/feed',
		'method'        => 'GET',
		'query'         => ['offset', 'page', 'per_page', 'type'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meFeed = [
		'path'          => '/me/feed',
		'method'        => 'GET',
		'query'         => ['offset', 'page', 'per_page', 'type'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userSearch = [
		'path'          => '/users',
		'method'        => 'GET',
		'query'         => ['direction', 'page', 'per_page', 'query', 'sort'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @todo DELETE /users/{user_id}/following/{follow_user_id}
	 * @todo DELETE /me/following/{follow_user_id}
	 * @link https://developer.vimeo.com/api/reference/users#DELETE/users/{user_id}/following/{follow_user_id}
	 */


	/**
	 * Videos
	 *
	 * @link https://developer.vimeo.com/api/reference/videos
	 */





	/**
	 * Watch Later Queue
	 *
	 * @link https://developer.vimeo.com/api/reference/watchlaterqueue
	 */

	/**
	 * @todo PUT /users/{user_id}/watchlater/{video_id}
	 * @todo PUT /me/watchlater/{video_id}
	 * @link https://developer.vimeo.com/api/reference/watchlaterqueue#PUT/users/{user_id}/watchlater/{video_id}
	 */

	/**
	 * @link https://developer.vimeo.com/api/reference/watchlaterqueue#GET/users/{user_id}/watchlater/{video_id}
	 */
	protected array $userWatchlaterContains = [
		'path'          => '/users/%1$s/watchlater/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'video_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected array $meWatchlaterContains = [
		'path'          => '/me/watchlater/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['video_id'],
		'body'          => null,
		'headers'       => [],
	];


	/**
	 * @todo DELETE /users/{user_id}/watchlater/{video_id}
	 * @todo DELETE /me/watchlater/{video_id}
	 * @link https://developer.vimeo.com/api/reference/watchlaterqueue#DELETE/users/{user_id}/watchlater/{video_id}
	 */













	/**
	 * @link
	 */
	protected array $userActivities = [
		'path'          => '/users/%1$s/activities',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userAppearances = [
		'path'          => '/users/%1$s/appearances',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userChannels = [
		'path'          => '/users/%1$s/channels',
		'method'        => 'GET',
		'query'         => ['moderated'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userGroups = [
		'path'          => '/users/%1$s/groups',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userPresets = [
		'path'          => '/users/%1$s/presets',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userVideos = [
		'path'          => '/users/%1$s/videos',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userSharedVideos = [
		'path'          => '/users/%1$s/shared/videos',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userServices = [
		'path'          => '/users/%1$s/services',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userServiceConnection = [
		'path'          => '/users/%1$s/services/%2$s/%3$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id', 'service_type', 'service_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $userTriggers = [
		'path'          => '/users/%1$s/triggers',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

}
