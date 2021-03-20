<?php
/**
 * @link https://www.instagram.com/developer/authentication/
 *
 * @created      10.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Instagram\Instagram;
use function chillerlan\HTTP\Psr7\get_json;

$ENVVAR = 'INSTAGRAM';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$instagram   = new Instagram($http, $storage, $options, $logger);
$servicename = $instagram->serviceName;

$scopes = [
	Instagram::SCOPE_BASIC,
	Instagram::SCOPE_COMMENTS,
	Instagram::SCOPE_RELATIONSHIPS,
	Instagram::SCOPE_LIKES,
	Instagram::SCOPE_PUBLIC_CONTENT,
	Instagram::SCOPE_FOLLOWER_LIST,
];

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$instagram->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $instagram->getAccessToken($_GET['code'], $_GET['state']);

	$user = $token->extraParams['user'];

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($instagram->profile('self')), true).'</pre>';
	echo '<textarea cols="120" rows="3" onclick="this.select();">'.$storage->getAccessToken($servicename)->toJSON().'</textarea>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
