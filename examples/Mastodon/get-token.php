<?php
/**
 * @link https://github.com/tootsuite/documentation/blob/master/Using-the-API/OAuth-details.md
 *
 * @filesource   get-token.php
 * @created      19.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Mastodon;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Mastodon\Mastodon;

/** @var \chillerlan\OAuth\Providers\Mastodon\Mastodon $mastodon */
$mastodon = null;
/** @var \chillerlan\DotEnv\DotEnv $env */
$env      = null;

require_once __DIR__.'/mastodon-common.php';

$scopes = [
	Mastodon::SCOPE_READ,
	Mastodon::SCOPE_WRITE,
	Mastodon::SCOPE_FOLLOW,
];

$servicename = $mastodon->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$mastodon->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $mastodon->getAccessToken($_GET['code'], $_GET['state']);

	// store the instance the token belongs to
	$token->extraParams = array_merge($token->extraParams, ['instance' => $env->MASTODON_TESTINSTANCE]);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($mastodon->getCurrentUser()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
