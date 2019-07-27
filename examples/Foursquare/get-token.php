<?php
/**
 * @link https://developer.foursquare.com/overview/auth
 *
 * @filesource   get-token.php
 * @created      10.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Foursquare;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\Foursquare\Foursquare $foursquare */
$foursquare = null;

require_once __DIR__.'/foursquare-common.php';

// no scopes available yet
$scopes = [];

$servicename = $foursquare->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$foursquare->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code'])){
	$token = $foursquare->getAccessToken($_GET['code']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($foursquare->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
