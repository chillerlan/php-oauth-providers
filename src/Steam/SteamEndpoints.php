<?php
/**
 * Class SteamEndpoints (auto created)
 *
 * @link http://api.steampowered.com/ISteamWebAPIUtil/GetSupportedAPIList/v0001/
 *
 * @created 16.03.2021
 * @license MIT
 */

namespace chillerlan\OAuth\Providers\Steam;

use chillerlan\OAuth\MagicAPI\EndpointMap;

class SteamEndpoints extends EndpointMap{

	/*
	 * ISteamApps
	 */

	/**
	 * ISteamApps/GetAppList
	 */
	protected array $steamAppsGetAppList = [
		'path'   => '/ISteamApps/GetAppList/v2',
		'method' => 'GET',
		'query'  => [],
	];

	/**
	 * ISteamApps/GetSDRConfig
	 */
	protected array $steamAppsGetSDRConfig = [
		'path'   => '/ISteamApps/GetSDRConfig/v1',
		'method' => 'GET',
		'query'  => ['appid', 'partner'],
	];

	/**
	 * ISteamApps/GetServersAtAddress
	 */
	protected array $steamAppsGetServersAtAddress = [
		'path'   => '/ISteamApps/GetServersAtAddress/v1',
		'method' => 'GET',
		'query'  => ['addr'],
	];

	/**
	 * ISteamApps/UpToDateCheck
	 */
	protected array $steamAppsUpToDateCheck = [
		'path'   => '/ISteamApps/UpToDateCheck/v1',
		'method' => 'GET',
		'query'  => ['appid', 'version'],
	];

	/*
	 * ISteamNews
	 */

	/**
	 * ISteamNews/GetNewsForApp
	 */
	protected array $steamNewsGetNewsForApp = [
		'path'   => '/ISteamNews/GetNewsForApp/v2',
		'method' => 'GET',
		'query'  => ['appid', 'maxlength', 'enddate', 'count', 'feeds', 'tags'],
	];

	/*
	 * ISteamUser
	 */

	/**
	 * ISteamUser/GetFriendList
	 */
	protected array $steamUserGetFriendList = [
		'path'   => '/ISteamUser/GetFriendList/v1',
		'method' => 'GET',
		'query'  => ['steamid', 'relationship'],
	];

	/**
	 * ISteamUser/GetPlayerBans
	 */
	protected array $steamUserGetPlayerBans = [
		'path'   => '/ISteamUser/GetPlayerBans/v1',
		'method' => 'GET',
		'query'  => ['steamids'],
	];

	/**
	 * ISteamUser/GetPlayerSummaries
	 */
	protected array $steamUserGetPlayerSummaries = [
		'path'   => '/ISteamUser/GetPlayerSummaries/v2',
		'method' => 'GET',
		'query'  => ['steamids'],
	];

	/**
	 * ISteamUser/GetUserGroupList
	 */
	protected array $steamUserGetUserGroupList = [
		'path'   => '/ISteamUser/GetUserGroupList/v1',
		'method' => 'GET',
		'query'  => ['steamid'],
	];

	/**
	 * ISteamUser/ResolveVanityURL
	 */
	protected array $steamUserResolveVanityURL = [
		'path'   => '/ISteamUser/ResolveVanityURL/v1',
		'method' => 'GET',
		'query'  => ['vanityurl', 'url_type'],
	];

	/*
	 * ISteamUserStats
	 */

	/**
	 * ISteamUserStats/GetGlobalAchievementPercentagesForApp
	 */
	protected array $steamUserStatsGetGlobalAchievementPercentagesForApp = [
		'path'   => '/ISteamUserStats/GetGlobalAchievementPercentagesForApp/v2',
		'method' => 'GET',
		'query'  => ['gameid'],
	];

	/**
	 * ISteamUserStats/GetGlobalStatsForGame
	 */
	protected array $steamUserStatsGetGlobalStatsForGame = [
		'path'   => '/ISteamUserStats/GetGlobalStatsForGame/v1',
		'method' => 'GET',
		'query'  => ['appid', 'count', 'name[0]', 'startdate', 'enddate'],
	];

