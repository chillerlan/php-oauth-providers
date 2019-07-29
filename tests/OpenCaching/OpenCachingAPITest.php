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
use chillerlan\OAuthTest\API\OAuth1APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\OpenCaching\OpenCaching $provider
 */
class OpenCachingAPITest extends OAuth1APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = OpenCaching::class;
	protected $ENV = 'OKAPI';

	public function testUser(){
		$r = $this->provider->usersUser(['fields' => 'username']);
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
