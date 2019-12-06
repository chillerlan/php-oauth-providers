<?php
/**
 * Class OAuth2APITest
 *
 * @filesource   OAuth2APITest.php
 * @created      02.08.2019
 * @package      chillerlan\OAuthTest\Providers
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Core\OAuth2Interface $provider
 */
abstract class OAuth2APITest extends OAuth2APITestAbstract{

	protected string $CFG = __DIR__.'/../config';

}
