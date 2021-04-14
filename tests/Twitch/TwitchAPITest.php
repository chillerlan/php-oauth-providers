<?php
/**
 * Class TwitchTest
 *
 * @created      15.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitch;

use chillerlan\OAuth\Providers\Twitch\Twitch;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property  \chillerlan\OAuth\Providers\Twitch\Twitch $provider
 */
class TwitchAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Twitch::class;
	protected string $ENV = 'TWITCH';

	public function testMe():void{
		$r = $this->provider->users();

		$this->assertSame($this->testuser, $this->responseJson($r)->data[0]->display_name);
	}

}
