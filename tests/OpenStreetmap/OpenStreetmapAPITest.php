<?php
/**
 * Class OpenStreetmapAPITest
 *
 * @created      12.05.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\OpenStreetmap;

use chillerlan\OAuth\Providers\OpenStreetmap\OpenStreetmap;
use chillerlan\OAuthTest\Providers\OAuth1APITest;

/**
 * @property \chillerlan\OAuth\Providers\OpenStreetmap\OpenStreetmap $provider
 */
class OpenStreetmapAPITest extends OAuth1APITest{

	protected string $FQN = OpenStreetmap::class;
	protected string $ENV = 'OPENSTREETMAP';

	public function testIdentity():void{
		$r = $this->provider->userDetails();
		$this::assertSame($this->testuser, $this->responseXML($r)->user->attributes()->display_name->__toString());
	}

}
