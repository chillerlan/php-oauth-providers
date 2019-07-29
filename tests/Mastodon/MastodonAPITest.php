<?php
/**
 * Class MastodonAPITest
 *
 * @filesource   MastodonAPITest.php
 * @created      19.08.2018
 * @package      chillerlan\OAuthTest\Providers\Mastodon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Mastodon;

use chillerlan\OAuth\Providers\Mastodon\Mastodon;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * Spotify API usage tests/examples
 *
 * @link https://github.com/tootsuite/documentation/blob/master/Using-the-API/API.md
 *
 * @property \chillerlan\OAuth\Providers\Mastodon\Mastodon $provider
 */
class MastodonAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Mastodon::class;
	protected $ENV = 'MASTODON';

	protected $testInstance;

	protected function setUp():void{
		parent::setUp();

		$this->testInstance = $this->dotEnv->get($this->ENV.'_TESTINSTANCE');

		$this->provider->setInstance($this->testInstance);
	}

	public function testVerify(){
		$r = $this->provider->getCurrentUser();

		$this->assertSame($this->testuser, $this->responseJson($r)->acct);
	}

}
