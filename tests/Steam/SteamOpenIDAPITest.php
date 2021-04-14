<?php
/**
 * Class SteamOpenIDAPITest
 *
 * @created      15.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Steam;

use chillerlan\OAuth\Providers\Steam\SteamOpenID;
use chillerlan\OAuthTest\Providers\OAuthAPITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Steam\SteamOpenID $provider
 */
class SteamOpenIDAPITest extends OAuthAPITestAbstract{

	protected string $FQN = SteamOpenID::class;
	protected string $ENV = 'STEAMOPENID';

	protected int $id;

	protected function setUp():void{
		parent::setUp();

		$token = $this->storage->getAccessToken($this->provider->serviceName);

		$this->id = $token->extraParams['id_int']; // SteamID64
	}

	/*
	 * ISteamApps
	 */

	public function testSteamAppsGetAppList():void{
		$r = $this->provider->steamAppsGetAppList(); // huuuuge!
/*
		$apps = [];
		$list = $this->responseJson($r)->applist->apps;

		foreach($list as $app){
			$apps[$app->appid] = $app->name;
		}

		ksort($apps);

		file_put_contents(__DIR__.'/steam-applist.json', json_encode($apps, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT));
*/
		$this->assertSame(200, $r->getStatusCode());
	}

	public function testSteamAppsGetSDRConfig():void{
		$r = $this->provider->steamAppsGetSDRConfig(['appid' => 2210]);
		$this->assertSame(1, $this->responseJson($r)->success);
	}

	public function testSteamAppsGetServersAtAddress():void{
		$r = $this->provider->steamAppsGetServersAtAddress(['addr' => '1.2.3.4']);
		$this->assertSame([], $this->responseJson($r)->response->servers);
	}

	public function testSteamAppsUpToDateCheck():void{
		$r = $this->provider->steamAppsUpToDateCheck(['appid' => 240, 'version' => 1234]);
		$this->assertSame(false, $this->responseJson($r)->response->up_to_date);
	}

	/*
	 * ISteamNews
	 */

	public function testSteamNewsGetNewsForApp():void{
		$r = $this->provider->steamNewsGetNewsForApp(['appid' => 227300]);
		$this->assertSame(227300, $this->responseJson($r)->appnews->appid);
	}

	/*
	 * ISteamUser
	 */

	public function testSteamUserGetFriendList():void{
		$r = $this->provider->steamUserGetFriendList(['steamid' => $this->id]);
#		var_dump($this->responseJson($r)->friendslist);
		$this->assertSame(200, $r->getStatusCode());
	}

	public function testSteamUserGetPlayerBans():void{
		$r = $this->provider->steamUserGetPlayerBans(['steamids' => $this->id]);
		$this->assertSame((string)$this->id, $this->responseJson($r)->players[0]->SteamId);
	}

	public function testSteamUserGetPlayerSummaries():void{
		$r = $this->provider->steamUserGetPlayerSummaries(['steamids' => $this->id]);
		$this->assertSame((string)$this->id, $this->responseJson($r)->response->players[0]->steamid);
	}

	public function testSteamUserGetUserGroupList():void{
		$r = $this->provider->steamUserGetUserGroupList(['steamid' => $this->id]);
		$this->assertTrue($this->responseJson($r)->response->success);
	}

	public function testSteamUserResolveVanityURL():void{
		$r = $this->provider->steamUserResolveVanityURL(['vanityurl' => 'robinwalker']);
		$this->assertSame('76561197960435530', $this->responseJson($r)->response->steamid);
	}

	/*
	 * ISteamUserStats
	 */

