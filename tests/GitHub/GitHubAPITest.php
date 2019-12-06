<?php
/**
 * Class GitHubAPITest
 *
 * @filesource   GitHubAPITest.php
 * @created      18.07.2017
 * @package      chillerlan\OAuthTest\Providers\GitHub
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GitHub;

use chillerlan\OAuth\Providers\GitHub\GitHub;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property  \chillerlan\OAuth\Providers\GitHub\GitHub $provider
 */
class GitHubAPITest extends OAuth2APITest{

	protected string $FQN = GitHub::class;
	protected string $ENV = 'GITHUB';

	public function testLogin():void{
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->login);
	}

}
