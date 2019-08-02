<?php
/**
 * Class GitterAPITest
 *
 * @filesource   GitterAPITest.php
 * @created      09.08.2018
 * @package      chillerlan\OAuthTest\Providers\Gitter
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

	protected $FQN = Gitter::class;
	protected $ENV = 'GITTER';

	public function testMe(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
