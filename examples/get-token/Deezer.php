<?php
/**
 * @link https://developers.deezer.com/api/oauth
 *
 * @filesource   Deezer.php.php
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Deezer\Deezer;

$ENVVAR = 'DEEZER';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../provider-example-common.php';

$deezer = new Deezer($http, $storage, $options, $logger);

$scopes = [
	Deezer::SCOPE_BASIC,
	Deezer::SCOPE_EMAIL,
	Deezer::SCOPE_OFFLINE_ACCESS,
	Deezer::SCOPE_MANAGE_LIBRARY,
	Deezer::SCOPE_MANAGE_COMMUNITY,
	Deezer::SCOPE_DELETE_LIBRARY,
	Deezer::SCOPE_LISTENING_HISTORY,
];

$servicename = $deezer->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$deezer->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $deezer->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($deezer->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
