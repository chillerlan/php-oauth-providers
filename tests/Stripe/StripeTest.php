<?php
/**
 * Class StripeTest
 *
 * @filesource   StripeTest.php
 * @created      09.08.2018
 * @package      chillerlan\OAuthTest\Providers\Stripe
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Stripe;

use chillerlan\OAuth\Providers\Stripe\Stripe;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Stripe\Stripe $provider
 */
class StripeTest extends OAuth2ProviderTest{

	protected string $FQN = Stripe::class;

}
