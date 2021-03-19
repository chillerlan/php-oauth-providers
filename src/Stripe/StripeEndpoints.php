<?php
/**
 * Class StripeEndpoints
 *
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Stripe;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://stripe.com/docs/api
 */
class StripeEndpoints extends EndpointMap{

	protected array $me = [
		'path'          => '/accounts',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
