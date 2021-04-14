<?php
/**
 * Class GoogleAPITest
 *
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Google;

use chillerlan\OAuth\Providers\Google\Google;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * Google API usage tests/examples
 *
 * @link https://developers.google.com/oauthplayground/
 *
 * @property \chillerlan\OAuth\Providers\Google\Google $provider
 */
class GoogleAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Google::class;
	protected string $ENV = 'GOOGLE';

	public function testGetUserInfo():void{
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->email);
	}

}
