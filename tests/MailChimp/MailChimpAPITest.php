<?php
/**
 * Class MailChimpAPITest
 *
 * @created      16.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\MailChimp;

use chillerlan\OAuth\Providers\MailChimp\MailChimp;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * MailChimp API usage tests/examples
 *
 * @link http://developer.mailchimp.com/documentation/mailchimp/reference/overview/
 *
 * @property \chillerlan\OAuth\Providers\MailChimp\MailChimp $provider
 */
class MailChimpAPITest extends OAuth2APITestAbstract{

	protected string $FQN = MailChimp::class;
	protected string $ENV = 'MAILCHIMP';

	public function testGetTokenMetadata():void{
		$token = $this->storage->getAccessToken($this->provider->serviceName);
		$token = $this->provider->getTokenMetadata($token);

		$this->assertSame($this->testuser, $token->extraParams['accountname']);
	}

	public function testApiRoot():void{
		$r = $this->provider->root();

		$this->assertSame($this->testuser, $this->responseJson($r)->account_name);
	}

}
