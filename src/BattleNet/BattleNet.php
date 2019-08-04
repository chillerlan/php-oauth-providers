<?php
/**
 * Class BattleNet
 *
 * @link https://develop.battle.net/documentation
 *
 * @filesource   BattleNet.php
 * @created      02.08.2019
 * @package      chillerlan\OAuth\Providers\BattleNet
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\BattleNet;

use chillerlan\OAuth\Storage\OAuthStorageInterface;
use chillerlan\Settings\SettingsContainerInterface;
use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, ProviderException, TokenExpires};
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;

use function in_array, strtolower;

/**
 * @method \Psr\Http\Message\ResponseInterface userinfo(array $params = ['access_token'])
 */
class BattleNet extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenExpires{

	public const SCOPE_OPENID      = 'openid';
	public const SCOPE_PROFILE_D3  = 'd3.profile';
	public const SCOPE_PROFILE_SC2 = 'sc2.profile';
	public const SCOPE_PROFILE_WOW = 'wow.profile';

	protected $apiDocs        = 'https://develop.battle.net/documentation';
	protected $applicationURL = 'https://develop.battle.net/access/clients';
	protected $userRevokeURL  = 'https://account.blizzard.com/connections';
	protected $endpointMap    = BattleNetEndpoints::class;

	/**
	 * BattleNet constructor.
	 *
	 * @param \Psr\Http\Client\ClientInterface                $http
	 * @param \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
	 * @param \chillerlan\Settings\SettingsContainerInterface $options
	 * @param \Psr\Log\LoggerInterface|null                   $logger
	 */
	public function __construct(ClientInterface $http, OAuthStorageInterface $storage, SettingsContainerInterface $options, LoggerInterface $logger = null){
		parent::__construct($http, $storage, $options, $logger);

		$this->setRegion('eu');
	}

	/**
	 * @param string $region
	 *
	 * @return \chillerlan\OAuth\Providers\BattleNet\BattleNet
	 * @throws \chillerlan\OAuth\Core\ProviderException
	 */
	public function setRegion(string $region):BattleNet{
		$region = strtolower($region);

		if(!in_array($region, ['apac', 'cn', 'eu', 'us'], true)){
			throw new ProviderException('invalid region: '.$region);
		}

		$url = 'https://'.($region === 'cn' ? 'www.battlenet.com.cn' : $region.'.battle.net');

		$this->apiURL         = $url;
		$this->authURL        = $url.'/oauth/authorize';
		$this->accessTokenURL = $url.'/oauth/token';

		return $this;
	}

}
