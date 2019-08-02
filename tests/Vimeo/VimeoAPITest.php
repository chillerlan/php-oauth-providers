<?php
/**
 * Class VimeoAPITest
 *
 * @filesource   VimeoAPITest.php
 * @created      09.04.2018
 * @package      chillerlan\OAuthTest\Providers\Vimeo
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Vimeo;

use chillerlan\OAuth\Providers\Vimeo\Vimeo;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property \chillerlan\OAuth\Providers\Vimeo\Vimeo $provider
 */
class VimeoAPITest extends OAuth2APITest{

	protected $FQN = Vimeo::class;
	protected $ENV = 'VIMEO';

	public function testLogin(){
		$r = $this->provider->user($this->testuser);
		$this->assertSame('https://vimeo.com/'.$this->testuser, $this->responseJson($r)->link);
	}

}
