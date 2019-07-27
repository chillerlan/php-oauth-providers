<?php
/**
 * @link https://developer.gitter.im/docs/authentication
 *
 * @filesource   get-token.php
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Gitter;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Gitter\Gitter;

/** @var \chillerlan\OAuth\Providers\Gitter\Gitter $gitter */
$gitter = null;

require_once __DIR__.'/gitter-common.php';

$scopes = [
	Gitter::SCOPE_FLOW,
	Gitter::SCOPE_PRIVATE,
];

$servicename = $gitter->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$gitter->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $gitter->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($gitter->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
