<?php
/**
 * @link https://developers.google.com/identity/protocols/OAuth2WebServer
 *
 * @filesource   get-token.php
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Google;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Google\Google;

/** @var \chillerlan\OAuth\Providers\Google\Google $google */
$google = null;

require_once __DIR__.'/google-common.php';

$scopes = [
	Google::SCOPE_EMAIL,
	Google::SCOPE_PROFILE,
];

$servicename = $google->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$google->getAuthURL(['access_type' => 'online'], $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $google->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($google->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
