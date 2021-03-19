<?php
/**
 * Class DiscordTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Discord;

use chillerlan\OAuth\Providers\Discord\Discord;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Discord\Discord $provider
 */
class DiscordTest extends OAuth2ProviderTest{

	protected string $FQN = Discord::class;

}