	/**
	 * ISteamUserStats/GetNumberOfCurrentPlayers
	 */
	protected array $steamUserStatsGetNumberOfCurrentPlayers = [
		'path'   => '/ISteamUserStats/GetNumberOfCurrentPlayers/v1',
		'method' => 'GET',
		'query'  => ['appid'],
	];

	/**
	 * ISteamUserStats/GetPlayerAchievements
	 */
	protected array $steamUserStatsGetPlayerAchievements = [
		'path'   => '/ISteamUserStats/GetPlayerAchievements/v1',
		'method' => 'GET',
		'query'  => ['steamid', 'appid', 'l'],
	];

	/**
	 * ISteamUserStats/GetSchemaForGame
	 */
	protected array $steamUserStatsGetSchemaForGame = [
		'path'   => '/ISteamUserStats/GetSchemaForGame/v2',
		'method' => 'GET',
		'query'  => ['appid', 'l'],
	];

	/**
	 * ISteamUserStats/GetUserStatsForGame
	 */
	protected array $steamUserStatsGetUserStatsForGame = [
		'path'   => '/ISteamUserStats/GetUserStatsForGame/v2',
		'method' => 'GET',
		'query'  => ['steamid', 'appid'],
	];

	/*
	 * ISteamWebAPIUtil
	 */

	/**
	 * ISteamWebAPIUtil/GetServerInfo
	 */
	protected array $steamWebAPIUtilGetServerInfo = [
		'path'   => '/ISteamWebAPIUtil/GetServerInfo/v1',
		'method' => 'GET',
		'query'  => [],
	];

	/**
	 * ISteamWebAPIUtil/GetSupportedAPIList
	 */
	protected array $steamWebAPIUtilGetSupportedAPIList = [
		'path'   => '/ISteamWebAPIUtil/GetSupportedAPIList/v1',
		'method' => 'GET',
		'query'  => [],
	];

	/*
	 * IPlayerService
	 */

	/**
	 * IPlayerService/GetRecentlyPlayedGames
	 */
	protected array $playerServiceGetRecentlyPlayedGames = [
		'path'   => '/IPlayerService/GetRecentlyPlayedGames/v1',
		'method' => 'GET',
		'query'  => ['steamid', 'count'],
	];

	/**
	 * IPlayerService/GetOwnedGames
	 */
	protected array $playerServiceGetOwnedGames = [
		'path'   => '/IPlayerService/GetOwnedGames/v1',
		'method' => 'GET',
		'query'  => ['steamid', 'include_appinfo', 'include_played_free_games', 'appids_filter', 'include_free_sub', 'skip_unvetted_apps'],
	];

	/**
	 * IPlayerService/GetSteamLevel
	 */
	protected array $playerServiceGetSteamLevel = [
		'path'   => '/IPlayerService/GetSteamLevel/v1',
		'method' => 'GET',
		'query'  => ['steamid'],
	];

	/**
	 * IPlayerService/GetBadges
	 */
	protected array $playerServiceGetBadges = [
		'path'   => '/IPlayerService/GetBadges/v1',
		'method' => 'GET',
		'query'  => ['steamid'],
	];

	/**
	 * IPlayerService/GetCommunityBadgeProgress
	 */
	protected array $playerServiceGetCommunityBadgeProgress = [
		'path'   => '/IPlayerService/GetCommunityBadgeProgress/v1',
		'method' => 'GET',
		'query'  => ['steamid', 'badgeid'],
	];

	/**
	 * IPlayerService/IsPlayingSharedGame
	 */
	protected array $playerServiceIsPlayingSharedGame = [
		'path'   => '/IPlayerService/IsPlayingSharedGame/v1',
		'method' => 'GET',
		'query'  => ['steamid', 'appid_playing'],
	];

	/*
	 * IStoreService
	 */

	/**
	 * IStoreService/GetAppList
	 */
	protected array $storeServiceGetAppList = [
		'path'   => '/IStoreService/GetAppList/v1',
		'method' => 'GET',
		'query'  => ['if_modified_since', 'have_description_language', 'include_games', 'include_dlc', 'include_software', 'include_videos', 'include_hardware', 'last_appid', 'max_results'],
	];

}
