<?php
/**
 * Class BattleNetAPITest
 *
 * @filesource   BattleNetAPITest.php
 * @created      03.08.2019
 * @package      chillerlan\OAuthTest\Providers\BattleNet
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\BattleNet;

use chillerlan\OAuth\Providers\BattleNet\BattleNet;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property \chillerlan\OAuth\Providers\BattleNet\BattleNet $provider
 */
class BattleNetAPITest extends OAuth2APITest{

	protected $FQN = BattleNet::class;
	protected $ENV = 'BATTLENET';

	public function testGetUserinfo(){
		$r = $this->provider->userinfo();

		$this->assertSame($this->testuser, explode('#', $this->responseJson($r)->battletag)[0]);
	}

}
