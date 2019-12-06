<?php
/**
 * Class MusicBrainzAPITestAbstract
 *
 * @filesource   MusicBrainzAPITestAbstract.php
 * @created      04.08.2018
 * @package      chillerlan\OAuthTest\Providers\MusicBrainz
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\MusicBrainz;

use chillerlan\OAuth\Providers\MusicBrainz\MusicBrainz;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * @property \chillerlan\OAuth\Providers\MusicBrainz\MusicBrainz $provider
 */
abstract class MusicBrainzAPITestAbstract extends OAuth2APITest{

	protected string $FQN         = MusicBrainz::class;
	protected string $ENV         = 'MUSICBRAINZ';
	protected float $requestDelay = 1.25;

}
