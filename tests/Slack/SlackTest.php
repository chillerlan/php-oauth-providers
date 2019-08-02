<?php
/**
 * Class SlackTest
 *
 * @filesource   SlackTest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\Slack
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Slack;

use chillerlan\OAuth\Providers\Slack\Slack;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Slack\Slack $provider
 */
class SlackTest extends OAuth2ProviderTest{

	protected $FQN = Slack::class;

}
