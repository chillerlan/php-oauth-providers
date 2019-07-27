<?php
/**
 * @link https://www.opencaching.de/okapi/introduction.html
 *
 * @filesource   get-token.php
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\OpenCaching;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\OpenCaching\OpenCaching $okapi */
$okapi     = null;
/** @var \chillerlan\OAuth\OAuthOptions $options */
$options   = null;

require_once __DIR__.'/opencaching-common.php';

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $okapi->serviceName){
	header('Location: '.$okapi->getAuthURL(['oauth_callback' => $options->callbackURL]));
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $okapi->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$okapi->serviceName);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $okapi->serviceName){
	echo '<pre>'.print_r(Psr7\get_json($okapi->usersUser(['fields' => 'username'])), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$okapi->serviceName.'">connect with '.$okapi->serviceName.'!</a>';
}

exit;
