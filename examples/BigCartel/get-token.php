<?php
/**
 * @filesource   get-token.php
 * @created      10.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\BigCartel;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\BigCartel\BigCartel $bigcartel */
$bigcartel = null;

require_once __DIR__.'/bigcartel-common.php';

// no scopes available yet
$scopes = [];

$servicename = $bigcartel->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$bigcartel->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $bigcartel->getAccessToken($_GET['code'], $_GET['state']);

	$account_id = $token->extraParams['account_id'];

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($bigcartel->account()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
