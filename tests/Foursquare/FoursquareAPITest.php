<?php
/**
 * Class FoursquareAPITest
 *
 * @created      10.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Foursquare;

use chillerlan\OAuth\Providers\Foursquare\Foursquare;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * Foursquare API usage tests/examples
 *
 * @link https://developer.foursquare.com/docs
 *
 * @property \chillerlan\OAuth\Providers\Foursquare\Foursquare $provider
 */
class FoursquareAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Foursquare::class;
	protected string $ENV = 'FOURSQUARE';

	public function testMe():void{
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->response->user->id);
	}

}
