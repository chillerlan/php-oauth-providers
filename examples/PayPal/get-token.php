<?php
/**
 * @link https://developer.paypal.com/docs/connect-with-paypal/integrate/
 *
 * @filesource   get-token.php
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\PayPal;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\PayPal\PayPal;

/** @var \chillerlan\OAuth\Providers\PayPal\PayPal $paypal */
$paypal = null;

require_once __DIR__.'/paypal-common.php';

$scopes = [
	PayPal::SCOPE_BASIC_AUTH,
	PayPal::SCOPE_FULL_NAME,
	PayPal::SCOPE_EMAIL,
	PayPal::SCOPE_ADDRESS,
	PayPal::SCOPE_ACCOUNT,
];

$servicename = $paypal->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$paypal->getAuthURL(['flowEntry' => 'static', 'fullPage' => 'true'], $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $paypal->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($paypal->me(['schema' => 'paypalv1.1'])), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
