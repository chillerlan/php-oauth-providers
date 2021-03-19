<?php
/**
 * Class OAuth1APITest
 *
 * @created      02.08.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\OAuthTest\API\OAuth1APITestAbstract;

/**
 * @property \chillerlan\OAuth\Core\OAuth1Interface $provider
 */
abstract class OAuth1APITest extends OAuth1APITestAbstract{

	protected string $CFG = __DIR__.'/../config';

}
