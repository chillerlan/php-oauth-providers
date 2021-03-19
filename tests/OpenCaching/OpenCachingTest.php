<?php
/**
 * Class OpenCachingTest
 *
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\OpenCaching;

use chillerlan\OAuth\Providers\OpenCaching\OpenCaching;
use chillerlan\OAuthTest\Providers\OAuth1ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\OpenCaching\OpenCaching $provider
 */
class OpenCachingTest extends OAuth1ProviderTest{

	protected string $FQN = OpenCaching::class;

}
