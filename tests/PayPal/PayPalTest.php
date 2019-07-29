<?php
/**
 * Class PayPalTest
 *
 * @filesource   PayPalTest.php
 * @created      29.07.2019
 * @package      chillerlan\OAuthTest\Providers\PayPal
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\PayPal;

use chillerlan\OAuth\Providers\PayPal\PayPal;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\PayPal\PayPal $provider
 */
class PayPalTest extends OAuth2ProviderTestAbstract{

	protected $FQN = PayPal::class;

}
