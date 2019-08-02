<?php
/**
 * Class OAuth2ProviderTest
 *
 * @filesource   OAuth2ProviderTest.php
 * @created      02.08.2019
 * @package      chillerlan\OAuthTest\Providers
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

/**
 * @property \chillerlan\OAuth\Core\OAuth2Interface $provider
 */
abstract class OAuth2ProviderTest extends OAuth2ProviderTestAbstract{

	protected $CFG = __DIR__.'/../config';

}
