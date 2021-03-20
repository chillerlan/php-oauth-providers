<?php
/**
 * @link https://api.slack.com/docs/oauth
 *
 * @created      20.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Slack\Slack;
use function chillerlan\HTTP\Psr7\get_json;

$ENVVAR = 'SLACK';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$slack       = new Slack($http, $storage, $options, $logger);
$servicename = $slack->serviceName;

$scopes = [
	Slack::SCOPE_IDENTITY_AVATAR,
	Slack::SCOPE_IDENTITY_BASIC,
	Slack::SCOPE_IDENTITY_EMAIL,
	Slack::SCOPE_IDENTITY_TEAM,
];

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$slack->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $slack->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($slack->userIdentity()), true).'</pre>';
	echo '<pre onclick="this.select();">'.print_r($storage->getAccessToken($servicename)->toJSON(), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
