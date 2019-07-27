<?php
/**
 * Class GoogleAPITest
 *
 * @filesource   GoogleAPITest.php
 * @created      09.08.2018
 * @package      chillerlan\OAuthTest\Providers\Google
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Google;

use chillerlan\OAuth\Providers\Google\Google;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * Google API usage tests/examples
 *
 * @link https://developers.google.com/oauthplayground/
 *
 * @property \chillerlan\OAuth\Providers\Google\Google $provider
 */
class GoogleAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Google::class;
	protected $ENV = 'GOOGLE';

	protected $testuser_mail;

	protected function setUp():void{
		parent::setUp();

		$this->testuser_mail = $this->dotEnv->GOOGLE_TESTUSER_MAIL;
	}

	public function testGetUserInfo(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser_mail, $this->responseJson($r)->email);
	}

}