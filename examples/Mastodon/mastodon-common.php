<?php
/**
 * @filesource   mastodon-common.php
 * @created      19.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Mastodon;

$ENVVAR = 'MASTODON';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

/** @var \chillerlan\DotEnv\DotEnv $env */
$env = null;

require_once __DIR__.'/../provider-example-common.php';

$mastodon = new \chillerlan\OAuth\Providers\Mastodon\Mastodon($http, $storage, $options, $logger);

// set the mastodon instance we're about to request data from
$mastodon->setInstance($env->MASTODON_TESTINSTANCE);
