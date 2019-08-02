<?php
/**
 * Class MicrosoftGraphAPITest
 *
 * @filesource   MicrosoftGraphAPITest.php
 * @created      30.07.2019
 * @package      chillerlan\OAuthTest\Providers\Microsoft
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Microsoft;

use chillerlan\OAuth\Providers\Microsoft\MicrosoftGraph;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property \chillerlan\OAuth\Providers\Microsoft\MicrosoftGraph $provider
 */
class MicrosoftGraphAPITest extends OAuth2APITest{

	protected $FQN = MicrosoftGraph::class;
	protected $ENV = 'MICROSOFT_AAD';

	public function testMe(){
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->userPrincipalName);
	}

}
