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
use chillerlan\OAuthTest\Providers\OAuth1ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Discogs\Discogs $provider
 */
class DiscogsTest extends OAuth1ProviderTestAbstract{

	protected string $FQN = Discogs::class;

}
