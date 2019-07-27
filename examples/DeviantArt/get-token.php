<?php
/**
 * @filesource   get-token.php
 * @created      21.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\DeviantArt;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\DeviantArt\DeviantArt;

/** @var \chillerlan\OAuth\Providers\DeviantArt\DeviantArt $deviantart */
$deviantart  = null;

require_once __DIR__.'/deviantart-common.php';

$scopes = [
	DeviantArt::SCOPE_BASIC,
	DeviantArt::SCOPE_BROWSE,
];

$servicename = $deviantart->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$deviantart->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $deviantart->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($deviantart->whoami()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;