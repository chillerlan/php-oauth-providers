<?php
/**
 * Class MusicBrainzTest
 *
 * @filesource   MusicBrainzTest.php
 * @created      31.07.2018
 * @package      chillerlan\OAuthTest\Providers\MusicBrainz
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

	protected $FQN = MusicBrainz::class;

}
