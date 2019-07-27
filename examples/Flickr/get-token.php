<?php
/**
 * @filesource   twitter.php
 * @created      20.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Flickr;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Flickr\Flickr;

/** @var \chillerlan\OAuth\Providers\Flickr\Flickr $flickr */
$flickr = null;

require_once __DIR__.'/flickr-common.php';

$servicename = $flickr->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$flickr->getAuthURL(['perms' => Flickr::PERM_DELETE]));
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $flickr->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	$user_name = $token->extraParams['username'];
	$user_id   = $token->extraParams['user_nsid'];

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($flickr->testLogin()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
