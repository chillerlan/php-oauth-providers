<?php
/**
 * @link https://www.last.fm/api/authentication
 *
 * @filesource   get-token.php
 * @created      10.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\LastFM;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\LastFM\LastFM $lastfm */
$lastfm = null;

require_once __DIR__.'/lastfm-common.php';

$servicename = $lastfm->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$lastfm->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['token'])){
	$token = $lastfm->getAccessToken($_GET['token']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_json($lastfm->userGetInfo()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
