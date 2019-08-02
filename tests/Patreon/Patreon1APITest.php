<?php
/**
 * Class Patreon1APITest
 *
 * @filesource   Patreon1APITest.php
 * @created      04.03.2019
 * @package      chillerlan\OAuthTest\Providers\Patreon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Patreon;

use chillerlan\OAuth\Providers\Patreon\Patreon1;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property \chillerlan\OAuth\Providers\Patreon\Patreon1 $provider
 */
class Patreon1APITest extends OAuth2APITest{

	protected $FQN = Patreon1::class;
	protected $ENV = 'PATREON1';

	public function testGetCurrentUser(){
		$r = $this->provider->currentUser();
		$this->assertSame($this->testuser, $this->responseJson($r)->data->attributes->email);
	}

}
