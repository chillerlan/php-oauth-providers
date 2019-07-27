<?php
/**
 * @filesource   get-token.php
 * @created      20.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Mixcloud;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\Mixcloud\Mixcloud $mixcloud */
$mixcloud = null;

require_once __DIR__.'/mixcloud-common.php';

// no scopes available yet
$scopes = [];

$servicename = $mixcloud->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$mixcloud->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code'])){ // mixcloud doesn't support <state>
	$token = $mixcloud->getAccessToken($_GET['code']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($mixcloud->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
