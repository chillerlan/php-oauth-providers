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

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://www.instagram.com/developer/endpoints/
 */
class InstagramEndpoints extends EndpointMap{

	/**
	 * @link
	 */
	protected array $profile = [
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
	protected array $recentMedia = [
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
	protected array $relationship = [
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
	protected array $relationshipUpdate = [
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
	protected array $searchUser = [
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
	protected array $selfFollows = [
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
	protected array $selfFollowedBy = [
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
	protected array $selfRequestedBy = [
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
	protected array $selfMediaLiked = [
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
	protected array $media = [
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
	protected array $mediaComments = [
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
	protected array $mediaAddComment = [
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
	protected array $mediaRemoveComment = [
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
	protected array $mediaLikes = [
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
	protected array $mediaLike = [
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
	protected array $mediaUnlike = [
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
	protected array $mediaShortcode = [
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
	protected array $searchMedia = [
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
	protected array $tags = [
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
	protected array $tagsRecentMedia = [
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
	protected array $searchTags = [
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
	protected array $locations = [
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
	protected array $locationRecentMedia = [
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
	protected array $searchLocations = [
		'path'          => '/tags/search',
		'method'        => 'GET',
		'query'         => ['lat', 'lng', 'distance', 'facebook_places_id'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
