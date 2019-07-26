<?php
/**
 * @filesource   twitter-common.php
 * @created      04.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Twitter;

use chillerlan\OAuth\Providers\Twitter\{Twitter, Twitter2};

$ENVVAR = 'TWITTER';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../provider-example-common.php';

$twitter  = new Twitter($http, $storage, $options, $logger);
$twitter2 = new Twitter2($http, $storage, $options, $logger); // application-only
