<?php
/**
 * Class SoundcloudAPITest
 *
 * @filesource   SoundcloudAPITest.php
 * @created      16.07.2017
 * @package      chillerlan\OAuthTest\Providers\SoundCloud
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\SoundCloud;

use chillerlan\OAuth\Providers\SoundCloud\SoundCloud;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property  \chillerlan\OAuth\Providers\SoundCloud\SoundCloud $provider
 */
class SoundcloudAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = SoundCloud::class;
	protected $ENV = 'SOUNDCLOUD';

	public function testGetUserInfo(){
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
