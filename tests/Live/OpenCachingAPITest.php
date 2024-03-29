<?php
/**
 * Class OpenCachingAPITest
 *
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Live;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\OpenCaching;
use chillerlan\OAuthTest\Providers\OAuth1APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\OpenCaching $provider
 */
class OpenCachingAPITest extends OAuth1APITestAbstract{

	protected string $FQN = OpenCaching::class;
	protected string $ENV = 'OKAPI';

	public function testMe():void{
		$this::assertSame($this->testuser, MessageUtil::decodeJSON($this->provider->me())->username);
	}

}
