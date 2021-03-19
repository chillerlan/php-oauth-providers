<?php
/**
 * Class MusicBrainzTest
 *
 * @created      31.07.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\MusicBrainz;

use chillerlan\OAuth\Providers\MusicBrainz\MusicBrainz;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\MusicBrainz\MusicBrainz $provider
 */
class MusicBrainzTest extends OAuth2ProviderTest{

	protected string $FQN = MusicBrainz::class;

}
