<?php
/**
 * @link https://steamcommunity.com/dev
 *
 * @created      20.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Steam\SteamOpenID;
use function chillerlan\HTTP\Psr7\get_json;

$ENVVAR = 'STEAMOPENID';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$steam       = new SteamOpenID($http, $storage, $options, $logger);
$servicename = $steam->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$steam->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['openid_sig']) && isset($_GET['openid_signed'])){
	$token = $steam->getAccessToken($_GET);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
//step 3.1: oh noes!
elseif(isset($_GET['openid_error'])){ // openid.error -> https://stackoverflow.com/questions/68651/
	exit('oh noes: '.$_GET['openid_error']);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	$token = $storage->getAccessToken($servicename); // the user's steamid is stored as access token

	echo '<pre>'.print_r(get_json($steam->steamUserGetPlayerSummaries(['steamids' => $token->accessToken])), true).'</pre>';
	echo '<pre>'.print_r($token->toJSON(), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}
