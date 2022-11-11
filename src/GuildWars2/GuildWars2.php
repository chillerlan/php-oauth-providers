<?php
/**
 * Class GuildWars2
 *
 * @link https://api.guildwars2.com/v2
 * @link https://wiki.guildwars2.com/wiki/API:Main
 *
 * GW2 does not support authentication (anymore) but the API still works like a regular OAUth API, so...
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\GuildWars2;

use chillerlan\OAuth\Core\{AccessToken, OAuth2Provider, ProviderException};
use chillerlan\HTTP\Utils\MessageUtil;
use Psr\Http\Message\UriInterface;

use function implode, preg_match, substr, str_starts_with;

/**
 * @method \Psr\Http\Message\ResponseInterface account(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountAchievements(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountBank(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountBuildstorage(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountDailycrafting(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountDungeons(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountDyes(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountEmotes(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountFinishers(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountGliders(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountHome()
 * @method \Psr\Http\Message\ResponseInterface accountHomeCats(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountHomeNodes(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountInventory(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountLuck(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountMailcarriers(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountMapchests(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountMasteries(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountMasteryPoints(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountMaterials(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountMinis(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountMounts()
 * @method \Psr\Http\Message\ResponseInterface accountMountsSkins(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountMountsTypes(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountNovelties(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountOutfits(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountPvpHeroes(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountRaids(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountRecipes(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountSkins(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountTitles(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountWallet(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface accountWorldbosses(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface achievements(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface achievementsCategories(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface achievementsCategoriesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface achievementsDaily()
 * @method \Psr\Http\Message\ResponseInterface achievementsDailyTomorrow()
 * @method \Psr\Http\Message\ResponseInterface achievementsGroups(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface achievementsGroupsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface achievementsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface backstoryAnswers(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface backstoryAnswersId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface backstoryQuestions(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface backstoryQuestionsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface build()
 * @method \Psr\Http\Message\ResponseInterface catsId(string $id)
 * @method \Psr\Http\Message\ResponseInterface characters(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersId(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdBackstory(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdBuildtabs(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdBuildtabsActive(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdCore(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdCrafting(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdEquipment(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdEquipmenttabs(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdEquipmenttabsActive(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdHeropoints(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdInventory(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdQuests(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdRecipes(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdSab(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdSkills(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdSpecializations(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface charactersIdTraining(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface colors(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface colorsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface commerceDelivery(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface commerceExchange()
 * @method \Psr\Http\Message\ResponseInterface commerceExchangeCoins(array $params = ['quantity'])
 * @method \Psr\Http\Message\ResponseInterface commerceExchangeGems(array $params = ['quantity'])
 * @method \Psr\Http\Message\ResponseInterface commerceListings()
 * @method \Psr\Http\Message\ResponseInterface commerceListingsId(string $id)
 * @method \Psr\Http\Message\ResponseInterface commercePrices()
 * @method \Psr\Http\Message\ResponseInterface commercePricesId(string $id)
 * @method \Psr\Http\Message\ResponseInterface commerceTransactions(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface commerceTransactionsCurrent()
 * @method \Psr\Http\Message\ResponseInterface commerceTransactionsCurrentBuys()
 * @method \Psr\Http\Message\ResponseInterface commerceTransactionsCurrentSells()
 * @method \Psr\Http\Message\ResponseInterface commerceTransactionsHistory()
 * @method \Psr\Http\Message\ResponseInterface commerceTransactionsHistoryBuys()
 * @method \Psr\Http\Message\ResponseInterface commerceTransactionsHistorySells()
 * @method \Psr\Http\Message\ResponseInterface continents(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface continentsContinentId(string $continent_id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface continentsContinentIdFloors(string $continent_id)
 * @method \Psr\Http\Message\ResponseInterface continentsContinentIdFloorsFloorId(string $continent_id, string $floor_id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface continentsContinentIdFloorsFloorIdRegions(string $continent_id, string $floor_id)
 * @method \Psr\Http\Message\ResponseInterface continentsContinentIdFloorsFloorIdRegionsRegionId(string $continent_id, string $floor_id, string $region_id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface continentsContinentIdFloorsFloorIdRegionsRegionIdMaps(string $continent_id, string $floor_id, string $region_id)
 * @method \Psr\Http\Message\ResponseInterface continentsContinentIdFloorsFloorIdRegionsRegionIdMapsMapId(string $continent_id, string $floor_id, string $region_id, string $map_id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface createsubtoken(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface currencies(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface currenciesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface dailycrafting()
 * @method \Psr\Http\Message\ResponseInterface dungeons(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface dungeonsId(string $id)
 * @method \Psr\Http\Message\ResponseInterface emblem()
 * @method \Psr\Http\Message\ResponseInterface emblemBackgrounds()
 * @method \Psr\Http\Message\ResponseInterface emblemBackgroundsId(string $id)
 * @method \Psr\Http\Message\ResponseInterface emblemForegrounds()
 * @method \Psr\Http\Message\ResponseInterface emblemForegroundsId(string $id)
 * @method \Psr\Http\Message\ResponseInterface emotes()
 * @method \Psr\Http\Message\ResponseInterface files()
 * @method \Psr\Http\Message\ResponseInterface filesId(string $id)
 * @method \Psr\Http\Message\ResponseInterface finishers(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface finishersId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface gliders(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface glidersId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface guildId(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildIdLog(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildIdMembers(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildIdRanks(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildIdStash(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildIdStorage(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildIdTeams(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildIdTreasury(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildIdUpgrades(string $id, array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface guildPermissions(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface guildPermissionsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface guildSearch()
 * @method \Psr\Http\Message\ResponseInterface guildUpgrades(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface guildUpgradesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface home()
 * @method \Psr\Http\Message\ResponseInterface homeCats()
 * @method \Psr\Http\Message\ResponseInterface homeNodes()
 * @method \Psr\Http\Message\ResponseInterface items(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface itemsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface itemstats(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface itemstatsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface legends()
 * @method \Psr\Http\Message\ResponseInterface legendsId(string $id)
 * @method \Psr\Http\Message\ResponseInterface mailcarriers(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface mailcarriersId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface mapchests()
 * @method \Psr\Http\Message\ResponseInterface maps(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface mapsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface masteries(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface masteriesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface materials(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface materialsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface minis(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface minisId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface mounts()
 * @method \Psr\Http\Message\ResponseInterface mountsSkins(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface mountsTypes(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface nodesId(string $id)
 * @method \Psr\Http\Message\ResponseInterface novelties(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface outfits(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface outfitsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pets(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface petsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface professions(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface professionsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvp()
 * @method \Psr\Http\Message\ResponseInterface pvpAmulets(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpAmuletsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpGames(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface pvpHeroes(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpHeroesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpRacesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpRanks(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpRanksId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpSeasons(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpSeasonsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface pvpSeasonsIdLeaderboards(string $id)
 * @method \Psr\Http\Message\ResponseInterface pvpSeasonsIdLeaderboardsBoardIdRegionId(string $id, string $board, string $region)
 * @method \Psr\Http\Message\ResponseInterface pvpStandings(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface pvpStats(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface quaggans()
 * @method \Psr\Http\Message\ResponseInterface quaggansId(string $id)
 * @method \Psr\Http\Message\ResponseInterface quests(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface races(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface raids(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface raidsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface recipes()
 * @method \Psr\Http\Message\ResponseInterface recipesId(string $id)
 * @method \Psr\Http\Message\ResponseInterface recipesSearch()
 * @method \Psr\Http\Message\ResponseInterface skills(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface skillsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface skins(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface skinsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface specializations(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface specializationsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface stories(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface storiesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface storiesSeasons(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface storiesSeasonsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface titles(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface titlesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface tokeninfo(array $params = ['access_token'])
 * @method \Psr\Http\Message\ResponseInterface traits(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface traitsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface worldbosses()
 * @method \Psr\Http\Message\ResponseInterface worlds(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface worldsId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface wvwAbilities(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface wvwAbilitiesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface wvwMatches()
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesId(string $id)
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesOverview()
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesOverviewId(string $id)
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesScores()
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesScoresId(string $id)
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesStats()
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesStatsId(string $id)
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesStatsIdGuildsGuildId(string $id, string $guild_id)
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesStatsIdTeamsTeamIdTopKdr(string $id, string $team)
 * @method \Psr\Http\Message\ResponseInterface wvwMatchesStatsIdTeamsTeamIdTopKills(string $id, string $team)
 * @method \Psr\Http\Message\ResponseInterface wvwObjectives(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface wvwObjectivesId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface wvwRanks(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface wvwRanksId(string $id, array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface wvwUpgrades(array $params = ['lang'])
 * @method \Psr\Http\Message\ResponseInterface wvwUpgradesId(string $id, array $params = ['lang'])
 */
