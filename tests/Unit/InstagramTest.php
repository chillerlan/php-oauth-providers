<?php
/**
 * Class InstagramTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Unit;

use chillerlan\OAuth\Providers\Instagram;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Instagram $provider
 */
class InstagramTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = Instagram::class;

}
