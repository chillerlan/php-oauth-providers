<?php
/**
 * Class MixcloudTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Mixcloud;

use chillerlan\OAuth\Providers\Mixcloud\Mixcloud;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Mixcloud\Mixcloud $provider
 */
class MixcloudTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = Mixcloud::class;

}
