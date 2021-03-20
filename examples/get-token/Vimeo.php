<?php
/**
 * @link https://developer.vimeo.com/api/authentication
 *
 * @created      10.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Vimeo\Vimeo;
use function chillerlan\HTTP\Psr7\get_json;

$ENVVAR = 'VIMEO';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$vimeo       = new Vimeo($http, $storage, $options, $logger);
$servicename = $vimeo->serviceName;

$scopes = [
	Vimeo::SCOPE_PRIVATE,
	Vimeo::SCOPE_PUBLIC,
	Vimeo::SCOPE_PURCHASED,
	Vimeo::SCOPE_PURCHASE,
	Vimeo::SCOPE_CREATE,
	Vimeo::SCOPE_EDIT,
	Vimeo::SCOPE_DELETE,
	Vimeo::SCOPE_INTERACT,
#	Vimeo::SCOPE_UPLOAD,
	Vimeo::SCOPE_PROMO_CODES,
	Vimeo::SCOPE_VIDEO_FILES,
];

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$vimeo->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $vimeo->getAccessToken($_GET['code'], $_GET['state']);

	$app = $token->extraParams['app'];

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($vimeo->verifyToken()),true).'</pre>';
	echo '<pre onclick="this.select();">'.print_r($storage->getAccessToken($servicename)->toJSON(), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
