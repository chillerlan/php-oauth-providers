<?php
/**
 * @link https://developer.paypal.com/docs/connect-with-paypal/integrate/
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\PayPal\PayPal;
use function chillerlan\HTTP\Utils\get_json;

$ENVVAR = 'PAYPAL'; // PAYPAL_SANDBOX

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 * @var array $SCOPES
 */

$paypal      = new PayPal($http, $storage, $options, $logger);
#$paypal      = new PayPalSandbox($http, $storage, $options, $logger);
$servicename = $paypal->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$paypal->getAuthURL(['flowEntry' => 'static', 'fullPage' => 'true'], $SCOPES));
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
	echo '<pre>'.print_r(get_json($paypal->me(['schema' => 'paypalv1.1'])), true).'</pre>';
	echo '<textarea cols="120" rows="3" onclick="this.select();">'.$storage->getAccessToken($servicename)->toJSON().'</textarea>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
