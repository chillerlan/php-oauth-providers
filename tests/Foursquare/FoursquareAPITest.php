<?php
/**
 * Class FoursquareAPITest
 *
 * @filesource   FoursquareAPITest.php
 * @created      10.08.2018
 * @package      chillerlan\OAuthTest\Providers\Foursquare
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Foursquare;

use chillerlan\OAuth\Providers\Foursquare\Foursquare;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * Foursquare API usage tests/examples
 *
 * @link https://developer.foursquare.com/docs
 *
 * @property \chillerlan\OAuth\Providers\Foursquare\Foursquare $provider
 */
class FoursquareAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Foursquare::class;
	protected $ENV = 'FOURSQUARE';

	protected $testuser_id;

	protected function setUp():void{
		parent::setUp();

		$this->testuser_id = $this->dotEnv->FOURSQUARE_TESTUSER_ID;
	}

	public function testMe(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser_id, $this->responseJson($r)->response->user->id);
	}

}
