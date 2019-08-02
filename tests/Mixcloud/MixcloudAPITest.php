<?php
/**
 * Class MixcloudAPITest
 *
 * @filesource   MixcloudAPITest.php
 * @created      20.04.2018
 * @package      chillerlan\OAuthTest\Providers\Mixcloud
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Mixcloud;

use chillerlan\OAuth\Providers\Mixcloud\Mixcloud;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property \chillerlan\OAuth\Providers\Mixcloud\Mixcloud $provider
 */
class MixcloudAPITest extends OAuth2APITest{

	protected $FQN = Mixcloud::class;
	protected $ENV = 'MIXCLOUD';

	public function testMe(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

	public function testUser(){
		$r = $this->provider->user($this->testuser);

		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
