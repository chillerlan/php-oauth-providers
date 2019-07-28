<?php
/**
 * @filesource   gw2-common.php
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\GuildWars2;

$ENVVAR = '';

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

$gw2 = new \chillerlan\OAuth\Providers\GuildWars2\GuildWars2($http, $storage, $options, $logger);
$gw2->storeGW2Token($env->GW2_TOKEN);
