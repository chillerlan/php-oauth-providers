<?php
/**
 * Class DeviantArtAPITest
 *
 * @created      27.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\DeviantArt;

use chillerlan\OAuth\Providers\DeviantArt\DeviantArt;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property \chillerlan\OAuth\Providers\DeviantArt\DeviantArt $provider
 */
class DeviantArtAPITest extends OAuth2APITest{

	protected string $FQN = DeviantArt::class;
	protected string $ENV = 'DEVIANTART';

	public function testWhoami():void{
		$r = $this->provider->whoami();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
