<?php
/**
 * Class DeezerAPITest
 *
 * @created      10.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Live;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\Deezer;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * Spotify API usage tests/examples
 *
 * @link https://developer.spotify.com/web-api/endpoint-reference/
 *
 * @property \chillerlan\OAuth\Providers\Deezer $provider
 */
class DeezerAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Deezer::class;
	protected string $ENV = 'DEEZER';

	public function testMe():void{
		$this::assertSame($this->testuser, MessageUtil::decodeJSON($this->provider->me())->name);
	}

}
