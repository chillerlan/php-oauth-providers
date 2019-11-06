<?php
/**
 * @link https://www.opencaching.de/okapi/introduction.html
 *
 * @filesource   OpenCaching.php
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\OpenCaching\OpenCaching;

$ENVVAR = 'OKAPI';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$okapi = new OpenCaching($http, $storage, $options, $logger);

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $okapi->serviceName){
	$params = ['oauth_callback' => $options->callbackURL];

	header('Location: '.$okapi->getAuthURL($params));
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $okapi->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$okapi->serviceName);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $okapi->serviceName){
	echo '<pre>'.print_r(Psr7\get_json($okapi->usersUser(['fields' => 'username'])), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$okapi->serviceName.'">connect with '.$okapi->serviceName.'!</a>';
}

exit;
