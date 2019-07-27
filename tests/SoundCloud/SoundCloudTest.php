<?php
/**
 * Class SoundCloudTest
 *
 * @filesource   SoundCloudTest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\SoundCloud
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\SoundCloud;

use chillerlan\OAuth\Providers\SoundCloud\SoundCloud;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\SoundCloud\SoundCloud $provider
 */
class SoundCloudTest extends OAuth2ProviderTestAbstract{

	protected $FQN = SoundCloud::class;

}