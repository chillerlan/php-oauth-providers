<?php
/**
 * Class PayPalAPITest
 *
 * @filesource   PayPalAPITest.php
 * @created      29.07.2019
 * @package      chillerlan\OAuthTest\Providers\PayPal
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\PayPal;

use chillerlan\OAuth\Providers\PayPal\PayPal;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\PayPal\PayPal $provider
 */
class PayPalAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = PayPal::class;
	protected $ENV = 'PAYPAL'; // PAYPAL_SANDBOX

	public function testMe(){
		$r = $this->provider->me(['schema' => 'paypalv1.1']);

		$json = $this->responseJson($r);

		if(!isset($json->emails) || !is_array($json->emails) || empty($json->emails)){
			$this->markTestSkipped('no email found');
			return;
		}

		foreach($json->emails as $email){
			if($email->primary){
				$this->assertSame($this->testuser, $email->value);
				return;
			}
		}

	}

}
