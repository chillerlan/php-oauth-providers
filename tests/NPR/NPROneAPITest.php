<?php
/**
 * Class NPROneAPITest
 *
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\NPR;

use chillerlan\OAuth\Providers\NPR\NPROne;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\NPR\NPROne $provider
 */
class NPROneAPITest extends OAuth2APITestAbstract{

	protected string $FQN = NPROne::class;
	protected string $ENV = 'NPRONE';

	public function testIdentityUser():void{
		$r = $this->provider->identityUser();

		$this->assertSame($this->testuser, $this->responseJson($r)->attributes->email);
	}

}
