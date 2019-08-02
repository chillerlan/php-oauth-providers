<?php
/**
 *
 * @filesource   GitterTest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\Gitter
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Gitter;

use chillerlan\OAuth\Providers\Gitter\Gitter;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Gitter\Gitter $provider
 */
class GitterTest extends OAuth2ProviderTest{

	protected $FQN = Gitter::class;

}
