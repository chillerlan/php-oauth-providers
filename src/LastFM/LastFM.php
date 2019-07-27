<?php
/**
 * Class LastFM
 *
 * @link https://www.last.fm/api/authentication
 *
 * @filesource   LastFM.php
 * @created      10.04.2018
 * @package      chillerlan\OAuth\Providers\LastFM
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\LastFM;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Core\{AccessToken, OAuthProvider, ProviderException};
use Psr\Http\Message\{RequestInterface, ResponseInterface, UriInterface};

/**
 * @method \Psr\Http\Message\ResponseInterface albumAddTags(array $body = ['mbid', 'album', 'artist', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface albumGetInfo(array $params = ['mbid', 'album', 'artist', 'username', 'lang', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface albumGetTags(array $params = ['mbid', 'album', 'artist', 'user', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface albumGetTopTags(array $params = ['mbid', 'album', 'artist', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface albumRemoveTag(array $body = ['mbid', 'album', 'artist', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface albumSearch(array $params = ['album', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface artistAddTags(array $body = ['mbid', 'artist', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface artistGetCorrection(array $params = ['artist'])
 * @method \Psr\Http\Message\ResponseInterface artistGetInfo(array $params = ['mbid', 'artist', 'username', 'lang', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface artistGetSimilar(array $params = ['mbid', 'artist', 'limit', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface artistGetTags(array $params = ['mbid', 'artist', 'user', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface artistGetTopAlbums(array $params = ['mbid', 'artist', 'autocorrect', 'page', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface artistGetTopTags(array $params = ['mbid', 'artist', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface artistGetTopTracks(array $params = ['mbid', 'artist', 'autocorrect', 'page', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface artistRemoveTag(array $body = ['mbid', 'artist', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface artistSearch(array $params = ['artist', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface chartGetTopArtists(array $params = ['limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface chartGetTopTags(array $params = ['limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface chartGetTopTracks(array $params = ['limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface geoGetTopArtists(array $params = ['country', 'location', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface geoGetTopTracks(array $params = ['country', 'location', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface libraryGetArtists(array $params = ['user', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface tagGetInfo(array $params = ['tag', 'lang'])
 * @method \Psr\Http\Message\ResponseInterface tagGetSimilar(array $params = ['tag'])
 * @method \Psr\Http\Message\ResponseInterface tagGetTopAlbums(array $params = ['tag', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface tagGetTopArtists(array $params = ['tag', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface tagGetTopTags()
 * @method \Psr\Http\Message\ResponseInterface tagGetTopTracks(array $params = ['tag', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface tagGetWeeklyChartList(array $params = ['tag'])
 * @method \Psr\Http\Message\ResponseInterface trackAddTags(array $body = ['mbid', 'artist', 'track', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface trackGetCorrection(array $params = ['artist', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackGetInfo(array $params = ['mbid', 'artist', 'track', 'username', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface trackGetSimilar(array $params = ['mbid', 'artist', 'track', 'autocorrect', 'limit'])
 * @method \Psr\Http\Message\ResponseInterface trackGetTags(array $params = ['mbid', 'artist', 'track', 'autocorrect', 'user'])
 * @method \Psr\Http\Message\ResponseInterface trackGetTopTags(array $params = ['mbid', 'artist', 'track', 'autocorrect'])
 * @method \Psr\Http\Message\ResponseInterface trackLove(array $body = ['mbid', 'artist', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackRemoveTag(array $body = ['mbid', 'artist', 'track', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface trackSearch(array $params = ['artist', 'track', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface trackUnlove(array $body = ['mbid', 'artist', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackUpdateNowPlaying(array $body = ['mbid', 'artist', 'track', 'album', 'trackNumber', 'context', 'duration', 'albumArtist'])
 * @method \Psr\Http\Message\ResponseInterface userGetArtistTracks(array $params = ['user', 'artist', 'limit', 'page', 'startTimestamp', 'endTimestamp'])
 * @method \Psr\Http\Message\ResponseInterface userGetFriends(array $params = ['user', 'limit', 'page', 'recenttracks'])
 * @method \Psr\Http\Message\ResponseInterface userGetInfo(array $params = ['user'])
 * @method \Psr\Http\Message\ResponseInterface userGetLovedTracks(array $params = ['user', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface userGetPersonalTags(array $params = ['user', 'limit', 'page', 'tag', 'taggingtype'])
 * @method \Psr\Http\Message\ResponseInterface userGetRecentTracks(array $params = ['user', 'limit', 'page', 'from', 'to', 'extended'])
 * @method \Psr\Http\Message\ResponseInterface userGetTopAlbums(array $params = ['user', 'limit', 'page', 'period'])
 * @method \Psr\Http\Message\ResponseInterface userGetTopArtists(array $params = ['user', 'limit', 'page', 'period'])
 * @method \Psr\Http\Message\ResponseInterface userGetTopTags(array $params = ['user', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface userGetWeeklyAlbumChart(array $params = ['user', 'from', 'to'])
 * @method \Psr\Http\Message\ResponseInterface userGetWeeklyArtistChart(array $params = ['user', 'from', 'to'])
 * @method \Psr\Http\Message\ResponseInterface userGetWeeklyTrackChart(array $params = ['user', 'from', 'to'])
 */
