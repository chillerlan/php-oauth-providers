<?php
/**
 * Class OAuthProviderTest
 *
 * @filesource   OAuthProviderTest.php
 * @created      02.08.2019
 * @package      chillerlan\OAuthTest\Providers
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

/**
 * @property \chillerlan\OAuth\Core\OAuth1Interface $provider
 */
abstract class OAuthProviderTest extends OAuthProviderTestAbstract{

	protected string $CFG = __DIR__.'/../config';

}
