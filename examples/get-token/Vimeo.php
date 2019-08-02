<?php
/**
 * @link https://developer.vimeo.com/api/authentication
 *
 * @filesource   Vimeo.php
 * @created      10.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Vimeo\Vimeo;

$ENVVAR = 'VIMEO';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../provider-example-common.php';

$vimeo     = new Vimeo($http, $storage, $options, $logger);

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

$servicename = $vimeo->serviceName;

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
	echo '<pre>'.print_r(Psr7\get_json($vimeo->verifyToken()),true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
