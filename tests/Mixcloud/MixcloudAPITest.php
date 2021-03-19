<?php
/**
 * Class MixcloudAPITest
 *
 * @created      20.04.2018
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

	protected string $FQN = Mixcloud::class;
	protected string $ENV = 'MIXCLOUD';

	public function testMe():void{
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

	public function testUser():void{
		$r = $this->provider->user($this->testuser);

		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
