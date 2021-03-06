<?php
/**
 * Class TwitchTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitch;

use chillerlan\OAuth\Providers\Twitch\Twitch;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Twitch\Twitch $provider
 */
class TwitchTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = Twitch::class;

	public function testRequestInvalidAuthTypeException():void{
		$this::markTestSkipped('N/A');
	}

}
