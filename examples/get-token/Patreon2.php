<?php
/**
 * @link https://docs.patreon.com/#apiv2-oauth
 *
 * @filesource   Patreon2.php
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Patreon\Patreon2;

$ENVVAR = 'PATREON2';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$patreon2 = new Patreon2($http, $storage, $options, $logger);

$scopes = [
	Patreon2::SCOPE_IDENTITY,
	Patreon2::SCOPE_IDENTITY_EMAIL,
	Patreon2::SCOPE_IDENTITY_MEMBERSHIPS,
	Patreon2::SCOPE_CAMPAIGNS,
	Patreon2::SCOPE_CAMPAIGNS_MEMBERS,
];

$servicename = $patreon2->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$patreon2->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $patreon2->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($patreon2->identity(['fields[user]' => 'about,created,email,first_name,full_name,image_url,last_name,social_connections,thumb_url,url,vanity'])), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
