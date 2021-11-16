<?php
/**
 *
 * @created      27.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples;

use chillerlan\OAuthTest\Providers\EndpointDocblock;
use chillerlan\OAuth\Core\{ClientCredentials, OAuth1Interface, OAuth2Interface};
use Psr\Http\Message\ResponseInterface;

use function chillerlan\OAuth\Providers\getProviders;
use function file_get_contents, file_put_contents, implode, str_replace, strpos, substr;

require_once __DIR__.'/provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface                $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface                        $logger
 */

$table = [
	'| Provider | API keys | revoke access | OAuth | `ClientCredentials` |',
	'|----------|----------|---------------|-------|---------------------|',
];

foreach(getProviders() as $p){
	/** @var \chillerlan\OAuth\Core\OAuthInterface $provider */
	$provider = new $p['fqcn']($http, $storage, $options, $logger);

	/** @phan-suppress-next-line PhanUndeclaredClassMethod */
	$doc = new EndpointDocblock($provider, $provider->endpoints);
	/** @phan-suppress-next-line PhanUndeclaredClassMethod */
	$doc->create(ResponseInterface::class);
#	$doc->createInterface($p['name'], ResponseInterface::class);
#	$doc->createJSON();

	switch(true){
		case $provider instanceof OAuth2Interface:
			$oauth = '2';
			break;
		case $provider instanceof OAuth1Interface:
			$oauth = '1';
			break;
		default:
			$oauth = '-';
	}

	$table[] = '| ['.$p['name'].']('.$provider->apiDocs.')'.
		' | [link]('.$provider->applicationURL.')'.
		' | '.(!$provider->userRevokeURL ? '' : '[link]('.$provider->userRevokeURL.')').
		' | '.$oauth.
		' | '.($provider instanceof ClientCredentials ? '✓' : '').
	    ' |' ;

}

$file   = __DIR__.'/../README.md';
$readme = file_get_contents($file);
$start  = strpos($readme, '<!--A-->') + 8;
$end    = strpos($readme, '<!--O-->');

file_put_contents($file, str_replace(substr($readme, $start, $end - $start), "\n".implode("\n", $table)."\n", $readme));