	public function testSteamUserStatsGetGlobalAchievementPercentagesForApp():void{
		$r = $this->provider->steamUserStatsGetGlobalAchievementPercentagesForApp(['gameid' => 440]);
#		var_dump($this->responseJson($r)->achievementpercentages->achievements);
		$this->assertSame(200, $r->getStatusCode());
	}


/*	public function testSteamUserStatsGetGlobalStatsForGame():void{
		// @todo: find proper example that uses aggregated stats
		$r = $this->provider->steamUserStatsGetGlobalStatsForGame(
			['appid' => 440, 'count' => 1, 'name[0]' => 'TF_SCOUT_LONG_DISTANCE_RUNNER']
		);
		$this->assertSame(200, $r->getStatusCode());
	}*/

	public function testSteamUserStatsGetNumberOfCurrentPlayers():void{
		$r = $this->provider->steamUserStatsGetNumberOfCurrentPlayers(['appid' => 227300]);
		$this->assertSame(1, $this->responseJson($r)->response->result);
	}

	public function testSteamUserStatsGetPlayerAchievements():void{
		$r = $this->provider->steamUserStatsGetPlayerAchievements(['appid' => 227300]);
		$this->assertSame((string)$this->id, $this->responseJson($r)->playerstats->steamID);
		$this->assertSame('Euro Truck Simulator 2', $this->responseJson($r)->playerstats->gameName);
	}

	public function testSteamUserStatsGetSchemaForGame():void{
		$r = $this->provider->steamUserStatsGetSchemaForGame(['appid' => 227300]);
		$this->assertSame('Euro Truck Simulator 2', $this->responseJson($r)->game->gameName);
	}

	public function testSteamUserStatsGetUserStatsForGame():void{
		$r = $this->provider->steamUserStatsGetUserStatsForGame(['appid' => 227300]);
		$this->assertSame((string)$this->id, $this->responseJson($r)->playerstats->steamID);
		$this->assertSame('Euro Truck Simulator 2', $this->responseJson($r)->playerstats->gameName);
	}

	/*
	 * ISteamWebAPIUtil
	 */

	public function testSteamWebAPIUtilGetServerInfo():void{
		$r = $this->provider->steamWebAPIUtilGetServerInfo();
		$this->assertSame(200, $r->getStatusCode());
	}

	public function testSteamWebAPIUtilGetSupportedAPIList():void{
		$r = $this->provider->steamWebAPIUtilGetSupportedAPIList();
		$this->assertSame(200, $r->getStatusCode());
	}

	/*
	 * IPlayerService
	 */

	public function testPlayerServiceGetRecentlyPlayedGames():void{
		$r = $this->provider->playerServiceGetRecentlyPlayedGames(['steamid' => $this->id]);
		$this->assertSame(200, $r->getStatusCode());
	}

	public function testPlayerServiceGetOwnedGames():void{
		$r = $this->provider->playerServiceGetOwnedGames(['steamid' => $this->id, 'include_appinfo' => true]);
		$this->assertSame(200, $r->getStatusCode());
	}

	public function testPlayerServiceGetSteamLevel():void{
		$r = $this->provider->playerServiceGetSteamLevel(['steamid' => $this->id]);
		$this->assertSame(200, $r->getStatusCode());
	}

	public function testPlayerServiceGetBadges():void{
		$r = $this->provider->playerServiceGetBadges(['steamid' => $this->id]);
		$this->assertSame(200, $r->getStatusCode());
	}

	public function testPlayerServiceGetCommunityBadgeProgress():void{
		$r = $this->provider->playerServiceGetCommunityBadgeProgress(['steamid' => $this->id]);
		$this->assertSame(200, $r->getStatusCode());
	}

	public function testPlayerServiceIsPlayingSharedGame():void{
		$r = $this->provider->playerServiceIsPlayingSharedGame(['steamid' => $this->id]);
		$this->assertSame(200, $r->getStatusCode());
	}

	/*
	 * IStoreService
	 */

	public function testStoreServiceGetAppList():void{
		$r = $this->provider->storeServiceGetAppList(['max_results' => 10, 'last_appid' => 2100]);
		$this->assertSame(2200, $this->responseJson($r)->response->apps[0]->appid);
	}

}
