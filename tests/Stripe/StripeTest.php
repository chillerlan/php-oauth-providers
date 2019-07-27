<?php
/**
 * Class StripeTest
 *
 * @filesource   StripeTest.php
 * @created      09.08.2018
 * @package      chillerlan\OAuthTest\Providers
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\OAuth\Providers\Stripe\Stripe;

/**
 * @property \chillerlan\OAuth\Providers\Stripe\Stripe $provider
 */
class StripeTest extends OAuth2ProviderTestAbstract{

	protected $FQN = Stripe::class;

}
