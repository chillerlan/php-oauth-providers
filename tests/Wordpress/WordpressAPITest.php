<?php
/**
 * Class WordpressAPITest
 *
 * @created      21.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Wordpress;

use chillerlan\OAuth\Providers\Wordpress\Wordpress;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Wordpress\Wordpress $provider
 */
class WordpressAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Wordpress::class;
	protected string $ENV = 'WORDPRESS';

	public function testMe():void{
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
