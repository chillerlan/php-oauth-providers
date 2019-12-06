<?php
/**
 * Class OpenCachingAPITest
 *
 * @filesource   OpenCachingAPITest.php
 * @created      04.03.2019
 * @package      chillerlan\OAuthTest\Providers\OpenCaching
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\OpenCaching;

use chillerlan\OAuth\Providers\OpenCaching\OpenCaching;
use chillerlan\OAuthTest\Providers\OAuth1APITest;

/**
 * @property \chillerlan\OAuth\Providers\OpenCaching\OpenCaching $provider
 */
class OpenCachingAPITest extends OAuth1APITest{

	protected string $FQN = OpenCaching::class;
	protected string $ENV = 'OKAPI';

	public function testUser():void{
		$r = $this->provider->usersUser(['fields' => 'username']);
		static::assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
