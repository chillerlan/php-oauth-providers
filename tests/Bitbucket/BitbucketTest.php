<?php
/**
 * Class BitbucketTest
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Bitbucket;

use chillerlan\OAuth\Providers\Bitbucket\Bitbucket;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Bitbucket\Bitbucket $provider
 */
class BitbucketTest extends OAuth2ProviderTest{

	protected string $FQN = Bitbucket::class;

}