class LastFM extends OAuthProvider{

	public const PERIOD_OVERALL = 'overall';
	public const PERIOD_7DAY    = '7day';
	public const PERIOD_1MONTH  = '1month';
	public const PERIOD_3MONTH  = '3month';
	public const PERIOD_6MONTH  = '6month';
	public const PERIOD_12MONTH = '12month';

	public const PERIODS = [
		self::PERIOD_OVERALL,
		self::PERIOD_7DAY,
		self::PERIOD_1MONTH,
		self::PERIOD_3MONTH,
		self::PERIOD_6MONTH,
		self::PERIOD_12MONTH,
	];

	protected $apiURL         = 'https://ws.audioscrobbler.com/2.0';
	protected $authURL        = 'https://www.last.fm/api/auth';
	protected $userRevokeURL  = 'https://www.last.fm/settings/applications';
	protected $endpointMap    = LastFMEndpoints::class;
	protected $apiDocs        = 'https://www.last.fm/api/';
	protected $applicationURL = 'https://www.last.fm/api/account/create';

	/**
	 * @inheritdoc
	 */
	public function getAuthURL(array $params = null):UriInterface{

		$params = \array_merge($params ?? [], [
			'api_key' => $this->options->key,
		]);

		return $this->uriFactory->createUri(Psr7\merge_query($this->authURL, $params));
	}

	/**
	 * @param array $params
	 *
	 * @return string
	 */
	protected function getSignature(array $params):string {
		\ksort($params);

		$signature = '';

		foreach($params as $k => $v){
			if(!\in_array($k, ['format', 'callback'])){
				$signature .= $k.$v;
			}
		}

		return \md5($signature.$this->options->secret);
	}

	/**
	 * @param string $session_token
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 */
	public function getAccessToken(string $session_token):AccessToken{

		$params = [
			'method'  => 'auth.getSession',
			'format'  => 'json',
			'api_key' => $this->options->key,
			'token'   => $session_token,
		];

		$params['api_sig'] = $this->getSignature($params);

		$request = $this->requestFactory->createRequest('GET', Psr7\merge_query($this->apiURL, $params));

		return $this->parseTokenResponse($this->http->sendRequest($request));
	}

	/**
	 * @param \Psr\Http\Message\ResponseInterface $response
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	protected function parseTokenResponse(ResponseInterface $response):AccessToken{
		$data = Psr7\get_json($response, true);

		if(!$data || !\is_array($data)){
			throw new ProviderException('unable to parse token response');
		}
		elseif(isset($data['error'])){
			throw new ProviderException('error retrieving access token: '.$data['message']);
		}
		elseif(!isset($data['session']['key'])){
			throw new ProviderException('token missing');
		}

		$token = new AccessToken([
			'provider'    => $this->serviceName,
			'accessToken' => $data['session']['key'],
			'expires'     => AccessToken::EOL_NEVER_EXPIRES,
		]);

		unset($data['session']['key']);

		$token->extraParams = $data;

		$this->storage->storeAccessToken($this->serviceName, $token);

		return $token;
	}

	/**
	 * @param string $apiMethod
	 * @param array  $params
	 * @param array  $body
	 *
	 * @return array
	 */
	protected function requestParams(string $apiMethod, array $params, array $body):array {

		$params = \array_merge($params, $body, [
			'method'  => $apiMethod,
			'format'  => 'json',
			'api_key' => $this->options->key,
			'sk'      => $this->storage->getAccessToken($this->serviceName)->accessToken,
		]);

		$params['api_sig'] = $this->getSignature($params);

		return $params;
	}

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
		$method = $method ?? 'GET';
		$params = $this->requestParams($path, $params ?? [], $body ?? []);

		if($method === 'POST'){
			$body   = $params;
			$params = [];
		}

		$request = $this->requestFactory->createRequest($method, Psr7\merge_query($this->apiURL, $params));

		foreach(\array_merge($this->apiHeaders, $headers ?? []) as $header => $value){
			$request = $request->withAddedHeader($header, $value);
		}

		if($method === 'POST'){
			$request = $request->withHeader('Content-Type', 'application/x-www-form-urlencoded');
			$body    = $this->streamFactory->createStream(\http_build_query($body, '', '&', \PHP_QUERY_RFC1738));
			$request = $request->withBody($body);
		}

		return $this->http->sendRequest($request);
	}

	/**
	 * @inheritDoc
	 * @codeCoverageIgnore
	 */
	public function getRequestAuthorization(RequestInterface $request, AccessToken $token):RequestInterface{
		return $request;
	}

	/**
	 * @todo
	 *
	 * @param array $tracks
	 */
#	public function scrobble(array $tracks){}

}
