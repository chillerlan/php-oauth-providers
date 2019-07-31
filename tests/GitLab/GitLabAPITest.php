<?php
/**
 * Class GitLabAPITest
 *
 * @filesource   GitLabAPITest.php
 * @created      29.07.2019
 * @package      chillerlan\OAuthTest\Providers\GitLab
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GitLab;

use chillerlan\OAuth\Providers\GitLab\GitLab;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\GitLab\GitLab $provider
 */
class GitLabAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = GitLab::class;
	protected $ENV = 'GITLAB';

	public function testMe(){
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}