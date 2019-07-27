<?php
/**
 * @link https://docs.patreon.com/#oauth
 *
 * @filesource   get-token-v1.php
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Patreon;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Patreon\Patreon1;

/** @var \chillerlan\OAuth\Providers\Patreon\Patreon1 $patreon1 */
$patreon1 = null;

require_once __DIR__.'/patreon-v1-common.php';

$scopes = [
	Patreon1::SCOPE_USERS,
];

$servicename = $patreon1->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$patreon1->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $patreon1->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($patreon1->currentUser()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
