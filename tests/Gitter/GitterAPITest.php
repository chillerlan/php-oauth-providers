<?php
/**
 * Class GitterAPITest
 *
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Gitter;

use chillerlan\OAuth\Providers\Gitter\Gitter;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * Gitter API usage tests/examples
 *
 * @link https://developer.gitter.im/docs/rest-api
 *
 * @property \chillerlan\OAuth\Providers\Gitter\Gitter $provider
 */
class GitterAPITest extends OAuth2APITest{

	protected string $FQN = Gitter::class;
	protected string $ENV = 'GITTER';

	public function testMe():void{
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
