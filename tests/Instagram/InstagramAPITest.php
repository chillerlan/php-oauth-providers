<?php
/**
 * Class InstagramTest
 *
 * @filesource   InstagramTest.php
 * @created      10.07.2017
 * @package      chillerlan\OAuthTest\Providers\Instagram
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Instagram;

use chillerlan\OAuth\Providers\Instagram\Instagram;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property  \chillerlan\OAuth\Providers\Instagram\Instagram $provider
 */
class InstagramAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Instagram::class;
	protected $ENV = 'INSTAGRAM';

	protected function setUp():void{
		parent::setUp();

		$tokenParams = $this->storage->getAccessToken($this->provider->serviceName)->extraParams;

		$this->testuser = $tokenParams['user']['username'];
	}

	public function testProfile(){
		$r = $this->provider->profile('self');

		$this->assertSame($this->testuser, $this->responseJson($r)->data->username);
	}

}
