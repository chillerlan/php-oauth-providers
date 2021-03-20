<?php
/**
 * @link http://developer.mailchimp.com/documentation/mailchimp/guides/how-to-use-oauth2/
 *
 * @created      16.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\MailChimp\MailChimp;
use function chillerlan\HTTP\Psr7\get_json;

$ENVVAR = 'MAILCHIMP';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$mailchimp   = new MailChimp($http, $storage, $options, $logger);
$servicename = $mailchimp->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$mailchimp->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $mailchimp->getAccessToken($_GET['code'], $_GET['state']);

	// MailChimp needs another call to the auth metadata endpoint
	// to receive the datacenter prefix/API URL, which will then
	// be stored in AccessToken::$extraParams
	$token = $mailchimp->getTokenMetadata($token);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(get_json($mailchimp->root()), true).'</pre>';
	echo '<pre>'.print_r($storage->getAccessToken($servicename)->toJSON(), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
