<?php
/**
 * @link https://beta.developer.spotify.com/documentation/general/guides/authorization-guide/
 *
 * @created      10.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Spotify\Spotify;

$ENVVAR = 'SPOTIFY';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$spotify = new Spotify($http, $storage, $options, $logger);

$scopes = [
	Spotify::SCOPE_PLAYLIST_READ_PRIVATE,
	Spotify::SCOPE_PLAYLIST_READ_COLLABORATIVE,
	Spotify::SCOPE_PLAYLIST_MODIFY_PUBLIC,
	Spotify::SCOPE_PLAYLIST_MODIFY_PRIVATE,
	Spotify::SCOPE_USER_FOLLOW_MODIFY,
	Spotify::SCOPE_USER_FOLLOW_READ,
	Spotify::SCOPE_USER_LIBRARY_READ,
	Spotify::SCOPE_USER_LIBRARY_MODIFY,
	Spotify::SCOPE_USER_TOP_READ,
	Spotify::SCOPE_USER_READ_PRIVATE,
	Spotify::SCOPE_USER_READ_BIRTHDATE,
	Spotify::SCOPE_USER_READ_EMAIL,
	Spotify::SCOPE_STREAMING,
	Spotify::SCOPE_USER_READ_PLAYBACK_STATE,
	Spotify::SCOPE_USER_MODIFY_PLAYBACK_STATE,
	Spotify::SCOPE_USER_READ_CURRENTLY_PLAYING,
	Spotify::SCOPE_USER_READ_RECENTLY_PLAYED,
#	Spotify::SCOPE_UGC_IMAGE_UPLOAD,
];

$servicename = $spotify->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$spotify->getAuthURL(null, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $spotify->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($spotify->me()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
