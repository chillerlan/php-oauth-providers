<?php
/**
 * Class DeviantArtAPITest
 *
 * @filesource   DeviantArtAPITest.php
 * @created      27.10.2017
 * @package      chillerlan\OAuthTest\Providers\DeviantArt
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

	protected $FQN = DeviantArt::class;
	protected $ENV = 'DEVIANTART';

	public function testWhoami(){
		$r = $this->provider->whoami();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
