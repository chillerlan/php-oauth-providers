<?php
/**
 * @link https://www.mixcloud.com/developers/#authorization
 *
 * @created      20.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Mixcloud\Mixcloud;
use function chillerlan\HTTP\Utils\get_json;

$ENVVAR = 'MIXCLOUD';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$mixcloud    = new Mixcloud($http, $storage, $options, $logger);
$servicename = $mixcloud->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$mixcloud->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['code'])){ // mixcloud doesn't support <state>
	$token = $mixcloud->getAccessToken($_GET['code']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($mixcloud->me()), true).'</pre>';
	echo '<textarea cols="120" rows="3" onclick="this.select();">'.$storage->getAccessToken($servicename)->toJSON().'</textarea>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
