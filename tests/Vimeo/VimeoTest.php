<?php
/**
 * Class VimeoTest
 *
 * @filesource   VimeoTest.php
 * @created      09.04.2018
 * @package      chillerlan\OAuthTest\Providers\Vimeo
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

	protected $FQN = Vimeo::class;

}
