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
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * Stripe API usage tests/examples
 *
 * @link https://stripe.com/docs/api
 *
 * @property \chillerlan\OAuth\Providers\Stripe\Stripe $provider
 */
class StripeAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Stripe::class;
	protected $ENV = 'STRIPE';

	public function testGetUserInfo(){
		$r = $this->provider->me();

 		$this->assertSame('/v1/accounts', $this->responseJson($r)->url);
	}

}
