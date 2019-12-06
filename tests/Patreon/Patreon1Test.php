<?php
/**
 * Class Patreon1Test
 *
 * @filesource   Patreon1Test.php
 * @created      09.08.2018
 * @package      chillerlan\OAuthTest\Providers\Patreon
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Patreon;

use chillerlan\OAuth\Providers\Patreon\Patreon1;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Patreon\Patreon1 $provider
 */
class Patreon1Test extends OAuth2ProviderTest{

	protected string $FQN = Patreon1::class;

}
