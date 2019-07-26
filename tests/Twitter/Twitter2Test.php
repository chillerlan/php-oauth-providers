<?php
/**
 * Class Twitter2Test
 *
 * @filesource   Twitter2Test.php
 * @created      26.10.2017
 * @package      chillerlan\OAuthTest\Providers\Twitter
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitter;

use chillerlan\OAuth\Core\ProviderException;
use chillerlan\OAuth\Providers\Twitter\Twitter2;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Twitter\Twitter2 $provider
 */
class Twitter2Test extends OAuth2ProviderTestAbstract{

	protected $FQN = Twitter2::class;

	public function testGetAuthURL(){
		$this->markTestSkipped('N/A');
	}

	public function testGetAccessToken(){
		$this->markTestSkipped('N/A');
	}

	public function testRequestGetAuthURLNotSupportedException(){
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('Twitter2 only supports Client Credentials Grant');

		$this->provider->getAuthURL();
	}

	public function testRequestGetAccessTokenNotSupportedException(){
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('Twitter2 only supports Client Credentials Grant');

		$this->provider->getAccessToken('foo');
	}

}
