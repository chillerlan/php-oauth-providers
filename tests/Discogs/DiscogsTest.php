<?php
/**
 * Class DiscogsTest
 *
 * @created      05.11.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Discogs;

use chillerlan\OAuth\Providers\Discogs\Discogs;
use chillerlan\OAuthTest\Providers\OAuth1ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Discogs\Discogs $provider
 */
class DiscogsTest extends OAuth1ProviderTest{

	protected string $FQN = Discogs::class;

}
