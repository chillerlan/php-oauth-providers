<?php
/**
 * Class MicrosoftGraphAPITest
 *
 * @created      30.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Live;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\MicrosoftGraph;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\MicrosoftGraph $provider
 */
class MicrosoftGraphAPITest extends OAuth2APITestAbstract{

	protected string $FQN = MicrosoftGraph::class;
	protected string $ENV = 'MICROSOFT_AAD';

	public function testMe():void{
		$this::assertSame($this->testuser, MessageUtil::decodeJSON($this->provider->me())->userPrincipalName);
	}

}
