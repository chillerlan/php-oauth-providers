<?php
/**
 * Class NPROneTest
 *
 * @filesource   NPROneTest.php
 * @created      28.07.2019
 * @package      chillerlan\OAuthTest\Providers\NPR
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\NPR;

use chillerlan\OAuth\Core\AccessToken;
use chillerlan\OAuth\OAuthException;
use chillerlan\OAuth\Providers\NPR\NPROne;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\NPR\NPROne $provider
 */
class NPROneTest extends OAuth2ProviderTest{

	protected $FQN = NPROne::class;

	public function testRequestInvalidAuthTypeException(){
		$this->expectException(OAuthException::class);
		$this->expectExceptionMessage('invalid auth type');

		$this->setProperty($this->provider, 'authMethod', 'foo');
		$token = new AccessToken(['accessToken' => 'test_access_token_secret', 'expires' => 1]);
		$this->storage->storeAccessToken($this->provider->serviceName, $token);

		$this->provider->request('https://foo.api.npr.org/');
	}

}
