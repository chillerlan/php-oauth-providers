<?php
/**
 * @link https://login.amazon.com/
 *
 * @filesource   get-token.php
 * @created      10.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Amazon;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Amazon\Amazon;

/** @var \chillerlan\OAuth\Providers\Amazon\Amazon $amazon */
$amazon = null;

require_once __DIR__.'/amazon-common.php';

$scopes = [
	Amazon::SCOPE_PROFILE,
	Amazon::SCOPE_PROFILE_USER_ID,
	Amazon::SCOPE_POSTAL_CODE,
];

$servicename = $amazon->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$amazon->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $amazon->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($amazon->userProfile()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
