<?php
/**
 * Class DeviantArtTest
 *
 * @filesource   DeviantArtTest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\DeviantArt
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\DeviantArt;

use chillerlan\OAuth\Providers\DeviantArt\DeviantArt;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\DeviantArt\DeviantArt $provider
 */
class DeviantArtTest extends OAuth2ProviderTest{

	protected $FQN = DeviantArt::class;

}
