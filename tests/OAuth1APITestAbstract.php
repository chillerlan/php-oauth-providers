<?php
/**
 * Class OAuth1APITestAbstract
 *
 * @created      02.08.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\OAuth\Core\OAuth1Interface;

/**
 * @property \chillerlan\OAuth\Core\OAuth1Interface $provider
 */
abstract class OAuth1APITestAbstract extends OAuthAPITestAbstract{

	public function testOAuth1Instance():void{
		$this::assertInstanceOf(OAuth1Interface::class, $this->provider);
	}

}
