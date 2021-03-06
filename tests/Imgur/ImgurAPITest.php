<?php
/**
 * Class ImgurAPITest
 *
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Imgur;

use chillerlan\OAuth\Providers\Imgur\Imgur;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Imgur\Imgur $provider
 */
class ImgurAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Imgur::class;
	protected string $ENV = 'IMGUR';

	protected function setUp():void{
		parent::setUp();

		$token = $this->storage->getAccessToken($this->provider->serviceName);

		$this->testuser = $token->extraParams['account_id'];
	}

	public function testMe():void{
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->data->id);
	}

}
