<?php
/**
 * Class BigCartelTest
 *
 * @filesource   BigCartelTest.php
 * @created      10.04.2018
 * @package      chillerlan\OAuthTest\Providers\BigCartel
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\BigCartel;

use chillerlan\OAuth\Providers\BigCartel\BigCartel;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\BigCartel\BigCartel $provider
 */
class BigCartelTest extends OAuth2ProviderTest{

	protected string $FQN = BigCartel::class;

}
