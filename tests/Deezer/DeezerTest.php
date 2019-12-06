<?php
/**
 * Class DeezerTest
 *
 * @filesource   DeezerTest.php
 * @created      09.08.2018
 * @package      chillerlan\OAuthTest\Providers
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\HTTP\Psr7\Response;
use chillerlan\OAuth\Core\{AccessToken, ProviderException};
use chillerlan\OAuth\Providers\Deezer\Deezer;

use function chillerlan\HTTP\Psr17\create_stream_from_input;

/**
 * @property \chillerlan\OAuth\Providers\Deezer\Deezer $provider
 */
class DeezerTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = Deezer::class;

	protected function getTestResponses():array{
		return [
			'/oauth2/access_token' => 'access_token=test_access_token&expires_in=3600&state=test_state',
			'/oauth2/api/request'  => '{"data":"such data! much wow!"}',
		];
	}

	public function testGetAuthURL():void{
		$this->assertStringContainsString(
			'https://connect.deezer.com/oauth/auth.php?app_id='.$this->options->key
				.'&foo=bar&perms=basic_access%20email&redirect_uri=https%3A%2F%2Flocalhost%2Fcallback&state=',
			(string)$this->provider->getAuthURL(
				['foo' => 'bar', 'client_secret' => 'not-so-secret'],
				[Deezer::SCOPE_BASIC, Deezer::SCOPE_EMAIL]
			)
		);
	}

	public function testParseTokenResponse():void{
		$token = $this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [(new Response)->withBody(create_stream_from_input('access_token=whatever'))]);

		$this->assertInstanceOf(AccessToken::class, $token);
		$this->assertSame('whatever', $token->accessToken);
	}

	public function testParseTokenResponseErrorException():void{
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('error retrieving access token:');

		$this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [(new Response)->withBody(create_stream_from_input('error_reason=whatever'))]);
	}

}
