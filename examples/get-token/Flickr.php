<?php
/**
 * @link https://www.flickr.com/services/api/auth.oauth.html
 *
 * @filesource   Flickr.php
 * @created      20.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Flickr\Flickr;

$ENVVAR = 'FLICKR';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$flickr = new Flickr($http, $storage, $options, $logger);

$servicename = $flickr->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	$params = ['perms' => Flickr::PERM_DELETE];

	header('Location: '.$flickr->getAuthURL($params));
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $flickr->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	$user_name = $token->extraParams['username'];
	$user_id   = $token->extraParams['user_nsid'];

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($flickr->testLogin()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
