<?php
/**
 * Class NPROne
 *
 * @link https://dev.npr.org
 * @link https://github.com/npr/npr-one-backend-proxy-php
 *
 * @filesource   NPROne.php
 * @created      28.07.2019
 * @package      chillerlan\OAuth\Providers\NPR
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\NPR;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, TokenRefresh};
use Psr\Http\Message\{RequestInterface, ResponseInterface};

use function strpos;

/**
 * @method \Psr\Http\Message\ResponseInterface identityFollowing(array $body = ['Affiliation'])
 * @method \Psr\Http\Message\ResponseInterface identityInherit(array $body = ['UserDocument'])
 * @method \Psr\Http\Message\ResponseInterface identityStations(array $body = ['StationIDs'])
 * @method \Psr\Http\Message\ResponseInterface identityUser()
 * @method \Psr\Http\Message\ResponseInterface listeningAggregationRecommendations(string $aggId)
 * @method \Psr\Http\Message\ResponseInterface listeningChannels()
 * @method \Psr\Http\Message\ResponseInterface listeningHistory()
 * @method \Psr\Http\Message\ResponseInterface listeningOrgCategoryRecommendations(string $orgId, string $category)
 * @method \Psr\Http\Message\ResponseInterface listeningOrgRecommendations(string $orgId)
 * @method \Psr\Http\Message\ResponseInterface listeningPromoRecommendations()
 * @method \Psr\Http\Message\ResponseInterface listeningRatings(array $body = ['RatingData'])
 * @method \Psr\Http\Message\ResponseInterface listeningRecommendations()
 * @method \Psr\Http\Message\ResponseInterface listeningSearchRecommendations()
 * @method \Psr\Http\Message\ResponseInterface station(string $stationId)
 * @method \Psr\Http\Message\ResponseInterface stations()
 */
class NPROne extends OAuth2Provider implements CSRFToken, TokenRefresh{

	public const SCOPE_IDENTITY_READONLY  = 'identity.readonly';
	public const SCOPE_IDENTITY_WRITE     = 'identity.write';
	public const SCOPE_LISTENING_READONLY = 'listening.readonly';
	public const SCOPE_LISTENING_WRITE    = 'listening.write';
	public const SCOPE_LOCALACTIVATION    = 'localactivation';

	protected $authURL        = 'https://authorization.api.npr.org/v2/authorize';
	protected $accessTokenURL = 'https://authorization.api.npr.org/v2/token';
	protected $revokeURL      = 'https://authorization.api.npr.org/v2/token/revoke';
	protected $endpointMap    = NPROneEndpoints::class;
	protected $apiDocs        = 'https://dev.npr.org/api/';
	protected $applicationURL = 'https://dev.npr.org/console';

	/**
	 * @param \Psr\Http\Message\RequestInterface $request
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function sendRequest(RequestInterface $request):ResponseInterface{

		// get authorization only if we request the provider API
		if(strpos((string)$request->getUri(), '.api.npr.org/') !== false){ // silly resource subdomains >.<
			$token = $this->storage->getAccessToken($this->serviceName);

			// attempt to refresh an expired token
			if($this->options->tokenAutoRefresh && ($token->isExpired() || $token->expires === $token::EOL_UNKNOWN)){
				$token = $this->refreshAccessToken($token); // @codeCoverageIgnore
			}

			$request = $this->getRequestAuthorization($request, $token);
		}

		return $this->http->sendRequest($request);
	}

}
