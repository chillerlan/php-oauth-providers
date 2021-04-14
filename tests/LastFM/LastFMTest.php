<?php
/**
 * Class LastFMTest
 *
 * @created      05.11.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\LastFM;

use chillerlan\OAuth\Core\ProviderException;
use chillerlan\OAuth\Providers\LastFM\LastFM;
use chillerlan\OAuthTest\Providers\OAuthProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\LastFM\LastFM $provider
 */
class LastFMTest extends OAuthProviderTestAbstract{

	protected string $FQN = LastFM::class;

	protected array $testResponses = [
		'/lastfm/auth'        => '{"session":{"key":"session_key"}}',
		'/lastfm/api/request' => '{"data":"such data! much wow!"}',
	];

	public function setUp():void{
		parent::setUp();

		$this->setProperty($this->provider, 'apiURL', '/lastfm/api/request');
	}

	public function testGetAuthURL():void{
		$url = $this->provider->getAuthURL(['foo' => 'bar']);

		$this::assertSame('https://www.last.fm/api/auth?api_key='.$this->options->key.'&foo=bar', (string)$url);
	}

	public function testGetSignature():void{
		$signature = $this
			->getMethod('getSignature')
			->invokeArgs($this->provider, [['foo' => 'bar', 'format' => 'whatever', 'callback' => 'nope']]);

		$this::assertSame('cb143650fa678449f5492a2aa6fab216', $signature);
	}

	public function testParseTokenResponse():void{
		$r = $this->responseFactory
			->createResponse()
			->withBody($this->streamFactory->createStream('{"session":{"key":"whatever"}}'))
		;

		$token = $this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [$r]);

		$this::assertSame('whatever', $token->accessToken);
	}

	public function testParseTokenResponseNoData():void{
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('unable to parse token response');

		$this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [$this->responseFactory->createResponse()]);
	}

	public function testParseTokenResponseError():void{
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('error retrieving access token:');

		$r = $this->responseFactory
			->createResponse()
			->withBody($this->streamFactory->createStream('{"error":42,"message":"whatever"}'))
		;

		$this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [$r]);
	}

	public function testParseTokenResponseNoToken():void{
		$this->expectException(ProviderException::class);
		$this->expectExceptionMessage('token missing');

		$r = $this->responseFactory->createResponse()->withBody($this->streamFactory->createStream('{"session":[]}'));

		$this
			->getMethod('parseTokenResponse')
			->invokeArgs($this->provider, [$r]);
	}

	public function testGetAccessToken():void{
		$this->setProperty($this->provider, 'apiURL', '/lastfm/auth');

		$token = $this->provider->getAccessToken('session_token');

		$this::assertSame('session_key', $token->accessToken);
	}

	// coverage
	public function testRequest():void{
		$r = $this->provider->request('');

		$this::assertSame('such data! much wow!', $this->responseJson($r)->data);
	}

	// coverage
	public function testRequestPost():void{
		$r = $this->provider->request('', [], 'POST', ['foo' => 'bar'], ['Content-Type' => 'whatever']);

		$this::assertSame('such data! much wow!', $this->responseJson($r)->data);
	}

}
