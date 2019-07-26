<?php
/**
 * @link https://www.discogs.com/developers/#page:authentication,header:authentication-oauth-flow
 *
 * @filesource   get-token.php
 * @created      10.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Discogs;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\Discogs\Discogs $discogs */
$discogs = null;

require_once __DIR__.'/discogs-common.php';

$servicename = $discogs->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$discogs->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $discogs->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($discogs->identity()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
