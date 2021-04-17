<?php
/**
 * @link https://github.com/tootsuite/documentation/blob/master/Using-the-API/OAuth-details.md
 *
 * @created      19.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Mastodon\Mastodon;
use function chillerlan\HTTP\Utils\get_json;

$ENVVAR = 'MASTODON';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 * @var \chillerlan\DotEnv\DotEnv $env
 * @var array $SCOPES
 */

// set the mastodon instance we're about to request data from
$mastodon    = (new Mastodon($http, $storage, $options, $logger))->setInstance($env->get($ENVVAR.'_INSTANCE'));
$servicename = $mastodon->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$mastodon->getAuthURL(null, $SCOPES));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $mastodon->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($mastodon->getCurrentUser()), true).'</pre>';
	echo '<textarea cols="120" rows="3" onclick="this.select();">'.$storage->getAccessToken($servicename)->toJSON().'</textarea>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
