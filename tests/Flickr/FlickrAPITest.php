<?php
/**
 * Class FlickrAPITest
 *
 * @filesource   FlickrAPITest.phpphp
 * @created      15.07.2017
 * @package      chillerlan\OAuthTest\Providers\Flickr
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Flickr;

use chillerlan\OAuth\Providers\Flickr\Flickr;
use chillerlan\OAuthTest\Providers\OAuth1APITest;

/**
 * @property  \chillerlan\OAuth\Providers\Flickr\Flickr $provider
 */
class FlickrAPITest extends OAuth1APITest{

	protected $FQN = Flickr::class;
	protected $ENV = 'FLICKR';

	protected $test_name;
	protected $test_id;

	protected function setUp():void{
		parent::setUp();

		$tokenParams = $this->storage->getAccessToken($this->provider->serviceName)->extraParams;

		$this->test_name = $tokenParams['username'];
		$this->test_id   = $tokenParams['user_nsid'];
	}

	public function testLogin(){
		$r = $this->provider->testLogin();
		$j = $this->responseJson($r);

		$this->assertSame($this->test_name, $j->user->username->_content);
		$this->assertSame($this->test_id, $j->user->id);
	}

}
