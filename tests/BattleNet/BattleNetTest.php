<?php
/**
 * Class BattleNetTest
 *
 * @filesource   BattleNetTest.php
 * @created      02.08.2019
 * @package      chillerlan\OAuthTest\Providers\BattleNet
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\BattleNet;

use chillerlan\OAuth\Core\ProviderException;
use chillerlan\OAuth\Providers\BattleNet\BattleNet;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\BattleNet\BattleNet $provider
 */
class BattleNetTest extends OAuth2ProviderTest{

	protected $FQN = BattleNet::class;

	public function testSetRegion(){
		$this->provider->setRegion('cn');
		$this->assertSame('https://www.battlenet.com.cn', $this->provider->apiURL);

		$this->provider->setRegion('us');
		$this->assertSame('https://us.battle.net', $this->provider->apiURL);
	}

	public function testSetRegionException(){
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('invalid region: foo');

		$this->provider->setRegion('foo');
	}

}
