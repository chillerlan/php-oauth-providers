<?php
/**
 * Class DeviantArtTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\DeviantArt;

use chillerlan\OAuth\Providers\DeviantArt\DeviantArt;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\DeviantArt\DeviantArt $provider
 */
class DeviantArtTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = DeviantArt::class;

}
