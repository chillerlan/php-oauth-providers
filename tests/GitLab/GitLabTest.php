<?php
/**
 * Class GitLabTest
 *
 * @filesource   GitLabTest.php
 * @created      29.07.2019
 * @package      chillerlan\OAuthTest\Providers\GitLab
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GitLab;

use chillerlan\OAuth\Providers\GitLab\GitLab;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\GitLab\GitLab $provider
 */
class GitLabTest extends OAuth2ProviderTest{

	protected string $FQN = GitLab::class;

}
