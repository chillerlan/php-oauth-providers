<?php
/**
 * Class PayPalEndpoints
 *
 * @filesource   PayPalEndpoints.php
 * @created      29.07.2019
 * @package      chillerlan\OAuth\Providers\PayPal
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\PayPal;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://developer.paypal.com/docs/api/identity/v1/
 */
class PayPalEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/v1/identity/oauth2/userinfo',
		'method'        => 'GET',
		'query'         => ['schema'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
