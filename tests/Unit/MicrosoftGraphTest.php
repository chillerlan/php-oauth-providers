<?php
/**
 * Class MicrosoftGraphTest
 *
 * @created      30.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Unit;

use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\MicrosoftGraph $provider
 */
class MicrosoftGraphTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = \chillerlan\OAuth\Providers\MicrosoftGraph::class;

}
