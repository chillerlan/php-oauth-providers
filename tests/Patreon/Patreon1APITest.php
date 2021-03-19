<?php
/**
 * Class Patreon1APITest
 *
 * @created      04.03.2019
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

	protected string $FQN = Patreon1::class;
	protected string $ENV = 'PATREON1';

	public function testGetCurrentUser():void{
		$r = $this->provider->currentUser();
		$this::assertSame($this->testuser, $this->responseJson($r)->data->attributes->email);
	}

}
