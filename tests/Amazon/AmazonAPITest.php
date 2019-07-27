<?php
/**
 * Class AmazonAPITest
 *
 * @filesource   AmazonAPITest.php
 * @created      10.08.2018
 * @package      chillerlan\OAuthTest\Providers\Amazon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Amazon;

use chillerlan\OAuth\Providers\Amazon\Amazon;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * Amazon API usage tests/examples
  *
 * @property \chillerlan\OAuth\Providers\Amazon\Amazon $provider
 */
class AmazonAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Amazon::class;
	protected $ENV = 'AMAZON';

	public function testGetUserProfile(){
		$r = $this->provider->userProfile();

		$this->assertRegExp('/[a-z\d\.]/i', $this->responseJson($r)->user_id);
	}

}
