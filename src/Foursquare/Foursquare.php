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

use function array_merge, explode, parse_str, parse_url;

use const PHP_URL_QUERY;

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Foursquare extends OAuth2Provider{

	protected const API_VERSIONDATE = '20190225';

	protected string $authURL         = 'https://foursquare.com/oauth2/authenticate';
	protected string $accessTokenURL  = 'https://foursquare.com/oauth2/access_token';
	protected ?string $apiURL         = 'https://api.foursquare.com/v2';
	protected ?string $userRevokeURL  = 'https://foursquare.com/settings/connections';
	protected ?string $endpointMap    = FoursquareEndpoints::class;
	protected ?string $apiDocs        = 'https://developer.foursquare.com/docs';
	protected ?string $applicationURL = 'https://foursquare.com/developers/apps';
	protected string $authMethodQuery = 'oauth_token';
	protected int $authMethod         = self::AUTH_METHOD_QUERY;

	/**
	 * @param string $path
	 * @param array  $params
	 * @param string $method
	 * @param null   $body
	 * @param array  $headers
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function request(
		string $path,
		array $params = null,
		string $method = null,
		$body = null, array
		$headers = null
	):ResponseInterface{

		parse_str(parse_url($this->apiURL.$path, PHP_URL_QUERY), $query);

		$query['v'] = $this::API_VERSIONDATE;
		$query['m'] = 'foursquare';

		return parent::request(explode('?', $path)[0], array_merge($params ?? [], $query), $method, $body, $headers);
	}

}
