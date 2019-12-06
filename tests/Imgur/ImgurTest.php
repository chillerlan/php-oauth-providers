<?php
/**
 * Class ImgurTest
 *
 * @filesource   ImgurTest.php
 * @created      28.07.2019
 * @package      chillerlan\OAuthTest\Providers\Imgur
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Imgur;

use chillerlan\OAuth\Providers\Imgur\Imgur;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Imgur\Imgur $provider
 */
class ImgurTest extends OAuth2ProviderTest{

	protected string $FQN = Imgur::class;

}
