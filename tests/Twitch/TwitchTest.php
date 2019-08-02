<?php
/**
 * Class TwitchTest
 *
 * @filesource   TwitchTest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\Twitch
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitch;

use chillerlan\OAuth\Providers\Twitch\Twitch;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Twitch\Twitch $provider
 */
class TwitchTest extends OAuth2ProviderTest{

	protected $FQN = Twitch::class;

}
