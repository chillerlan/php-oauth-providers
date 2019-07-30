<?php
/**
 * Class MicrosoftGraphTest
 *
 * @filesource   MicrosoftGraphTest.php
 * @created      30.07.2019
 * @package      chillerlan\OAuthTest\Providers\Microsoft
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Microsoft;

use chillerlan\OAuth\Providers\Microsoft\MicrosoftGraph;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Microsoft\MicrosoftGraph $provider
 */
class MicrosoftGraphTest extends OAuth2ProviderTestAbstract{

	protected $FQN = MicrosoftGraph::class;

}
