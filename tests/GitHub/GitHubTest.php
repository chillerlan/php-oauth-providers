<?php
/**
 * Class GitHubTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GitHub;

use chillerlan\OAuth\Providers\GitHub\GitHub;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\GitHub\GitHub $provider
 */
class GitHubTest extends OAuth2ProviderTest{

	protected string $FQN = GitHub::class;

}
