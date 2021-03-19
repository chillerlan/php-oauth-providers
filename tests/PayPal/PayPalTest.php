<?php
/**
 * Class PayPalTest
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\PayPal;

use chillerlan\OAuth\Providers\PayPal\PayPal;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\PayPal\PayPal $provider
 */
class PayPalTest extends OAuth2ProviderTest{

	protected string $FQN = PayPal::class;

}
