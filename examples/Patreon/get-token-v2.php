<?php
/**
 * @link https://docs.patreon.com/#apiv2-oauth
 *
 * @filesource   get-token-v2.php
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Patreon;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Patreon\Patreon2;

/** @var \chillerlan\OAuth\Providers\Patreon\Patreon2 $patreon2 */
$patreon2 = null;

require_once __DIR__.'/patreon-v2-common.php';

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
