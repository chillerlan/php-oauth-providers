<?php
/**
 * Class StripeAPITest
 *
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Live;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\Stripe;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * Stripe API usage tests/examples
 *
 * @link https://stripe.com/docs/api
 *
 * @property \chillerlan\OAuth\Providers\Stripe $provider
 */
class StripeAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Stripe::class;
	protected string $ENV = 'STRIPE';

	public function testMe():void{
 		$this::assertSame($this->testuser, MessageUtil::decodeJSON($this->provider->me())->data[0]->email);
	}

}
