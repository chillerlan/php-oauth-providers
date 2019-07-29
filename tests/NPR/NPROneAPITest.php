<?php
/**
 * Class NPROneAPITest
 *
 * @filesource   NPROneAPITest.php
 * @created      28.07.2019
 * @package      chillerlan\OAuthTest\Providers\NPR
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\NPR;

use chillerlan\OAuth\Providers\NPR\NPROne;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\NPR\NPROne $provider
 */
class NPROneAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = NPROne::class;
	protected $ENV = 'NPRONE';

	public function testIdentityUser(){
		$r = $this->provider->identityUser();

		$this->assertSame($this->testuser, $this->responseJson($r)->attributes->email);
	}

}
