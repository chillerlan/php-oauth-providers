<?php
/**
 * Class PayPalSandbox
 *
 * @filesource   PayPalSandbox.php
 * @created      29.07.2019
 * @package      chillerlan\OAuth\Providers\PayPal
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\PayPal;

class PayPalSandbox extends PayPal{

	protected $apiURL         = 'https://api.sandbox.paypal.com';
	protected $accessTokenURL = 'https://api.sandbox.paypal.com/v1/oauth2/token';
	protected $authURL        = 'https://www.sandbox.paypal.com/connect';

}
