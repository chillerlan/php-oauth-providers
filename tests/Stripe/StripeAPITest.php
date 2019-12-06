<?php
/**
 * Class StripeAPITest
 *
 * @filesource   StripeAPITest.php
 * @created      09.08.2018
 * @package      chillerlan\OAuthTest\API
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\API\Stripe;

use chillerlan\OAuth\Providers\Stripe\Stripe;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * Stripe API usage tests/examples
 *
 * @link https://stripe.com/docs/api
 *
 * @property \chillerlan\OAuth\Providers\Stripe\Stripe $provider
 */
class StripeAPITest extends OAuth2APITest{

	protected string $FQN = Stripe::class;
	protected string $ENV = 'STRIPE';

	public function testGetUserInfo():void{
		$r = $this->provider->me();

 		$this->assertSame($this->testuser, $this->responseJson($r)->data[0]->email);
	}

}
