<?php
/**
 * Class TwitterTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitter;

use chillerlan\OAuth\Providers\Twitter\Twitter;
use chillerlan\OAuthTest\Providers\OAuth1ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Twitter\Twitter $provider
 */
class TwitterTest extends OAuth1ProviderTestAbstract{

	protected string $FQN = Twitter::class;

}
