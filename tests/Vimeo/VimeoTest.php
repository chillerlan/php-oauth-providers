<?php
/**
 * Class VimeoTest
 *
 * @created      09.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Vimeo;

use chillerlan\OAuth\Providers\Vimeo\Vimeo;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Vimeo\Vimeo $provider
 */
class VimeoTest extends OAuth2ProviderTest{

	protected string $FQN = Vimeo::class;

}
