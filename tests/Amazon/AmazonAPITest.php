<?php
/**
 * Class AmazonAPITest
 *
 * @created      10.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Amazon;

use chillerlan\OAuth\Providers\Amazon\Amazon;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * Amazon API usage tests/examples
  *
 * @property \chillerlan\OAuth\Providers\Amazon\Amazon $provider
 */
class AmazonAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Amazon::class;
	protected string $ENV = 'AMAZON';

	public function testGetUserProfile():void{
		$r = $this->provider->userProfile();

		$this->assertRegExp('/[a-z\d\.]/i', $this->responseJson($r)->user_id);
	}

}
