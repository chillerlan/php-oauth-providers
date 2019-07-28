<?php
/**
 * Class NPROneTest
 *
 * @filesource   NPROneTest.php
 * @created      28.07.2019
 * @package      chillerlan\OAuthTest\Providers\NPR
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\NPR;

use chillerlan\OAuth\Providers\NPR\NPROne;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\NPR\NPROne $provider
 */
class NPROneTest extends OAuth2ProviderTestAbstract{

	protected $FQN = NPROne::class;

}
