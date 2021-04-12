<?php
/**
 * Class SteamOpenID
 *
 * @link https://steamcommunity.com/dev
 * @link https://partner.steamgames.com/doc/webapi_overview
 * @link https://steamwebapi.azurewebsites.net/
 *
 * @created      15.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Steam;

use chillerlan\OAuth\Core\{AccessToken, OAuthProvider, ProviderException};
use Psr\Http\Message\{RequestInterface, ResponseInterface, UriInterface};

use function explode, intval, preg_replace, strpos;


/**
 * @method \Psr\Http\Message\ResponseInterface playerServiceGetBadges(array $params = ['steamid'])
 * @method \Psr\Http\Message\ResponseInterface playerServiceGetCommunityBadgeProgress(array $params = ['steamid', 'badgeid'])
 * @method \Psr\Http\Message\ResponseInterface playerServiceGetOwnedGames(array $params = ['steamid', 'include_appinfo', 'include_played_free_games', 'appids_filter', 'include_free_sub', 'skip_unvetted_apps'])
 * @method \Psr\Http\Message\ResponseInterface playerServiceGetRecentlyPlayedGames(array $params = ['steamid', 'count'])
 * @method \Psr\Http\Message\ResponseInterface playerServiceGetSteamLevel(array $params = ['steamid'])
 * @method \Psr\Http\Message\ResponseInterface playerServiceIsPlayingSharedGame(array $params = ['steamid', 'appid_playing'])
 * @method \Psr\Http\Message\ResponseInterface steamAppsGetAppList()
 * @method \Psr\Http\Message\ResponseInterface steamAppsGetSDRConfig(array $params = ['appid', 'partner'])
 * @method \Psr\Http\Message\ResponseInterface steamAppsGetServersAtAddress(array $params = ['addr'])
 * @method \Psr\Http\Message\ResponseInterface steamAppsUpToDateCheck(array $params = ['appid', 'version'])
 * @method \Psr\Http\Message\ResponseInterface steamNewsGetNewsForApp(array $params = ['appid', 'maxlength', 'enddate', 'count', 'feeds', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface steamUserGetFriendList(array $params = ['steamid', 'relationship'])
 * @method \Psr\Http\Message\ResponseInterface steamUserGetPlayerBans(array $params = ['steamids'])
 * @method \Psr\Http\Message\ResponseInterface steamUserGetPlayerSummaries(array $params = ['steamids'])
 * @method \Psr\Http\Message\ResponseInterface steamUserGetUserGroupList(array $params = ['steamid'])
 * @method \Psr\Http\Message\ResponseInterface steamUserResolveVanityURL(array $params = ['vanityurl', 'url_type'])
 * @method \Psr\Http\Message\ResponseInterface steamUserStatsGetGlobalAchievementPercentagesForApp(array $params = ['gameid'])
 * @method \Psr\Http\Message\ResponseInterface steamUserStatsGetGlobalStatsForGame(array $params = ['appid', 'count', 'name[0]', 'startdate', 'enddate'])
 * @method \Psr\Http\Message\ResponseInterface steamUserStatsGetNumberOfCurrentPlayers(array $params = ['appid'])
 * @method \Psr\Http\Message\ResponseInterface steamUserStatsGetPlayerAchievements(array $params = ['steamid', 'appid', 'l'])
 * @method \Psr\Http\Message\ResponseInterface steamUserStatsGetSchemaForGame(array $params = ['appid', 'l'])
 * @method \Psr\Http\Message\ResponseInterface steamUserStatsGetUserStatsForGame(array $params = ['steamid', 'appid'])
 * @method \Psr\Http\Message\ResponseInterface steamWebAPIUtilGetServerInfo()
 * @method \Psr\Http\Message\ResponseInterface steamWebAPIUtilGetSupportedAPIList()
 * @method \Psr\Http\Message\ResponseInterface storeServiceGetAppList(array $params = ['if_modified_since', 'have_description_language', 'include_games', 'include_dlc', 'include_software', 'include_videos', 'include_hardware', 'last_appid', 'max_results'])
 */
