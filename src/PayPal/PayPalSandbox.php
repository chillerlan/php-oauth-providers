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

/**
 * @method \Psr\Http\Message\ResponseInterface me(array $params = ['schema'])
 */
class PayPalSandbox extends PayPal{

	protected string $authURL        = 'https://www.sandbox.paypal.com/connect';
	protected string $accessTokenURL = 'https://api.sandbox.paypal.com/v1/oauth2/token';
	protected ?string $apiURL        = 'https://api.sandbox.paypal.com';

}
