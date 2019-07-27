<?php
/**
 * @link https://wiki.openstreetmap.org/wiki/OAuth
 *
 * @filesource   get-token.php
 * @created      12.05.2019
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2019 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\OpenStreetmap;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\OpenStreetmap\OpenStreetmap $osm */
$osm = null;

require_once __DIR__.'/osm-common.php';

$servicename = $osm->serviceName;

// step 2: redirect to the provider's login screen
if(isset($_GET['login']) && $_GET['login'] === $servicename){
	header('Location: '.$osm->getAuthURL());
}
// step 3: receive the access token
elseif(isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
	$token = $osm->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);

	// save the token [...]

	// access granted, redirect
	header('Location: ?granted='.$servicename);
}
// step 4: verify the token and use the API
elseif(isset($_GET['granted']) && $_GET['granted'] === $servicename){
	echo '<pre>'.print_r(Psr7\get_xml($osm->userDetails()), true).'</pre>';
}
// step 1 (optional): display a login link
else{
	echo '<a href="?login='.$servicename.'">connect with '.$servicename.'!</a>';
}

exit;