class SteamOpenID extends OAuthProvider{

	protected string $authURL         = 'https://steamcommunity.com/openid/login';
	protected string $accessTokenURL  = 'https://steamcommunity.com/openid/login';
	protected ?string $apiURL         = 'https://api.steampowered.com';
	protected ?string $applicationURL = 'https://steamcommunity.com/dev/apikey';
	protected ?string $apiDocs        = 'https://developer.valvesoftware.com/wiki/Steam_Web_API';
	protected ?string $endpointMap    = SteamEndpoints::class;

	/**
	 * @param array|null $params
	 *
	 * @return \Psr\Http\Message\UriInterface
	 */
	public function getAuthURL(array $params = null):UriInterface{

		// we ignore user supplied params here
		$params = [
			'openid.ns'         => 'http://specs.openid.net/auth/2.0',
			'openid.mode'       => 'checkid_setup',
			'openid.return_to'  => $this->options->callbackURL,
			'openid.realm'      => $this->options->key,
			'openid.identity'   => 'http://specs.openid.net/auth/2.0/identifier_select',
			'openid.claimed_id' => 'http://specs.openid.net/auth/2.0/identifier_select',
		];

		return $this->uriFactory->createUri($this->mergeQuery($this->authURL, $params));
	}

	/**
	 * @param array $received
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 */
	public function getAccessToken(array $received):AccessToken{

		$body = [
			'openid.mode' => 'check_authentication',
			'openid.ns'   => 'http://specs.openid.net/auth/2.0',
			'openid.sig'  => $received['openid_sig'],
		];

		foreach(explode(',', $received['openid_signed']) as $item){
			$body['openid.'.$item] = $received['openid_'.$item];
		}

		$request = $this->requestFactory
			->createRequest('POST', $this->accessTokenURL)
			->withHeader('Content-Type', 'application/x-www-form-urlencoded')
			->withBody($this->streamFactory->createStream($this->buildQuery($body)));

		$token = $this->parseTokenResponse($this->http->sendRequest($request));
		$id    = preg_replace('/[^\d]/', '', $received['openid_claimed_id']);

		// as this method is intended for one-time authentication only we'll not receive a token.
		// instead we're gonna save the verified steam user id as token as it is required
		// for several "authenticated" endpoints.
		$token->accessToken = $id;
		$token->extraParams = [
			'claimed_id' => $received['openid_claimed_id'],
			'id_int'     => intval($id),
		];

		$this->storage->storeAccessToken($this->serviceName, $token);

		return $token;
	}

	/**
	 * @param \Psr\Http\Message\ResponseInterface $response
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	protected function parseTokenResponse(ResponseInterface $response):AccessToken{
		$data = explode("\x0a", (string)$response->getBody());

		if(!isset($data[1]) || strpos($data[1], 'is_valid') !== 0){
			throw new ProviderException('unable to parse token response');
		}

		if($data[1] !== 'is_valid:true'){
			throw new ProviderException('invalid id');
		}

		// the response is only validation, so we'll just return an empty token and add the id in the next step
		return new AccessToken([
			'provider' => $this->serviceName,
			'expires'  => AccessToken::EOL_NEVER_EXPIRES,
		]);
	}

	/**
	 * @param \Psr\Http\Message\RequestInterface $request
	 * @param \chillerlan\OAuth\Core\AccessToken $token
	 *
	 * @return \Psr\Http\Message\RequestInterface
	 */
	public function getRequestAuthorization(RequestInterface $request, AccessToken $token):RequestInterface{
		$uri    = (string)$request->getUri();
		$params = ['key' => $this->options->secret];

		// the steamid parameter does not necessarily specify the current user, so add it only when it's not already set
		if(strpos($uri, 'steamid=') === false){ // php8: str_contains
			$params['steamid']= $token->accessToken;
		}

		return $request->withUri($this->uriFactory->createUri($this->mergeQuery($uri, $params)));
	}

}
