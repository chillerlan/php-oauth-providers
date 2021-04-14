<?php
/**
 * Class SpotifyTest
 *
 * @created      06.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Spotify;

use chillerlan\OAuth\Providers\Spotify\Spotify;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Spotify\Spotify $provider
 */
class SpotifyTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = Spotify::class;

}
