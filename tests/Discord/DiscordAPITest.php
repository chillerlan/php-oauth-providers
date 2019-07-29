<?php
/**
 * Class DiscordAPITest
 *
 * @filesource   DiscordAPITest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\Discord
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Discord;

use chillerlan\OAuth\Core\AccessToken;
use chillerlan\OAuth\Providers\Discord\Discord;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property  \chillerlan\OAuth\Providers\Discord\Discord $provider
 */
class DiscordAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Discord::class;
	protected $ENV = 'DISCORD';

	public function testRequestCredentialsToken(){

		$token = $this->provider->getClientCredentialsToken([Discord::SCOPE_CONNECTIONS, Discord::SCOPE_IDENTIFY]);

		$this->assertInstanceOf(AccessToken::class, $token);
		$this->assertIsString($token->accessToken);

		if($token->expires !== AccessToken::EOL_NEVER_EXPIRES){
			$this->assertGreaterThan(time(), $token->expires);
		}

		$this->logger->debug('APITestSupportsOAuth2ClientCredentials', $token->toArray());
	}

	public function testMe(){
		$r = $this->provider->me();

		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

}
