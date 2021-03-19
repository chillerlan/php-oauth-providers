<?php
/**
 * Class WordpressTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Wordpress;

use chillerlan\OAuth\Providers\Wordpress\Wordpress;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Wordpress\Wordpress $provider
 */
class WordpressTest extends OAuth2ProviderTest{

	protected string $FQN = Wordpress::class;

}
