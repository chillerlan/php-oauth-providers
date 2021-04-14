<?php
/**
 * Class Patreon2APITest
 *
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Patreon;

use chillerlan\OAuth\Providers\Patreon\Patreon2;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Patreon\Patreon2 $provider
 */
class Patreon2APITest extends OAuth2APITestAbstract{

	protected string $FQN = Patreon2::class;
	protected string $ENV = 'PATREON2';

	public function testGetCurrentUser():void{
		$r = $this->provider->identity(['fields[user]' => 'email']);
		$this::assertSame($this->testuser, $this->responseJson($r)->data->attributes->email);
	}

}
