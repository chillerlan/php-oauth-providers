<?php
/**
 * @filesource   get-token.php
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Imgur;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\Imgur\Imgur $imgur */
$imgur = null;

require_once __DIR__.'/imgur-common.php';

$servicename = $imgur->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$imgur->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $imgur->getAccessToken($_GET['code'], $_GET['state']);

	$username = $token->extraParams['account_username'];
	$id       = $token->extraParams['account_id'];

	$token->expires = time() + 2592000; // 30 days
	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($imgur->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
