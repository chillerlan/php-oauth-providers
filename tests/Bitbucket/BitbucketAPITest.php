<?php
/**
 * Class BitbucketAPITest
 *
 * @filesource   BitbucketAPITest.php
 * @created      29.07.2019
 * @package      chillerlan\OAuthTest\Providers\Bitbucket
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Bitbucket;

use chillerlan\OAuth\Providers\Bitbucket\Bitbucket;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 */
class BitbucketAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Bitbucket::class;
	protected $ENV = 'BITBUCKET';

	public function testMe(){
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}
}