<?php
/**
 * Class OpenCachingTest
 *
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Unit;

use chillerlan\OAuthTest\Providers\OAuth1ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\OpenCaching $provider
 */
class OpenCachingTest extends OAuth1ProviderTestAbstract{

	protected string $FQN = \chillerlan\OAuth\Providers\OpenCaching::class;

}
