<?php
/**
 * Class MixcloudTest
 *
 * @filesource   MixcloudTest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\Mixcloud
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Mixcloud;

use chillerlan\OAuth\Providers\Mixcloud\Mixcloud;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Mixcloud\Mixcloud $provider
 */
class MixcloudTest extends OAuth2ProviderTest{

	protected string $FQN = Mixcloud::class;

}
