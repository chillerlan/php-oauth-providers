<?php
/**
 * @link https://www.tumblr.com/docs/en/api/v2#oauth
 *
 * @created      24.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\Tumblr;

$ENVVAR = 'TUMBLR';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$tumblr      = (new Tumblr($http, $options, $logger))->setStorage($storage);
$servicename = $tumblr->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$tumblr->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $tumblr->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(MessageUtil::decodeJSON($tumblr->me()),true).'</pre>';
	echo '<textarea cols="120" rows="3" onclick="this.select();">'.$storage->getAccessToken($servicename)->toJSON().'</textarea>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
