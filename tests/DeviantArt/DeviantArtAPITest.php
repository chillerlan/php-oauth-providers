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
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\DeviantArt\DeviantArt $provider
 */
class DeviantArtAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = DeviantArt::class;
	protected $ENV = 'DEVIANTART';

	protected $testuser;

	protected function setUp():void{
		parent::setUp();

		$this->testuser = $this->dotEnv->DEVIANTART_TESTUSER;
	}

	public function testWhoami(){
		$r = $this->provider->whoami();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
