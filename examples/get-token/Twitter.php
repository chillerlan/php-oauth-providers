<?php
/**
 * @link https://developer.twitter.com/en/docs/basics/authentication/overview/oauth
 * @link https://developer.twitter.com/en/docs/basics/authentication/overview/application-only
 *
 * @filesource   Twitter.php
 * @created      10.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Twitter\{Twitter, TwitterCC};

$ENVVAR = 'TWITTER';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../provider-example-common.php';

$twitter  = new Twitter($http, $storage, $options, $logger);
#$twitter2 = new TwitterCC($http, $storage, $options, $logger); // application-only

$servicename = $twitter->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$twitter->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $twitter->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	// save the token [...]
	$screen_name = $token->extraParams['screen_name'];
	$user_id     = $token->extraParams['user_id'];

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($twitter->verifyCredentials()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;