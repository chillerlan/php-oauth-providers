<?php
/**
 * Class GuildWars2APITest
 *
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\GuildWars2;

use chillerlan\OAuth\Core\AccessToken;
use chillerlan\OAuth\Providers\GuildWars2\GuildWars2;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\GuildWars2\GuildWars2 $provider
 */
class GuildWars2APITest extends OAuth2APITestAbstract{

	protected string $FQN = GuildWars2::class;
	protected string $ENV = '';

	protected AccessToken $token;
	protected string $tokenname;

	protected function setUp():void{
		parent::setUp();

		$tokenfile = $this->CFG.'/GuildWars2.token.json';

		$this->token = !file_exists($tokenfile)
			? $this->provider->storeGW2Token($this->dotEnv->GW2_TOKEN)
			: (new AccessToken)->fromJSON(file_get_contents($tokenfile));

		/** @noinspection PhpFieldAssignmentTypeMismatchInspection */
		$this->tokenname = $this->dotEnv->GW2_TOKEN_NAME;
	}

	public function testTokenInfo():void{
		$r = $this->provider->tokeninfo(['access_token' => $this->token->accessToken]);
		$this->assertSame($this->tokenname, $this->responseJson($r)->name);
	}

}
