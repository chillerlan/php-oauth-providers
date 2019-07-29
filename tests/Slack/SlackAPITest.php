<?php
/**
 * Class SlackAPITest
 *
 * @filesource   SlackAPITest.php
 * @created      20.04.2018
 * @package      chillerlan\OAuthTest\Providers\Slack
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Slack;

use chillerlan\OAuth\Providers\Slack\Slack;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Slack\Slack $provider
 */
class SlackAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Slack::class;
	protected $ENV = 'SLACK';

	public function testUserIdentity(){
		$r = $this->provider->userIdentity();

		$this->assertSame($this->testuser, $this->responseJson($r)->user->email);
	}

}
