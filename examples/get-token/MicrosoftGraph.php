<?php
/**
 * @link https://docs.microsoft.com/azure/active-directory/develop/v2-app-types
 *
 * @created      31.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Microsoft\MicrosoftGraph;
use function chillerlan\HTTP\Psr7\get_json;

$ENVVAR = 'MICROSOFT_AAD';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$msgraph     = new MicrosoftGraph($http, $storage, $options, $logger);
$servicename = $msgraph->serviceName;

$scopes = [
	MicrosoftGraph::SCOPE_OPENID,
	MicrosoftGraph::SCOPE_OPENID_EMAIL,
	MicrosoftGraph::SCOPE_OPENID_PROFILE,
	MicrosoftGraph::SCOPE_OFFLINE_ACCESS,
	MicrosoftGraph::SCOPE_USER_READ,
	MicrosoftGraph::SCOPE_USER_READBASIC_ALL,
];

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$msgraph->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $msgraph->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($msgraph->me()), true).'</pre>';
	echo '<pre>'.print_r($storage->getAccessToken($servicename)->toJSON(), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
