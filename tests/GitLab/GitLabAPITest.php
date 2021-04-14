<?php
/**
 * Class GitLabAPITest
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GitLab;

use chillerlan\OAuth\Providers\GitLab\GitLab;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\GitLab\GitLab $provider
 */
class GitLabAPITest extends OAuth2APITestAbstract{

	protected string $FQN = GitLab::class;
	protected string $ENV = 'GITLAB';

	public function testMe():void{
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
