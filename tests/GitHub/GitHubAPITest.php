<?php
/**
 * Class GitHubAPITest
 *
 * @created      18.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GitHub;

use chillerlan\OAuth\Providers\GitHub\GitHub;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property  \chillerlan\OAuth\Providers\GitHub\GitHub $provider
 */
class GitHubAPITest extends OAuth2APITestAbstract{

	protected string $FQN = GitHub::class;
	protected string $ENV = 'GITHUB';

	public function testLogin():void{
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->login);
	}

}
