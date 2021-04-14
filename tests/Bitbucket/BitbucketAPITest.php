<?php
/**
 * Class BitbucketAPITest
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Bitbucket;

use chillerlan\OAuth\Providers\Bitbucket\Bitbucket;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Bitbucket\Bitbucket $provider
 */
class BitbucketAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Bitbucket::class;
	protected string $ENV = 'BITBUCKET';

	public function testMe():void{
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}
}
