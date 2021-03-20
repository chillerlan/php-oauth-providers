<?php
/**
 * @link https://discordapp.com/developers/docs/topics/oauth2
 *
 * @created      20.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Discord\Discord;
use function chillerlan\HTTP\Psr7\get_json;

$ENVVAR = 'DISCORD';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$discord     = new Discord($http, $storage, $options, $logger);
$servicename = $discord->serviceName;

$scopes = [
	Discord::SCOPE_CONNECTIONS,
	Discord::SCOPE_EMAIL,
	Discord::SCOPE_IDENTIFY,
	Discord::SCOPE_GUILDS,
	Discord::SCOPE_GUILDS_JOIN,
	Discord::SCOPE_GDM_JOIN,
	Discord::SCOPE_MESSAGES_READ,
	Discord::SCOPE_RPC_API,
	Discord::SCOPE_RPC_NOTIFICATIONS_READ,
#	Discord::SCOPE_BOT,
#	Discord::SCOPE_RPC,
#	Discord::SCOPE_WEBHOOK_INCOMING,
];

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$discord->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $discord->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($discord->me()), true).'</pre>';
	echo '<pre onclick="this.select();">'.print_r($storage->getAccessToken($servicename)->toJSON(), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
