<?php
/**
 * Class LastFMTest
 *
 * @filesource   LastFMTest.php
 * @created      05.11.2017
 * @package      chillerlan\OAuthTest\Providers\LastFM
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\LastFM;

use chillerlan\HTTP\{Psr17, Psr7};
use chillerlan\HTTP\Psr7\Response;
use chillerlan\OAuth\Core\ProviderException;
use chillerlan\OAuth\Providers\LastFM\LastFM;
use chillerlan\OAuthTest\Providers\ProviderTestAbstract;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\{RequestInterface, ResponseInterface};

/**
 * @property \chillerlan\OAuth\Providers\LastFM\LastFM $provider
 */
class LastFMTest extends ProviderTestAbstract{

	protected $FQN = LastFM::class;

	protected $responses = [
		'/lastfm/auth' => [
			'session' => ['key' => 'session_key'],
		],
		'/lastfm/api/request' => [
			'data' => 'such data! much wow!',
		],
	];

	public function setUp():void{
		parent::setUp();

		$this->setProperty($this->provider, 'apiURL', '/lastfm/api/request');
	}

	protected function initHttp():ClientInterface{
		return new class($this->responses) implements ClientInterface{
			protected $responses;

			public function __construct(array $responses){
				$this->responses  = $responses;
			}

			public function sendRequest(RequestInterface $request):ResponseInterface{
				return (new Response)->withBody(Psr17\create_stream_from_input(json_encode($this->responses[$request->getUri()->getPath()])));
			}
		};
	}

	public function testGetAuthURL(){
		$url = $this->provider->getAuthURL(['foo' => 'bar']);

		$this->assertSame('https://www.last.fm/api/auth?api_key='.$this->options->key.'&foo=bar', (string)$url);
	}

	public function testGetSignature(){
		$signature = $this
			->getMethod('getSignature')
			->invokeArgs($this->provider, [['foo' => 'bar', 'format' => 'whatever', 'callback' => 'nope']]);

		$this->assertSame('cb143650fa678449f5492a2aa6fab216', $signature);
	}

	public function testParseTokenResponse(){
		$r = (new Response)->withBody(Psr17\create_stream(json_encode(['session' => ['key' => 'whatever']])));

		$token = $this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [$r]);

		$this->assertSame('whatever', $token->accessToken);
	}

	public function testParseTokenResponseNoData(){
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('unable to parse token response');

		$this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [new Response]);
	}

	public function testParseTokenResponseError(){
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('error retrieving access token:');

		$r = (new Response)->withBody(Psr17\create_stream(json_encode(['error' => 42, 'message' => 'whatever'])));
		$this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [$r]);
	}

	public function testParseTokenResponseNoToken(){
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('token missing');

		$r = (new Response)->withBody(Psr17\create_stream(json_encode(['session' => []])));
		$this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [$r]);
	}

	public function testRequestParams(){
		$params = $this
			->getMethod('requestParams')
			->invokeArgs($this->provider, ['whatever', ['foo' => 'bar'], []]);

		$this->assertSame('310be19b3ff6967ca8425666753019fb', $params['api_sig']);
		$this->assertSame($this->options->key, $params['api_key']);
		$this->assertSame('whatever', $params['method']);
		$this->assertSame('bar', $params['foo']);
	}

	public function testGetAccessToken(){
		$this->setProperty($this->provider, 'apiURL', '/lastfm/auth');

		$token = $this->provider->getAccessToken('session_token');

		$this->assertSame('session_key', $token->accessToken);
	}

	// coverage
	public function testRequest(){
		$r = $this->provider->request('');

		$this->assertSame('such data! much wow!', Psr7\get_json($r)->data);
	}

	// coverage
	public function testRequestPost(){
		$r = $this->provider->request('', [], 'POST', ['foo' => 'bar'], ['Content-Type' => 'whatever']);

		$this->assertSame('such data! much wow!', Psr7\get_json($r)->data);
	}

}