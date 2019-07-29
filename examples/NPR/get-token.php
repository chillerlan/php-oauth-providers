<?php
/**
 * @link https://dev.npr.org/api/?urls.primaryName=authorization#/authorization/getAuthorizationPage
 *
 * @filesource   get-token.php
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\NPR;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\NPR\NPROne;

/** @var \chillerlan\OAuth\Providers\NPR\NPROne $npr */
$npr = null;

require_once __DIR__.'/npr-common.php';

$scopes = [
	NPROne::SCOPE_IDENTITY_READONLY,
	NPROne::SCOPE_IDENTITY_WRITE,
	NPROne::SCOPE_LISTENING_READONLY,
	NPROne::SCOPE_LISTENING_WRITE,
	NPROne::SCOPE_LOCALACTIVATION
];

$servicename = $npr->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$npr->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $npr->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($npr->identityUser()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;


