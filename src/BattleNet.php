<?php
/**
 * Class BattleNet
 *
 * @created      02.08.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, ProviderException};
use chillerlan\OAuth\OAuthOptions;
use chillerlan\OAuth\Storage\OAuthStorageInterface;
use chillerlan\Settings\SettingsContainerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use function in_array;
use function sprintf;
use function strtolower;

/**
 * Battle.net OAuth
 *
 * @see https://develop.battle.net/documentation
 */
class BattleNet extends OAuth2Provider implements ClientCredentials, CSRFToken{

	public const SCOPE_OPENID         = 'openid';
	public const SCOPE_PROFILE_D3     = 'd3.profile';
	public const SCOPE_PROFILE_SC2    = 'sc2.profile';
	public const SCOPE_PROFILE_WOW    = 'wow.profile';

	protected ?string $apiDocs        = 'https://develop.battle.net/documentation';
	protected ?string $applicationURL = 'https://develop.battle.net/access/clients';
	protected ?string $userRevokeURL  = 'https://account.blizzard.com/connections';

	protected array $defaultScopes    = [
		self::SCOPE_OPENID,
		self::SCOPE_PROFILE_D3,
		self::SCOPE_PROFILE_SC2,
		self::SCOPE_PROFILE_WOW,
	];

	/**
	 * @inheritDoc
	 */
	public function __construct(
		ClientInterface $http,
		OAuthOptions|SettingsContainerInterface $options,
		LoggerInterface $logger = null
	){
		parent::__construct($http, $options, $logger);

		$this->setRegion('eu');
	}

	/**
	 * Set the datacenter URLs for the given region
	 *
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

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/oauth/userinfo');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->error, $json->error_description)){
			throw new ProviderException($json->error_description);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
