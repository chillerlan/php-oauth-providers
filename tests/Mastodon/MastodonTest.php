<?php
/**
 * Class MastodonTest
 *
 * @filesource   MastodonTest.php
 * @created      19.08.2018
 * @package      chillerlan\OAuthTest\Providers\Mastodon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Mastodon;

use chillerlan\OAuth\OAuthException;
use chillerlan\OAuth\Providers\Mastodon\Mastodon;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Mastodon\Mastodon $provider
 */
class MastodonTest extends OAuth2ProviderTestAbstract{

	protected $FQN = Mastodon::class;

	public function testGetAuthURL(){
		$this->provider->setInstance('https://localhost');

		parent::testGetAuthURL();
	}

	public function testSetInvalidInstance(){
		$this->expectException(OAuthException::class);
		$this->expectExceptionMessage('invalid instance URL');

		$this->provider->setInstance('whatever');
	}

}
