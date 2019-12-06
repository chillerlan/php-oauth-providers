<?php
/**
 * Class MusicBrainz
 *
 * @link https://musicbrainz.org/doc/Development
 * @link https://musicbrainz.org/doc/Development/OAuth2
 *
 * @filesource   MusicBrainz.php
 * @created      31.07.2018
 * @package      chillerlan\OAuth\Providers
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\MusicBrainz;

use chillerlan\OAuth\Core\{AccessToken, CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\ResponseInterface;

use function array_merge, date, explode, http_build_query, in_array, sprintf, strtoupper;

use const PHP_QUERY_RFC1738;

/**
 * @method \Psr\Http\Message\ResponseInterface area(array $params = ['inc', 'query', 'limit', 'offset', 'collection'])
 * @method \Psr\Http\Message\ResponseInterface areaId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface artist(array $params = ['inc', 'query', 'limit', 'offset', 'area', 'collection', 'recording', 'release', 'release-group', 'work'])
 * @method \Psr\Http\Message\ResponseInterface artistId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface collection(array $params = ['query', 'limit', 'offset', 'area', 'artist', 'editor', 'event', 'label', 'place', 'recording', 'release', 'release-group', 'work'])
 * @method \Psr\Http\Message\ResponseInterface collectionAdd(string $collectionID, string $releaseIDs, array $params = ['client'], array $body = [''])
 * @method \Psr\Http\Message\ResponseInterface collectionId(string $id)
 * @method \Psr\Http\Message\ResponseInterface collectionRemove(string $collectionID, string $releaseIDs, array $params = ['client'], array $body = [''])
 * @method \Psr\Http\Message\ResponseInterface discid(array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface event(array $params = ['inc', 'query', 'limit', 'offset', 'area', 'artist', 'collection', 'place'])
 * @method \Psr\Http\Message\ResponseInterface eventId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface instrument(array $params = ['inc', 'query', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface instrumentId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface isrc(array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface iswc(array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface label(array $params = ['inc', 'query', 'limit', 'offset', 'area', 'collection', 'release'])
 * @method \Psr\Http\Message\ResponseInterface labelId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface place(array $params = ['inc', 'query', 'limit', 'offset', 'area', 'collection'])
 * @method \Psr\Http\Message\ResponseInterface placeId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface rating(array $params = ['query', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface ratingId(string $id)
 * @method \Psr\Http\Message\ResponseInterface ratingSubmit(array $params = ['client'], array $body = [''])
 * @method \Psr\Http\Message\ResponseInterface recording(array $params = ['inc', 'query', 'limit', 'offset', 'artist', 'collection', 'release'])
 * @method \Psr\Http\Message\ResponseInterface recordingId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface release(array $params = ['inc', 'query', 'limit', 'offset', 'type', 'status', 'area', 'artist', 'collection', 'label', 'track', 'track_artist', 'recording', 'release-group'])
 * @method \Psr\Http\Message\ResponseInterface releaseGroup(array $params = ['inc', 'query', 'limit', 'offset', 'type', 'artist', 'collection', 'release'])
 * @method \Psr\Http\Message\ResponseInterface releaseGroupId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface releaseId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface series(array $params = ['inc', 'query', 'limit', 'offset', 'collection'])
 * @method \Psr\Http\Message\ResponseInterface seriesId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface tag(array $params = ['query', 'limit', 'offset'])
 * @method \Psr\Http\Message\ResponseInterface tagId(string $id)
 * @method \Psr\Http\Message\ResponseInterface tagVote(array $params = ['client'], array $body = [''])
 * @method \Psr\Http\Message\ResponseInterface url(array $params = ['inc', 'query', 'limit', 'offset', 'resource'])
 * @method \Psr\Http\Message\ResponseInterface urlId(string $id, array $params = ['inc'])
 * @method \Psr\Http\Message\ResponseInterface user(array $params = ['name'])
 * @method \Psr\Http\Message\ResponseInterface work(array $params = ['inc', 'query', 'limit', 'offset', 'artist', 'collection'])
 * @method \Psr\Http\Message\ResponseInterface workId(string $id, array $params = ['inc'])
 */
class MusicBrainz extends OAuth2Provider implements CSRFToken, TokenRefresh{

	const SCOPE_PROFILE        = 'profile';
	const SCOPE_EMAIL          = 'email';
	const SCOPE_TAG            = 'tag';
	const SCOPE_RATING         = 'rating';
	const SCOPE_COLLECTION     = 'collection';
	const SCOPE_SUBMIT_ISRC    = 'submit_isrc';
	const SCOPE_SUBMIT_BARCODE = 'submit_barcode';

	protected string $authURL         = 'https://musicbrainz.org/oauth2/authorize';
	protected string $accessTokenURL  = 'https://musicbrainz.org/oauth2/token';
	protected ?string $apiURL         = 'https://musicbrainz.org/ws/2';
	protected ?string $userRevokeURL  = 'https://musicbrainz.org/account/applications';
	protected ?string $endpointMap    = MusicBrainzEndpoints::class;
	protected ?string $apiDocs        = 'https://musicbrainz.org/doc/Development';
	protected ?string $applicationURL = 'https://musicbrainz.org/account/applications';

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function refreshAccessToken(AccessToken $token = null):AccessToken{

		if($token === null){
			$token = $this->storage->getAccessToken($this->serviceName);
		}

		$refreshToken = $token->refreshToken;

		if(empty($refreshToken)){
			throw new ProviderException(
				sprintf('no refresh token available, token expired [%s]', date('Y-m-d h:i:s A', $token->expires))
			);
		}

		$body = [
			'client_id'     => $this->options->key,
			'client_secret' => $this->options->secret,
			'grant_type'    => 'refresh_token',
			'refresh_token' => $refreshToken,
		];

		$request = $this->requestFactory
			->createRequest('POST', $this->refreshTokenURL ?? $this->accessTokenURL) // refreshTokenURL is used in tests
			->withHeader('Content-Type', 'application/x-www-form-urlencoded')
			->withHeader('Accept-Encoding', 'identity')
			->withBody($this->streamFactory->createStream(http_build_query($body, '', '&', PHP_QUERY_RFC1738)))
		;

		$newToken = $this->parseTokenResponse($this->http->sendRequest($request));

		if(empty($newToken->refreshToken)){
			$newToken->refreshToken = $refreshToken;
		}

		$this->storage->storeAccessToken($this->serviceName, $newToken);

		return $newToken;
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
	public function request(
		string $path,
		array $params = null,
		string $method = null,
		$body = null,
		array $headers = null
	):ResponseInterface{
		$params = $params ?? [];
		$method = strtoupper($method);
		$token  = $this->storage->getAccessToken($this->serviceName);

		if($token->isExpired()){
			$token = $this->refreshAccessToken($token);
		}

		if(!isset($params['fmt'])){
			$params['fmt'] = 'json';
		}

		if(in_array($method, ['POST', 'PUT', 'DELETE']) && !isset($params['client'])){
			$params['client'] = $this->options->user_agent; // @codeCoverageIgnore
		}

		$headers = array_merge($this->apiHeaders, $headers ?? [], ['Authorization' => 'Bearer '.$token->accessToken]);

		return parent::request(explode('?', $path)[0], $params, $method, $body, $headers);
	}

}
