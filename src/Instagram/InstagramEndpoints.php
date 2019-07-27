<?php
/**
 * Class InstagramEndpoints
 *
 * @filesource   InstagramEndpoints.php
 * @created      11.04.2018
 * @package      chillerlan\OAuth\Providers\Instagram
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Instagram;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://www.instagram.com/developer/endpoints/
 */
class InstagramEndpoints extends EndpointMap{

	/**
	 * @link
	 */
	protected $profile = [
		'path'          => '/users/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $recentMedia = [
		'path'          => '/users/%1$s/media/recent',
		'method'        => 'GET',
		'query'         => ['max_id', 'min_id', 'count'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $relationship = [
		'path'          => '/users/%1$s/relationship',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $relationshipUpdate = [
		'path'          => '/users/%1$s/relationship',
		'method'        => 'POST',
		'query'         => ['action'],
		'path_elements' => ['user_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $searchUser = [
		'path'          => '/users/search',
		'method'        => 'GET',
		'query'         => ['q', 'count'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $selfFollows = [
		'path'          => '/users/self/follows',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $selfFollowedBy = [
		'path'          => '/users/self/followed-by',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $selfRequestedBy = [
		'path'          => '/users/self/requested-by',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $selfMediaLiked = [
		'path'          => '/users/self/media/liked',
		'method'        => 'GET',
		'query'         => ['max_like_id', 'count'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $media = [
		'path'          => '/media/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['media_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $mediaComments = [
		'path'          => '/media/%1$s/comments',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['media_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $mediaAddComment = [
		'path'          => '/media/%1$s/comments',
		'method'        => 'POST',
		'query'         => ['text'],
		'path_elements' => ['media_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $mediaRemoveComment = [
		'path'          => '/media/%1$s/comments/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['media_id', 'comment_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $mediaLikes = [
		'path'          => '/media/%1$s/likes',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['media_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $mediaLike = [
		'path'          => '/media/%1$s/likes',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['media_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $mediaUnlike = [
		'path'          => '/media/%1$s/likes',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['media_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $mediaShortcode = [
		'path'          => '/media/shortcode/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['shortcode'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $searchMedia = [
		'path'          => '/media/search',
		'method'        => 'GET',
		'query'         => ['lat', 'lng', 'distance'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $tags = [
		'path'          => '/tags/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['tagname'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $tagsRecentMedia = [
		'path'          => '/tags/%1$s/media/recent',
		'method'        => 'GET',
		'query'         => ['max_tag_id', 'min_tag_id', 'count'],
		'path_elements' => ['tagname'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $searchTags = [
		'path'          => '/tags/search',
		'method'        => 'GET',
		'query'         => ['q'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $locations = [
		'path'          => '/locations/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['location_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $locationRecentMedia = [
		'path'          => '/locations/%1$s/media/recent',
		'method'        => 'GET',
		'query'         => ['max_id', 'min_id', 'count'],
		'path_elements' => ['location_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected $searchLocations = [
		'path'          => '/tags/search',
		'method'        => 'GET',
		'query'         => ['lat', 'lng', 'distance', 'facebook_places_id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
