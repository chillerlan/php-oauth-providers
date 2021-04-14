<?php
/**
 * Class GitLabTest
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GitLab;

use chillerlan\OAuth\Providers\GitLab\GitLab;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\GitLab\GitLab $provider
 */
class GitLabTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = GitLab::class;

}
