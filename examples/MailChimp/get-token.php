<?php
/**
 * @link http://developer.mailchimp.com/documentation/mailchimp/guides/how-to-use-oauth2/
 *
 * @filesource   get-token.php
 * @created      16.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\MailChimp;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\MailChimp\MailChimp $mailchimp */
$mailchimp = null;

require_once __DIR__.'/mailchimp-common.php';

$scopes = [];

$servicename = $mailchimp->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$mailchimp->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $mailchimp->getAccessToken($_GET['code'], $_GET['state']);

	// MailChimp needs another call to the auth metadata endpoint
	// to receive the datacenter prefix/API URL, which will then
	// be stored in AccessToken::$extraParams
	$token = $mailchimp->getTokenMetadata($token);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($mailchimp->root()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