class GuildWars2 extends OAuth2Provider{

	public const SCOPE_ACCOUNT     = 'account';
	public const SCOPE_INVENTORIES = 'inventories';
	public const SCOPE_CHARACTERS  = 'characters';
	public const SCOPE_TRADINGPOST = 'tradingpost';
	public const SCOPE_WALLET      = 'wallet';
	public const SCOPE_UNLOCKS     = 'unlocks';
	public const SCOPE_PVP         = 'pvp';
	public const SCOPE_BUILDS      = 'builds';
	public const SCOPE_PROGRESSION = 'progression';
	public const SCOPE_GUILDS      = 'guilds';

	protected const AUTH_ERRMSG = 'GuildWars2 does not support authentication anymore.';

	protected string $authURL         = 'https://account.arena.net/applications/create';
	protected ?string $apiURL         = 'https://api.guildwars2.com/v2';
	protected ?string $userRevokeURL  = 'https://account.arena.net/applications';
	protected ?string $apiDocs        = 'https://wiki.guildwars2.com/wiki/API:Main';
	protected ?string $applicationURL = 'https://account.arena.net/applications';
	protected ?string $endpointMap    = GuildWars2Endpoints::class;

	/**
	 * @param string $access_token
	 *
	 * @return \chillerlan\OAuth\Core\AccessToken
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function storeGW2Token(string $access_token):AccessToken{

		if(!preg_match('/^[a-f\d\-]{72}$/i', $access_token)){
			throw new ProviderException('invalid token');
		}

		$request = $this->requestFactory
			->createRequest('GET', $this->mergeQuery($this->apiURL.'/tokeninfo', ['access_token' => $access_token]))
		;

		$tokeninfo = MessageUtil::decodeJSON($this->http->sendRequest($request));

		if(isset($tokeninfo->id) && str_starts_with($access_token, $tokeninfo->id)){

			$token = new AccessToken;

			$token->provider          = $this->serviceName;
			$token->accessToken       = $access_token;
			$token->accessTokenSecret = substr($access_token, 36, 36); // the actual token
			$token->expires           = AccessToken::EOL_NEVER_EXPIRES;
			$token->extraParams       = [
				'token_type' => 'Bearer',
				'id'         => $tokeninfo->id,
				'name'       => $tokeninfo->name,
				'scope'      => implode($this->scopesDelimiter, $tokeninfo->permissions),
			];

			$this->storage->storeAccessToken($this->serviceName, $token);

			return $token;
		}

		throw new ProviderException('unverified token'); // @codeCoverageIgnore
	}

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function getAuthURL(array $params = null, array $scopes = null):UriInterface{
		throw new ProviderException($this::AUTH_ERRMSG);
	}

	/**
	 * @inheritdoc
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function getAccessToken(string $code, string $state = null):AccessToken{
		throw new ProviderException($this::AUTH_ERRMSG);
	}

}
