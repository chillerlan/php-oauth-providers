<?php
/**
 * Class MastodonAPITest
 *
 * @created      19.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Mastodon;

use chillerlan\OAuth\Providers\Mastodon\Mastodon;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * Spotify API usage tests/examples
 *
 * @link https://github.com/tootsuite/documentation/blob/master/Using-the-API/API.md
 *
 * @property \chillerlan\OAuth\Providers\Mastodon\Mastodon $provider
 */
class MastodonAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Mastodon::class;
	protected string $ENV = 'MASTODON';

	protected $testInstance;

	protected function setUp():void{
		parent::setUp();

		$this->testInstance = $this->dotEnv->get($this->ENV.'_TESTINSTANCE');

		$this->provider->setInstance($this->testInstance);
	}

	public function testVerify():void{
		$r = $this->provider->getCurrentUser();

		$this->assertSame($this->testuser, $this->responseJson($r)->acct);
	}

}
