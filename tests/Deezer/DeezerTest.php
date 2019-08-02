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

use chillerlan\HTTP\{Psr17, Psr7\Response};
use chillerlan\OAuth\Core\{AccessToken, ProviderException};
use chillerlan\OAuth\Providers\Deezer\Deezer;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\{RequestInterface, ResponseInterface};
use ReflectionClass;

/**
 * @property \chillerlan\OAuth\Providers\Deezer\Deezer $provider
 */
class DeezerTest extends OAuth2ProviderTestAbstract{

	protected $FQN = Deezer::class;

	protected function initHttp():ClientInterface{
		return new class($this->responses, $this->logger) extends ProviderTestHttpClient{

			public function sendRequest(RequestInterface $request):ResponseInterface{
				$path = $request->getUri()->getPath();
				$body = $this->responses[$path];

				$body = $path === '/oauth2/api/request'
					? json_encode($body)
					: http_build_query($body);

				return $this->logRequest($request, (new Response)->withBody(Psr17\create_stream_from_input($body)));
			}

		};
	}

	public function testGetAuthURL(){
		$this->assertStringContainsString(
			'https://connect.deezer.com/oauth/auth.php?app_id='.$this->options->key
				.'&foo=bar&perms=basic_access%20email&redirect_uri=https%3A%2F%2Flocalhost%2Fcallback&state=',
			(string)$this->provider->getAuthURL(
				['foo' => 'bar', 'client_secret' => 'not-so-secret'],
				[Deezer::SCOPE_BASIC, Deezer::SCOPE_EMAIL]
			)
		);
	}

	public function testParseTokenResponse(){
		$token = $this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [(new Response)->withBody(Psr17\create_stream_from_input(http_build_query(['access_token' => 'whatever'])))]);

		$this->assertInstanceOf(AccessToken::class, $token);
		$this->assertSame('whatever', $token->accessToken);
	}

	public function testParseTokenResponseErrorException(){
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('error retrieving access token:');

		$this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [(new Response)->withBody(Psr17\create_stream_from_input(http_build_query(['error_reason' => 'whatever'])))]);
	}

}
