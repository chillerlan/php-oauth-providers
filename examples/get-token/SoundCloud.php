<?php
/**
 * @link https://developers.soundcloud.com/docs/api/guide#authentication
 *
 * @filesource   SoundCloud.php
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\SoundCloud\SoundCloud;

$ENVVAR = 'SOUNDCLOUD';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../provider-example-common.php';

$soundcloud = new SoundCloud($http, $storage, $options, $logger);

$scopes = [
	SoundCloud::SCOPE_NONEXPIRING,
#	SoundCloud::SCOPE_EMAIL, // ???
];

$servicename = $soundcloud->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$soundcloud->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code'])){ // soundcloud doesn't support <state>
	$token = $soundcloud->getAccessToken($_GET['code']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($soundcloud->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
