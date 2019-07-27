<?php
/**
 * Class GoogleTest
 *
 * @filesource   GoogleTest.php
 * @created      09.08.2018
 * @package      chillerlan\OAuthTest\Providers\Google
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Google;

use chillerlan\OAuth\Providers\Google\Google;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Google\Google $provider
 */
class GoogleTest extends OAuth2ProviderTestAbstract{

	protected $FQN = Google::class;

}