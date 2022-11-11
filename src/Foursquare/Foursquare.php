<?php
/**
 * Class Foursquare
 *
 * @link https://developer.foursquare.com/docs/
 * @link https://developer.foursquare.com/overview/auth
 *
 * @created      10.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Foursquare;

use chillerlan\HTTP\Utils\QueryUtil;
use chillerlan\OAuth\Core\OAuth2Provider;
use Psr\Http\Message\{ResponseInterface, StreamInterface};

use function array_merge, explode;

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
	 * @inheritDoc
	 */
	public function request(
		string $path,
		array $params = null,
		string $method = null,
		StreamInterface|array|string $body = null,
		array $headers = null
	):ResponseInterface{
		$queryparams = $this->parseQuery(QueryUtil::parseUrl($this->apiURL.$path)['query'] ?? '');

		$queryparams['v'] = $this::API_VERSIONDATE;
		$queryparams['m'] = 'foursquare';

		return parent::request(explode('?', $path)[0], array_merge($params ?? [], $queryparams), $method, $body, $headers);
	}

}
