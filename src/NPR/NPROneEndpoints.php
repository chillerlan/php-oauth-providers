<?php
/**
 * Class NPROneEndpoints
 *
 * @filesource   NPROneEndpoints.php
 * @created      28.07.2019
 * @package      chillerlan\OAuth\Providers\NPR
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\NPR;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://dev.npr.org/api/
 */
class NPROneEndpoints extends EndpointMap{

	protected $API_BASE = 'https://'; // i hate this so much

	protected $listeningChannels = [
		'path'          => 'listening.api.npr.org/v2/channels',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => null,
	];

	protected $listeningOrgRecommendations = [
		'path'          => 'listening.api.npr.org/v2/organizations/%1$s/recommendations',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['orgId'],
		'body'          => null,
		'headers'       => null,
	];

	protected $listeningOrgCategoryRecommendations = [
		'path'          => 'listening.api.npr.org/v2/organizations/%1$s/categories/%2$s/recommendations',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['orgId', 'category'],
		'body'          => null,
		'headers'       => null,
	];

	protected $listeningRatings = [
		'path'          => 'listening.api.npr.org/v2/ratings',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['RatingData'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	protected $listeningRecommendations = [
		'path'          => 'listening.api.npr.org/v2/recommendations',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => null,
	];

	protected $listeningHistory = [
		'path'          => 'listening.api.npr.org/v2/history',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => null,
	];

	protected $listeningPromoRecommendations = [
		'path'          => 'listening.api.npr.org/v2/promo/recommendations',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => null,
	];

	protected $listeningAggregationRecommendations = [
		'path'          => 'listening.api.npr.org/v2/aggregation/%1$s/recommendations',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['aggId'],
		'body'          => null,
		'headers'       => null,
	];

	protected $listeningSearchRecommendations = [
		'path'          => 'listening.api.npr.org/v2/search/recommendations',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => null,
	];

	protected $stations = [
		'path'          => 'station.api.npr.org/v3/stations',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

	protected $station = [
		'path'          => 'station.api.npr.org/v3/stations/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['stationId'],
		'body'          => null,
		'headers'       => null,
	];

	protected $identityUser = [
		'path'          => 'identity.api.npr.org/v2/user',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => null,
	];

	protected $identityStations = [
		'path'          => 'identity.api.npr.org/v2/stations',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['StationIDs'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	protected $identityInherit = [
		'path'          => 'identity.api.npr.org/v2/user/inherit',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['UserDocument'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	protected $identityFollowing = [
		'path'          => 'identity.api.npr.org/v2/following',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['Affiliation'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

}
