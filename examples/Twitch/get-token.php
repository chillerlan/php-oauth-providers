<?php
/**
 * @filesource   get-token.php
 * @created      20.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Twitch;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Twitch\Twitch;

/** @var \chillerlan\OAuth\Providers\Twitch\Twitch $twitch */
$twitch = null;

require_once __DIR__.'/twitch-common.php';

$scopes = [
	Twitch::SCOPE_USER_READ,
];

$servicename = $twitch->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$twitch->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $twitch->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($twitch->me()),true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
