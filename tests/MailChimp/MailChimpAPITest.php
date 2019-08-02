<?php
/**
 * Class MailChimpAPITest
 *
 * @filesource   MailChimpAPITest.php
 * @created      16.08.2018
 * @package      chillerlan\OAuthTest\Providers\MailChimp
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\MailChimp;

use chillerlan\OAuth\Providers\MailChimp\MailChimp;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * MailChimp API usage tests/examples
 *
 * @link http://developer.mailchimp.com/documentation/mailchimp/reference/overview/
 *
 * @property \chillerlan\OAuth\Providers\MailChimp\MailChimp $provider
 */
class MailChimpAPITest extends OAuth2APITest{

	protected $FQN = MailChimp::class;
	protected $ENV = 'MAILCHIMP';

	public function testGetTokenMetadata(){
		$token = $this->storage->getAccessToken($this->provider->serviceName);
		$token = $this->provider->getTokenMetadata($token);

		$this->assertSame($this->testuser, $token->extraParams['accountname']);
	}

	public function testApiRoot(){
		$r = $this->provider->root();

		$this->assertSame($this->testuser, $this->responseJson($r)->account_name);
	}

}
