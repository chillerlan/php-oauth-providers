<?php
/**
 * Class TwitchTest
 *
 * @filesource   TwitchTest.php
 * @created      15.07.2017
 * @package      chillerlan\OAuthTest\Providers\Twitch
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitch;

use chillerlan\OAuth\Providers\Twitch\Twitch;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property  \chillerlan\OAuth\Providers\Twitch\Twitch $provider
 */
class TwitchAPITest extends OAuth2APITest{

	protected $FQN = Twitch::class;
	protected $ENV = 'TWITCH';

	public function testMe(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->name);
	}

}
