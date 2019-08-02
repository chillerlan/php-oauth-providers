<?php
/**
 * Class MailChimpTest
 *
 * @filesource   MailChimpTest.php
 * @created      16.08.2018
 * @package      chillerlan\OAuthTest\Providers\MailChimp
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\MailChimp;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Core\AccessToken;
use chillerlan\OAuth\OAuthException;
use chillerlan\OAuth\Providers\MailChimp\MailChimp;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\MailChimp\MailChimp $provider
 */
class MailChimpTest extends OAuth2ProviderTest{

	protected $FQN = MailChimp::class;

	protected $token;

	public function setUp():void{

		$this->responses['/3.0'] = [
			'data' => 'such data! much wow! (/3.0)'
		];

		$this->responses['/oauth2/metadata'] = [
			'metadata' => 'whatever'
		];

		// setup after adding responses -> ProviderTestAbstract::initHTTP()
		parent::setUp();

		$this->token = new AccessToken(['accessToken' => 'test_access_token_secret', 'expires' => 1, 'extraParams' => ['dc' => 'bar']]);
	}

	public function testRequest(){
		$this->storage->storeAccessToken($this->provider->serviceName, $this->token);

		$this->assertSame('such data! much wow! (/3.0)', Psr7\get_json($this->provider->request(''))->data);
	}

	public function testRequestInvalidAuthTypeException(){
		$this->expectException(OAuthException::class);
		$this->expectExceptionMessage('invalid auth type');

		$this->setProperty($this->provider, 'authMethod', 'foo');
		$this->storage->storeAccessToken($this->provider->serviceName, $this->token);

		$this->provider->request('');
	}

	public function testGetTokenMetadata(){
		$token = $this->provider->getTokenMetadata($this->token);

		$this->assertSame('whatever', $token->extraParams['metadata']);
	}

}
