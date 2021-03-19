<?php
/**
 * Class Patreon1Test
 *
 * @created      09.08.2018
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
