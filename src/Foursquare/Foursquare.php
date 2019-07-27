<?php
/**
 * Class Foursquare
 *
 * @link https://developer.foursquare.com/docs/
 * @link https://developer.foursquare.com/overview/auth
 *
 * @filesource   Foursquare.php
 * @created      10.08.2018
 * @package      chillerlan\OAuth\Providers\Foursquare
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Foursquare;

use chillerlan\OAuth\Core\OAuth2Provider;
use Psr\Http\Message\ResponseInterface;

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Foursquare extends OAuth2Provider{

	protected const API_VERSIONDATE = '20190225';

	protected $apiURL         = 'https://api.foursquare.com/v2';
	protected $authURL        = 'https://foursquare.com/oauth2/authenticate';
	protected $accessTokenURL = 'https://foursquare.com/oauth2/access_token';
	protected $userRevokeURL  = 'https://foursquare.com/settings/connections';
	protected $authMethod     = self::QUERY_OAUTH_TOKEN;
	protected $endpointMap    = FoursquareEndpoints::class;

	/**
	 * @param string $path
	 * @param array  $params
	 * @param string $method
	 * @param null   $body
	 * @param array  $headers
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function request(string $path, array $params = null, string $method = null, $body = null, array $headers = null):ResponseInterface{

		\parse_str(\parse_url($this->apiURL.$path, \PHP_URL_QUERY), $query);

		$query['v'] = $this::API_VERSIONDATE;
		$query['m'] = 'foursquare';

		return parent::request(\explode('?', $path)[0], \array_merge($params ?? [], $query), $method, $body, $headers);
	}

}