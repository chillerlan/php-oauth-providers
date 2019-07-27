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
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property  \chillerlan\OAuth\Providers\GitHub\GitHub $provider
 */
class GitHubAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = GitHub::class;
	protected $ENV = 'GITHUB';

	protected $testuser;

	protected function setUp():void{
		parent::setUp();

		$this->testuser = $this->dotEnv->GITHUB_TESTUSER;
	}

	public function testLogin(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->login);
	}

}
