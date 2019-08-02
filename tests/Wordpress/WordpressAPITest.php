<?php
/**
 * Class WordpressAPITest
 *
 * @filesource   WordpressAPITest.php
 * @created      21.04.2018
 * @package      chillerlan\OAuthTest\Providers\Wordpress
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Wordpress;

use chillerlan\OAuth\Providers\Wordpress\Wordpress;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property \chillerlan\OAuth\Providers\Wordpress\Wordpress $provider
 */
class WordpressAPITest extends OAuth2APITest{

	protected $FQN = Wordpress::class;
	protected $ENV = 'WORDPRESS';

	public function testMe(){
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
