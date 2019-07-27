<?php
/**
 * Class Patreon2APITest
 *
 * @filesource   Patreon2APITest.php
 * @created      04.03.2019
 * @package      chillerlan\OAuthTest\Providers\Patreon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Patreon;

use chillerlan\OAuth\Providers\Patreon\Patreon2;

/**
 * @property \chillerlan\OAuth\Providers\Patreon\Patreon2 $provider
 */
class Patreon2APITest extends PatreonAPITestAbstract{

	protected $FQN = Patreon2::class;
	protected $ENV = 'PATREON2';

	public function testGetCurrentUser(){
		$r = $this->provider->identity(['fields[user]' => 'email']);
		$this->assertSame($this->testuser_email, $this->responseJson($r)->data->attributes->email);
	}

}
