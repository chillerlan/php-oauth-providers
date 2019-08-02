<?php
/**
 * @link https://developer.paypal.com/docs/connect-with-paypal/integrate/
 *
 * @filesource   PayPal.php
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\PayPal\{PayPal, PayPalSandbox};

$ENVVAR = 'PAYPAL'; // PAYPAL_SANDBOX

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../provider-example-common.php';

$paypal = new PayPal($http, $storage, $options, $logger);
#$paypal = new PayPalSandbox($http, $storage, $options, $logger);

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