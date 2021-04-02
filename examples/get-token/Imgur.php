<?php
/**
 * @link https://apidocs.imgur.com/?version=latest#authorization-and-oauth
 *
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Imgur\Imgur;
use function chillerlan\HTTP\Utils\get_json;

$ENVVAR = 'IMGUR';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$imgur       = new Imgur($http, $storage, $options, $logger);
$servicename = $imgur->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$imgur->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $imgur->getAccessToken($_GET['code'], $_GET['state']);

	$username = $token->extraParams['account_username'];
	$id       = $token->extraParams['account_id'];

	$token->expires = time() + 2592000; // 30 days
	// save the token [...]
	$storage->storeAccessToken($servicename, $token);

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($imgur->me()), true).'</pre>';
	echo '<textarea cols="120" rows="3" onclick="this.select();">'.$storage->getAccessToken($servicename)->toJSON().'</textarea>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
