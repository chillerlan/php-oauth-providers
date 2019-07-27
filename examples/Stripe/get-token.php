<?php
/**
 * @link https://stripe.com/docs/connect/authentication
 *
 * @filesource   get-token.php
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Stripe;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Stripe\Stripe;

/** @var \chillerlan\OAuth\Providers\Stripe\Stripe $stripe */
$stripe = null;

require_once __DIR__.'/stripe-common.php';

$scopes = [
	Stripe::SCOPE_READ_WRITE,
#	Stripe::SCOPE_READ_ONLY,
];

$servicename = $stripe->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$stripe->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $stripe->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($stripe->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
