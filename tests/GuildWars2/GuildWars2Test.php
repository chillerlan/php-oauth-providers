<?php
/**
 * Class GuildWars2Test
 *
 * @filesource   GuildWars2Test.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\GuildWars2
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GuildWars2;

use chillerlan\OAuth\Core\ProviderException;
use chillerlan\OAuth\Providers\GuildWars2\GuildWars2;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\GuildWars2\GuildWars2 $provider
 */
class GuildWars2Test extends OAuth2ProviderTest{

	protected string $FQN = GuildWars2::class;

	protected function getTestResponses():array{
		return [
			'/gw2/auth/tokeninfo' => '{"id":"00000000-1111-2222-3333-444444444444","name":"GW2Token","permissions":["foo","bar"]}',
			'/oauth2/api/request' => '{"data":"such data! much wow!"}',
		];
	}

	public function testStoreGW2Token():void{
		$this->setProperty($this->provider, 'apiURL', 'https://localhost/gw2/auth');

		$id     = '00000000-1111-2222-3333-444444444444';
		$secret = '55555555-6666-7777-8888-999999999999';

		$token = $this->provider->storeGW2Token($id.$secret);

		$this->assertSame($id.$secret, $token->accessToken);
		$this->assertSame($secret, $token->accessTokenSecret);
	}

	public function testStoreGW2InvalidToken():void{
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('invalid token');

		$this->provider->storeGW2Token('foo');
	}

	public function testGetAuthURL():void{
		$this->markTestSkipped('N/A');
	}

	public function testGetAccessToken():void{
		$this->markTestSkipped('N/A');
	}

	public function testRequestGetAuthURLNotSupportedException():void{
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('GuildWars2 does not support authentication anymore.');

		$this->provider->getAuthURL();
	}

	public function testRequestGetAccessTokenNotSupportedException():void{
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('GuildWars2 does not support authentication anymore.');

		$this->provider->getAccessToken('foo');
	}

}
