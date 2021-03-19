<?php
/**
 * Class SlackTest
 *
 * @created      01.01.2018
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

	protected string $FQN = Slack::class;

}
