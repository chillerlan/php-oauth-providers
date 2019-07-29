<?php
/**
 * Class DeezerAPITest
 *
 * @filesource   DeezerAPITest.php
 * @created      10.08.2018
 * @package      chillerlan\OAuthTest\Providers
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\OAuth\Providers\Deezer\Deezer;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * Spotify API usage tests/examples
 *
 * @link https://developer.spotify.com/web-api/endpoint-reference/
 *
 * @property \chillerlan\OAuth\Providers\Deezer\Deezer $provider
 */
class DeezerAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Deezer::class;
	protected $ENV = 'DEEZER';

	public function testMe(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->name);
	}

}
