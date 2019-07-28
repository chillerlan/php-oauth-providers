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

/** @var array $providers */
$providers = null;

require_once __DIR__.'/provider-example-common.php';

foreach($providers as $fqcn){
	/** @var \chillerlan\OAuth\Core\OAuthInterface $provider */
	$provider = new $fqcn($http, $storage, $options, $logger);

	$doc = new EndpointDocblock($provider, $provider->endpoints);
	$doc->create(ResponseInterface::class);
#	$doc->createInterface($provider->serviceName, ResponseInterface::class);
#	$doc->createJSON();
}
