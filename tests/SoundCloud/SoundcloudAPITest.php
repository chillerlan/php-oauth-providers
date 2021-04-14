<?php
/**
 * Class SoundcloudAPITest
 *
 * @created      16.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\SoundCloud;

use chillerlan\OAuth\Providers\SoundCloud\SoundCloud;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property  \chillerlan\OAuth\Providers\SoundCloud\SoundCloud $provider
 */
class SoundcloudAPITest extends OAuth2APITestAbstract{

	protected string $FQN = SoundCloud::class;
	protected string $ENV = 'SOUNDCLOUD';

	public function testGetUserInfo():void{
		$r = $this->provider->me();
		$this::assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
