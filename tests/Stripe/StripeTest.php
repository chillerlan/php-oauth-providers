<?php
/**
 * Class StripeTest
 *
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Stripe;

use chillerlan\OAuth\Providers\Stripe\Stripe;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Stripe\Stripe $provider
 */
class StripeTest extends OAuth2ProviderTestAbstract{

	protected string $FQN = Stripe::class;

}
