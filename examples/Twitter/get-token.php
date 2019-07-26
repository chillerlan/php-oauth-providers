<?php
/**
 * @filesource   get-token.php
 * @created      10.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Twitter;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\Twitter\Twitter $twitter */
$twitter     = null;

require_once __DIR__.'/twitter-common.php';

$servicename = $twitter->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$twitter->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $twitter->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	// save the token [...]
	$screen_name = $token->extraParams['screen_name'];
	$user_id     = $token->extraParams['user_id'];

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($twitter->verifyCredentials()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
