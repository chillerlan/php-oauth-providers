<?php
/**
 * Class LastFM
 *
 * @link https://www.last.fm/api/authentication
 *
 * @created      10.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\LastFM;

use chillerlan\OAuth\Core\{AccessToken, OAuthProvider, ProviderException};
use Psr\Http\Message\{RequestInterface, ResponseInterface, UriInterface};

use function array_merge, in_array, is_array, ksort, md5;
use function chillerlan\HTTP\Utils\get_json;

use const PHP_QUERY_RFC1738;

/**
 * @method \Psr\Http\Message\ResponseInterface albumAddTags(array $body = ['album', 'artist', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface albumGetInfo(array $params = ['album', 'artist', 'autocorrect', 'lang', 'mbid', 'username'])
 * @method \Psr\Http\Message\ResponseInterface albumGetTags(array $params = ['album', 'artist', 'autocorrect', 'mbid', 'user'])
 * @method \Psr\Http\Message\ResponseInterface albumGetTopTags(array $params = ['album', 'artist', 'autocorrect', 'mbid'])
 * @method \Psr\Http\Message\ResponseInterface albumRemoveTag(array $body = ['album', 'artist', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface albumSearch(array $params = ['album', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface artistAddTags(array $body = ['artist', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface artistGetCorrection(array $params = ['artist'])
 * @method \Psr\Http\Message\ResponseInterface artistGetInfo(array $params = ['artist', 'autocorrect', 'lang', 'mbid', 'username'])
 * @method \Psr\Http\Message\ResponseInterface artistGetSimilar(array $params = ['artist', 'autocorrect', 'limit', 'mbid'])
 * @method \Psr\Http\Message\ResponseInterface artistGetTags(array $params = ['artist', 'autocorrect', 'mbid', 'user'])
 * @method \Psr\Http\Message\ResponseInterface artistGetTopAlbums(array $params = ['artist', 'autocorrect', 'limit', 'mbid', 'page'])
 * @method \Psr\Http\Message\ResponseInterface artistGetTopTags(array $params = ['artist', 'autocorrect', 'mbid'])
 * @method \Psr\Http\Message\ResponseInterface artistGetTopTracks(array $params = ['artist', 'autocorrect', 'limit', 'mbid', 'page'])
 * @method \Psr\Http\Message\ResponseInterface artistRemoveTag(array $body = ['artist', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface artistSearch(array $params = ['artist', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface chartGetTopArtists(array $params = ['limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface chartGetTopTags(array $params = ['limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface chartGetTopTracks(array $params = ['limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface geoGetTopArtists(array $params = ['country', 'limit', 'page'])
 * @method \Psr\Http\Message\ResponseInterface geoGetTopTracks(array $params = ['country', 'limit', 'location', 'page'])
 * @method \Psr\Http\Message\ResponseInterface libraryGetArtists(array $params = ['limit', 'page', 'user'])
 * @method \Psr\Http\Message\ResponseInterface tagGetInfo(array $params = ['lang', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface tagGetSimilar(array $params = ['tag'])
 * @method \Psr\Http\Message\ResponseInterface tagGetTopAlbums(array $params = ['limit', 'page', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface tagGetTopArtists(array $params = ['limit', 'page', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface tagGetTopTags()
 * @method \Psr\Http\Message\ResponseInterface tagGetTopTracks(array $params = ['limit', 'page', 'tag'])
 * @method \Psr\Http\Message\ResponseInterface tagGetWeeklyChartList(array $params = ['tag'])
 * @method \Psr\Http\Message\ResponseInterface trackAddTags(array $body = ['artist', 'tags', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackGetCorrection(array $params = ['artist', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackGetInfo(array $params = ['artist', 'autocorrect', 'mbid', 'track', 'username'])
 * @method \Psr\Http\Message\ResponseInterface trackGetSimilar(array $params = ['artist', 'autocorrect', 'limit', 'mbid', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackGetTags(array $params = ['artist', 'autocorrect', 'mbid', 'track', 'user'])
 * @method \Psr\Http\Message\ResponseInterface trackGetTopTags(array $params = ['artist', 'autocorrect', 'mbid', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackLove(array $body = ['artist', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackRemoveTag(array $body = ['artist', 'tag', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackSearch(array $params = ['artist', 'limit', 'page', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackUnlove(array $body = ['artist', 'track'])
 * @method \Psr\Http\Message\ResponseInterface trackUpdateNowPlaying(array $body = ['album', 'albumArtist', 'artist', 'context', 'duration', 'mbid', 'track', 'trackNumber'])
 * @method \Psr\Http\Message\ResponseInterface userGetFriends(array $params = ['limit', 'page', 'recenttracks', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetInfo(array $params = ['user'])
 * @method \Psr\Http\Message\ResponseInterface userGetLovedTracks(array $params = ['limit', 'page', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetPersonalTags(array $params = ['limit', 'page', 'tag', 'taggingtype[artist|album|track]', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetRecentTracks(array $params = ['extended', 'from', 'limit', 'page', 'to', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetTopAlbums(array $params = ['limit', 'page', 'period', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetTopArtists(array $params = ['limit', 'page', 'period', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetTopTags(array $params = ['limit', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetTopTracks(array $params = ['limit', 'page', 'period', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetWeeklyAlbumChart(array $params = ['from', 'to', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetWeeklyArtistChart(array $params = ['from', 'to', 'user'])
 * @method \Psr\Http\Message\ResponseInterface userGetWeeklyChartList(array $params = ['user'])
 * @method \Psr\Http\Message\ResponseInterface userGetWeeklyTrackChart(array $params = ['from', 'to', 'user'])
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

	protected string $authURL        = 'https://www.last.fm/api/auth';
	protected ?string $apiURL         = 'https://ws.audioscrobbler.com/2.0';
	protected ?string $userRevokeURL  = 'https://www.last.fm/settings/applications';
	protected ?string $endpointMap    = LastFMEndpoints::class;
	protected ?string $apiDocs        = 'https://www.last.fm/api/';
	protected ?string $applicationURL = 'https://www.last.fm/api/account/create';

	/**
	 * @inheritdoc
	 */
	public function getAuthURL(array $params = null):UriInterface{

		$params = array_merge($params ?? [], [
			'api_key' => $this->options->key,
		]);

		return $this->uriFactory->createUri($this->mergeQuery($this->authURL, $params));
	}

	/**
	 * @param array $params
	 *
	 * @return string
	 */
	protected function getSignature(array $params):string{
		ksort($params);

		$signature = '';

		foreach($params as $k => $v){
			if(!in_array($k, ['format', 'callback'])){
				$signature .= $k.$v;
			}
		}

		return md5($signature.$this->options->secret);
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

		/** @phan-suppress-next-line PhanTypeMismatchArgumentNullable */
		$request = $this->requestFactory->createRequest('GET', $this->mergeQuery($this->apiURL, $params));

		return $this->parseTokenResponse($this->http->sendRequest($request));
	}

	/**
	 * @param \Psr\Http\Message\ResponseInterface $response
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	protected function parseTokenResponse(ResponseInterface $response):AccessToken{
		$data = get_json($response, true);

		if(!$data || !is_array($data)){
			throw new ProviderException('unable to parse token response');
		}
		elseif(isset($data['error'])){
			throw new ProviderException('error retrieving access token: '.$data['message']);
		}
		elseif(!isset($data['session']['key'])){
			throw new ProviderException('token missing');
		}

		$token = new AccessToken;

		$token->provider     = $this->serviceName;
		$token->accessToken  = $data['session']['key'];
		$token->expires      = AccessToken::EOL_NEVER_EXPIRES;

		unset($data['session']['key']);

		$token->extraParams = $data;

		$this->storage->storeAccessToken($this->serviceName, $token);

		return $token;
	}

	/**
	 * @inheritDoc
	 */
	public function request(
		string $path,
		array $params = null,
		string $method = null,
		$body = null,
		array $headers = null
	):ResponseInterface{
		$method ??= 'GET';

		$params = array_merge(($params ?? []), ($body ?? []), [
			'method'  => $path,
			'format'  => 'json',
			'api_key' => $this->options->key,
			'sk'      => $this->storage->getAccessToken($this->serviceName)->accessToken,
		]);

		$params['api_sig'] = $this->getSignature($params);

		if($method === 'POST'){
			$body   = $params;
			$params = [];
		}

		/** @phan-suppress-next-line PhanTypeMismatchArgumentNullable */
		$request = $this->requestFactory->createRequest($method, $this->mergeQuery($this->apiURL, $params));

		foreach(array_merge($this->apiHeaders, $headers ?? []) as $header => $value){
			$request = $request->withAddedHeader($header, $value);
		}

		if($method === 'POST'){
			$request = $request->withHeader('Content-Type', 'application/x-www-form-urlencoded');
			$body    = $this->streamFactory->createStream($this->buildQuery($body, PHP_QUERY_RFC1738));
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
