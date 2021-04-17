<?php
/**
 * @link https://developers.soundcloud.com/docs/api/guide#authentication
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\SoundCloud\SoundCloud;
use function chillerlan\HTTP\Utils\get_json;

$ENVVAR = 'SOUNDCLOUD';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 * @var array $SCOPES
 */

$soundcloud  = new SoundCloud($http, $storage, $options, $logger);
$servicename = $soundcloud->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$soundcloud->getAuthURL(null, $SCOPES));
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
	echo '<pre>'.print_r(get_json($soundcloud->me()), true).'</pre>';
	echo '<textarea cols="120" rows="3" onclick="this.select();">'.$storage->getAccessToken($servicename)->toJSON().'</textarea>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
