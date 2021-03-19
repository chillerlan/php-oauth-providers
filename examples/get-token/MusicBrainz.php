<?php
/**
 * @link https://musicbrainz.org/doc/Development/OAuth2
 *
 * @created      31.07.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\MusicBrainz\MusicBrainz;

$ENVVAR = 'MUSICBRAINZ';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$musicbrainz = new MusicBrainz($http, $storage, $options, $logger);

$scopes = [
	MusicBrainz::SCOPE_PROFILE,
	MusicBrainz::SCOPE_EMAIL,
	MusicBrainz::SCOPE_TAG,
	MusicBrainz::SCOPE_RATING,
	MusicBrainz::SCOPE_COLLECTION,
	MusicBrainz::SCOPE_SUBMIT_ISRC,
	MusicBrainz::SCOPE_SUBMIT_BARCODE,
];

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $musicbrainz->serviceName){

	$params = [
		'access_type'     => 'offline',
		'approval_prompt' => 'force',
		'state'           => sha1(random_bytes(256)),
	];

	header('Location: '.$musicbrainz->getAuthURL($params, $scopes));
}
// step 3: receive the access token
elseif(isset($_GET['code']) && isset($_GET['state'])){
	$token = $musicbrainz->getAccessToken($_GET['code'], $_GET['state']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$musicbrainz->serviceName);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $musicbrainz->serviceName){
	echo '<pre>'.print_r(Psr7\get_json($musicbrainz->artistId('573510d6-bb5d-4d07-b0aa-ea6afe39e28d', ['inc' => 'url-rels work-rels'])), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$musicbrainz->serviceName.'">connect with '.$musicbrainz->serviceName.'!</a>';
}

exit;
