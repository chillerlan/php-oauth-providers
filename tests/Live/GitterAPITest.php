<?php
/**
 * Class GitterAPITest
 *
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Live;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\Gitter;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * Gitter API usage tests/examples
 *
 * @link https://developer.gitter.im/docs/rest-api
 *
 * @property \chillerlan\OAuth\Providers\Gitter $provider
 */
class GitterAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Gitter::class;
	protected string $ENV = 'GITTER';

	public function testMe():void{
		$this::assertSame($this->testuser, MessageUtil::decodeJSON($this->provider->me())->username);
	}

}
