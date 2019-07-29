<?php
/**
 * Class BitbucketTest
 *
 * @filesource   BitbucketTest.php
 * @created      29.07.2019
 * @package      chillerlan\OAuthTest\Providers\Bitbucket
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Bitbucket;

use chillerlan\OAuth\Providers\Bitbucket\Bitbucket;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Bitbucket\Bitbucket $provider
 */
class BitbucketTest extends OAuth2ProviderTestAbstract{

	protected $FQN = Bitbucket::class;

}
