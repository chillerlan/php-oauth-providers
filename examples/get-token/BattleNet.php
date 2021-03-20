<?php
/**
 * @link https://develop.battle.net/documentation/guides/using-oauth
 *
 * @created      02.08.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\BattleNet\BattleNet;
use function chillerlan\HTTP\Psr7\get_json;

$ENVVAR = 'BATTLENET';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$battlenet   = new BattleNet($http, $storage, $options, $logger);
$servicename = $battlenet->serviceName;

$scopes = [
	BattleNet::SCOPE_OPENID,
	BattleNet::SCOPE_PROFILE_D3,
	BattleNet::SCOPE_PROFILE_SC2,
	BattleNet::SCOPE_PROFILE_WOW,
];

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$battlenet->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $battlenet->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($battlenet->userinfo()), true).'</pre>';
	echo '<textarea cols="120" rows="3" onclick="this.select();">'.$storage->getAccessToken($servicename)->toJSON().'</textarea>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
