<?php
/**
 * Class TumblrTest
 *
 * @filesource   TumblrTest.php
 * @created      24.10.2017
 * @package      chillerlan\OAuthTest\Providers\Tumblr
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Tumblr;

use chillerlan\OAuth\Providers\Tumblr\Tumblr;
use chillerlan\OAuthTest\API\OAuth1APITestAbstract;

/**
 * @property  \chillerlan\OAuth\Providers\Tumblr\Tumblr  $provider
 */
class TumblrAPITest extends OAuth1APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Tumblr::class;
	protected $ENV = 'TUMBLR';

	public function testGetUserInfo(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->response->user->name);
	}

}
