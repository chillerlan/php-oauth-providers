<?php
/**
 *
 * @filesource   create-docblocks.php
 * @created      27.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples;

use chillerlan\HTTPTest\MagicAPI\EndpointDocblock;
use Psr\Http\Message\ResponseInterface;

$ENVVAR = '';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/provider-example-common.php';
require_once __DIR__.'/functions.php';

$table = [
	' Provider | API keys | revoke access ',
	'----------|----------|---------------',
];

foreach(getProviders() as $p){
	[$name, $fqcn] = $p;
	/** @var \chillerlan\OAuth\Core\OAuthInterface $provider */
	$provider = new $fqcn($http, $storage, $options, $logger);

	$doc = new EndpointDocblock($provider, $provider->endpoints);
	$doc->create(ResponseInterface::class);
#	$doc->createInterface($provider->serviceName, ResponseInterface::class);
#	$doc->createJSON();

	$table[] =
		'['.$provider->serviceName.']('.$provider->apiDocs.') '.
		'| [link]('.$provider->applicationURL.') '.
		'| '.(!$provider->userRevokeURL ? '' : '[link]('.$provider->userRevokeURL.')');

}

$file   = __DIR__.'/../README.md';
$readme = \file_get_contents($file);
$start  = \strpos($readme, '<!--A-->')+8;
$end    = \strpos($readme, '<!--O-->');

\file_put_contents($file, \str_replace(\substr($readme, $start, $end-$start), \PHP_EOL.\implode(\PHP_EOL, $table).\PHP_EOL, $readme));
