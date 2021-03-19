<?php
/**
 * Class OpenStreetmapTest
 *
 * @created      12.05.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\OpenStreetmap;

use chillerlan\OAuth\Providers\OpenStreetmap\OpenStreetmap;
use chillerlan\OAuthTest\Providers\OAuth1ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\OpenStreetmap\OpenStreetmap $provider
 */
class OpenStreetmapTest extends OAuth1ProviderTest{

	protected string $FQN = OpenStreetmap::class;

}
