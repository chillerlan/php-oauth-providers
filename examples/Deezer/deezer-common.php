<?php
/**
 * @filesource   deezer-common.php
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Deezer;

$ENVVAR = 'DEEZER';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../provider-example-common.php';

$deezer = new \chillerlan\OAuth\Providers\Deezer\Deezer($http, $storage, $options, $logger);
