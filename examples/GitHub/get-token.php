<?php
/**
 * @filesource   get-token.php
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\GitHub;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\GitHub\GitHub;

/** @var \chillerlan\OAuth\Providers\GitHub\GitHub $github */
$github = null;

require_once __DIR__.'/github-common.php';

$scopes = [
	GitHub::SCOPE_USER,
	GitHub::SCOPE_PUBLIC_REPO,
	GitHub::SCOPE_GIST,
];

$servicename = $github->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$github->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $github->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($github->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
