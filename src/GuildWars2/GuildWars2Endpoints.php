<?php
/**
 * Class GuildWars2Endpoints (auto created)
 *
 * @link https://wiki.guildwars2.com/wiki/API:Main
 * @link https://api.guildwars2.com/v2.json
 *
 * @filesource   GuildWars2Endpoints.php
 * @created      06.12.2019
 * @package      chillerlan\OAuth\Providers\GuildWars2
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\GuildWars2;

use chillerlan\HTTP\MagicAPI\EndpointMap;

class GuildWars2Endpoints extends EndpointMap{

	protected array $account = [
		'path'          => '/account',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountAchievements = [
		'path'          => '/account/achievements',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountBank = [
		'path'          => '/account/bank',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountDailycrafting = [
		'path'          => '/account/dailycrafting',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountDungeons = [
		'path'          => '/account/dungeons',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountDyes = [
		'path'          => '/account/dyes',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountEmotes = [
		'path'          => '/account/emotes',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountFinishers = [
		'path'          => '/account/finishers',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountGliders = [
		'path'          => '/account/gliders',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountHome = [
		'path'          => '/account/home',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $accountHomeCats = [
		'path'          => '/account/home/cats',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountHomeNodes = [
		'path'          => '/account/home/nodes',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountInventory = [
		'path'          => '/account/inventory',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountLuck = [
		'path'          => '/account/luck',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountMailcarriers = [
		'path'          => '/account/mailcarriers',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountMapchests = [
		'path'          => '/account/mapchests',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountMasteries = [
		'path'          => '/account/masteries',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountMasteryPoints = [
		'path'          => '/account/mastery/points',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountMaterials = [
		'path'          => '/account/materials',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountMinis = [
		'path'          => '/account/minis',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountMounts = [
		'path'          => '/account/mounts',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $accountMountsSkins = [
		'path'          => '/account/mounts/skins',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountMountsTypes = [
		'path'          => '/account/mounts/types',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountNovelties = [
		'path'          => '/account/novelties',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountOutfits = [
		'path'          => '/account/outfits',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountPvpHeroes = [
		'path'          => '/account/pvp/heroes',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountRaids = [
		'path'          => '/account/raids',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountRecipes = [
		'path'          => '/account/recipes',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountSkins = [
		'path'          => '/account/skins',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountTitles = [
		'path'          => '/account/titles',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountWallet = [
		'path'          => '/account/wallet',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $accountWorldbosses = [
		'path'          => '/account/worldbosses',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $achievements = [
		'path'          => '/achievements',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $achievementsCategories = [
		'path'          => '/achievements/categories',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $achievementsCategoriesId = [
		'path'          => '/achievements/categories/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $achievementsDaily = [
		'path'          => '/achievements/daily',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $achievementsDailyTomorrow = [
		'path'          => '/achievements/daily/tomorrow',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $achievementsGroups = [
		'path'          => '/achievements/groups',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $achievementsGroupsId = [
		'path'          => '/achievements/groups/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $achievementsId = [
		'path'          => '/achievements/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $backstoryAnswers = [
		'path'          => '/backstory/answers',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $backstoryAnswersId = [
		'path'          => '/backstory/answers/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $backstoryQuestions = [
		'path'          => '/backstory/questions',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $backstoryQuestionsId = [
		'path'          => '/backstory/questions/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $build = [
		'path'          => '/build',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $catsId = [
		'path'          => '/cats/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $characters = [
		'path'          => '/characters',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $charactersId = [
		'path'          => '/characters/%1$s',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdBackstory = [
		'path'          => '/characters/%1$s/backstory',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdCore = [
		'path'          => '/characters/%1$s/core',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdCrafting = [
		'path'          => '/characters/%1$s/crafting',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdEquipment = [
		'path'          => '/characters/%1$s/equipment',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdHeropoints = [
		'path'          => '/characters/%1$s/heropoints',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdInventory = [
		'path'          => '/characters/%1$s/inventory',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdQuests = [
		'path'          => '/characters/%1$s/quests',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdRecipes = [
		'path'          => '/characters/%1$s/recipes',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdSab = [
		'path'          => '/characters/%1$s/sab',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdSkills = [
		'path'          => '/characters/%1$s/skills',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdSpecializations = [
		'path'          => '/characters/%1$s/specializations',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $charactersIdTraining = [
		'path'          => '/characters/%1$s/training',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $colors = [
		'path'          => '/colors',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $colorsId = [
		'path'          => '/colors/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $commerceDelivery = [
		'path'          => '/commerce/delivery',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $commerceExchange = [
		'path'          => '/commerce/exchange',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $commerceExchangeCoins = [
		'path'          => '/commerce/exchange/coins?quantity',
		'query'         => ['quantity'],
		'path_elements' => [],
	];

	protected array $commerceExchangeGems = [
		'path'          => '/commerce/exchange/gems?quantity',
		'query'         => ['quantity'],
		'path_elements' => [],
	];

	protected array $commerceListings = [
		'path'          => '/commerce/listings',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $commerceListingsId = [
		'path'          => '/commerce/listings/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $commercePrices = [
		'path'          => '/commerce/prices',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $commercePricesId = [
		'path'          => '/commerce/prices/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $commerceTransactions = [
		'path'          => '/commerce/transactions',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $commerceTransactionsCurrent = [
		'path'          => '/commerce/transactions/current',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $commerceTransactionsCurrentBuys = [
		'path'          => '/commerce/transactions/current/buys',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $commerceTransactionsCurrentSells = [
		'path'          => '/commerce/transactions/current/sells',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $commerceTransactionsHistory = [
		'path'          => '/commerce/transactions/history',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $commerceTransactionsHistoryBuys = [
		'path'          => '/commerce/transactions/history/buys',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $commerceTransactionsHistorySells = [
		'path'          => '/commerce/transactions/history/sells',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $continents = [
		'path'          => '/continents',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $continentsContinentId = [
		'path'          => '/continents/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['continent_id'],
	];

	protected array $continentsContinentIdFloors = [
		'path'          => '/continents/%1$s/floors',
		'query'         => [],
		'path_elements' => ['continent_id'],
	];

	protected array $continentsContinentIdFloorsFloorId = [
		'path'          => '/continents/%1$s/floors/%2$s',
		'query'         => ['lang'],
		'path_elements' => ['continent_id', 'floor_id'],
	];

	protected array $continentsContinentIdFloorsFloorIdRegions = [
		'path'          => '/continents/%1$s/floors/%2$s/regions',
		'query'         => [],
		'path_elements' => ['continent_id', 'floor_id'],
	];

	protected array $continentsContinentIdFloorsFloorIdRegionsRegionId = [
		'path'          => '/continents/%1$s/floors/%2$s/regions/%3$s',
		'query'         => ['lang'],
		'path_elements' => ['continent_id', 'floor_id', 'region_id'],
	];

	protected array $continentsContinentIdFloorsFloorIdRegionsRegionIdMaps = [
		'path'          => '/continents/%1$s/floors/%2$s/regions/%3$s/maps',
		'query'         => [],
		'path_elements' => ['continent_id', 'floor_id', 'region_id'],
	];

	protected array $continentsContinentIdFloorsFloorIdRegionsRegionIdMapsMapId = [
		'path'          => '/continents/%1$s/floors/%2$s/regions/%3$s/maps/%4$s',
		'query'         => ['lang'],
		'path_elements' => ['continent_id', 'floor_id', 'region_id', 'map_id'],
	];

	protected array $createsubtoken = [
		'path'          => '/createsubtoken',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $currencies = [
		'path'          => '/currencies',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $currenciesId = [
		'path'          => '/currencies/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $dailycrafting = [
		'path'          => '/dailycrafting',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $dungeons = [
		'path'          => '/dungeons',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $dungeonsId = [
		'path'          => '/dungeons/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $emblem = [
		'path'          => '/emblem',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $emblemBackgrounds = [
		'path'          => '/emblem/backgrounds',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $emblemBackgroundsId = [
		'path'          => '/emblem/backgrounds/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $emblemForegrounds = [
		'path'          => '/emblem/foregrounds',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $emblemForegroundsId = [
		'path'          => '/emblem/foregrounds/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $emotes = [
		'path'          => '/emotes',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $files = [
		'path'          => '/files',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $filesId = [
		'path'          => '/files/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $finishers = [
		'path'          => '/finishers',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $finishersId = [
		'path'          => '/finishers/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $gliders = [
		'path'          => '/gliders',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $glidersId = [
		'path'          => '/gliders/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $guildId = [
		'path'          => '/guild/%1$s',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildIdLog = [
		'path'          => '/guild/%1$s/log',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildIdMembers = [
		'path'          => '/guild/%1$s/members',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildIdRanks = [
		'path'          => '/guild/%1$s/ranks',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildIdStash = [
		'path'          => '/guild/%1$s/stash',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildIdStorage = [
		'path'          => '/guild/%1$s/storage',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildIdTeams = [
		'path'          => '/guild/%1$s/teams',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildIdTreasury = [
		'path'          => '/guild/%1$s/treasury',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildIdUpgrades = [
		'path'          => '/guild/%1$s/upgrades',
		'query'         => ['access_token'],
		'path_elements' => ['id'],
	];

	protected array $guildPermissions = [
		'path'          => '/guild/permissions',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $guildPermissionsId = [
		'path'          => '/guild/permissions/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $guildSearch = [
		'path'          => '/guild/search',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $guildUpgrades = [
		'path'          => '/guild/upgrades',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $guildUpgradesId = [
		'path'          => '/guild/upgrades/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $home = [
		'path'          => '/home',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $homeCats = [
		'path'          => '/home/cats',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $homeNodes = [
		'path'          => '/home/nodes',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $items = [
		'path'          => '/items',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $itemsId = [
		'path'          => '/items/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $itemstats = [
		'path'          => '/itemstats',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $itemstatsId = [
		'path'          => '/itemstats/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $legends = [
		'path'          => '/legends',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $legendsId = [
		'path'          => '/legends/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $mailcarriers = [
		'path'          => '/mailcarriers',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $mailcarriersId = [
		'path'          => '/mailcarriers/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $mapchests = [
		'path'          => '/mapchests',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $maps = [
		'path'          => '/maps',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $mapsId = [
		'path'          => '/maps/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $masteries = [
		'path'          => '/masteries',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $masteriesId = [
		'path'          => '/masteries/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $materials = [
		'path'          => '/materials',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $materialsId = [
		'path'          => '/materials/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $minis = [
		'path'          => '/minis',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $minisId = [
		'path'          => '/minis/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $mounts = [
		'path'          => '/mounts',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $mountsSkins = [
		'path'          => '/mounts/skins',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $mountsTypes = [
		'path'          => '/mounts/types',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $nodesId = [
		'path'          => '/nodes/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $novelties = [
		'path'          => '/novelties',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $outfits = [
		'path'          => '/outfits',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $outfitsId = [
		'path'          => '/outfits/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $pets = [
		'path'          => '/pets',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $petsId = [
		'path'          => '/pets/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $professions = [
		'path'          => '/professions',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $professionsId = [
		'path'          => '/professions/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $pvp = [
		'path'          => '/pvp',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $pvpAmulets = [
		'path'          => '/pvp/amulets',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $pvpAmuletsId = [
		'path'          => '/pvp/amulets/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $pvpGames = [
		'path'          => '/pvp/games',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $pvpHeroes = [
		'path'          => '/pvp/heroes',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $pvpHeroesId = [
		'path'          => '/pvp/heroes/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $pvpRacesId = [
		'path'          => '/pvp/races/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $pvpRanks = [
		'path'          => '/pvp/ranks',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $pvpRanksId = [
		'path'          => '/pvp/ranks/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $pvpSeasons = [
		'path'          => '/pvp/seasons',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $pvpSeasonsId = [
		'path'          => '/pvp/seasons/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $pvpSeasonsIdLeaderboards = [
		'path'          => '/pvp/seasons/%1$s/leaderboards',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $pvpSeasonsIdLeaderboardsBoardIdRegionId = [
		'path'          => '/pvp/seasons/%1$s/leaderboards/%2$s/%3$s',
		'query'         => [],
		'path_elements' => ['id', 'board', 'region'],
	];

	protected array $pvpStandings = [
		'path'          => '/pvp/standings',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $pvpStats = [
		'path'          => '/pvp/stats',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $quaggans = [
		'path'          => '/quaggans',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $quaggansId = [
		'path'          => '/quaggans/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $quests = [
		'path'          => '/quests',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $races = [
		'path'          => '/races',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $raids = [
		'path'          => '/raids',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $raidsId = [
		'path'          => '/raids/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $recipes = [
		'path'          => '/recipes',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $recipesId = [
		'path'          => '/recipes/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $recipesSearch = [
		'path'          => '/recipes/search',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $skills = [
		'path'          => '/skills',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $skillsId = [
		'path'          => '/skills/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $skins = [
		'path'          => '/skins',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $skinsId = [
		'path'          => '/skins/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $specializations = [
		'path'          => '/specializations',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $specializationsId = [
		'path'          => '/specializations/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $stories = [
		'path'          => '/stories',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $storiesId = [
		'path'          => '/stories/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $storiesSeasons = [
		'path'          => '/stories/seasons',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $storiesSeasonsId = [
		'path'          => '/stories/seasons/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $titles = [
		'path'          => '/titles',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $titlesId = [
		'path'          => '/titles/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $tokeninfo = [
		'path'          => '/tokeninfo',
		'query'         => ['access_token'],
		'path_elements' => [],
	];

	protected array $traits = [
		'path'          => '/traits',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $traitsId = [
		'path'          => '/traits/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $worldbosses = [
		'path'          => '/worldbosses',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $worlds = [
		'path'          => '/worlds',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $worldsId = [
		'path'          => '/worlds/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $wvwAbilities = [
		'path'          => '/wvw/abilities',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $wvwAbilitiesId = [
		'path'          => '/wvw/abilities/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $wvwMatches = [
		'path'          => '/wvw/matches',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $wvwMatchesId = [
		'path'          => '/wvw/matches/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $wvwMatchesOverview = [
		'path'          => '/wvw/matches/overview',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $wvwMatchesOverviewId = [
		'path'          => '/wvw/matches/overview/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $wvwMatchesScores = [
		'path'          => '/wvw/matches/scores',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $wvwMatchesScoresId = [
		'path'          => '/wvw/matches/scores/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $wvwMatchesStats = [
		'path'          => '/wvw/matches/stats',
		'query'         => [],
		'path_elements' => [],
	];

	protected array $wvwMatchesStatsId = [
		'path'          => '/wvw/matches/stats/%1$s',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $wvwMatchesStatsIdGuildsGuildId = [
		'path'          => '/wvw/matches/stats/%1$s/guilds/%2$s',
		'query'         => [],
		'path_elements' => ['id', 'guild_id'],
	];

	protected array $wvwMatchesStatsIdTeamsTeamIdTopKdr = [
		'path'          => '/wvw/matches/stats/%1$s/teams/%2$s/top/kdr',
		'query'         => [],
		'path_elements' => ['id', 'team'],
	];

	protected array $wvwMatchesStatsIdTeamsTeamIdTopKills = [
		'path'          => '/wvw/matches/stats/%1$s/teams/%2$s/top/kills',
		'query'         => [],
		'path_elements' => ['id', 'team'],
	];

	protected array $wvwObjectives = [
		'path'          => '/wvw/objectives',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $wvwObjectivesId = [
		'path'          => '/wvw/objectives/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $wvwRanks = [
		'path'          => '/wvw/ranks',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $wvwRanksId = [
		'path'          => '/wvw/ranks/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

	protected array $wvwUpgrades = [
		'path'          => '/wvw/upgrades',
		'query'         => ['lang'],
		'path_elements' => [],
	];

	protected array $wvwUpgradesId = [
		'path'          => '/wvw/upgrades/%1$s',
		'query'         => ['lang'],
		'path_elements' => ['id'],
	];

}
