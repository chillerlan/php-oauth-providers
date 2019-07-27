<?php
/**
 * Class StripeEndpoints
 *
 * @filesource   StripeEndpoints.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Stripe
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Stripe;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://stripe.com/docs/api
 */
class StripeEndpoints extends EndpointMap{

	protected $me = [
		'path'          => '/accounts',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
