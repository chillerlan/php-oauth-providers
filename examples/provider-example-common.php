<?php
/**
 * @created      26.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 *
 * @phan-file-suppress PhanUndeclaredClassMethod
 */

namespace chillerlan\OAuthExamples;

use chillerlan\DotEnv\DotEnv;
use chillerlan\OAuth\OAuthOptions;
use chillerlan\OAuthTest\{OAuthTestHttpClient, OAuthTestLogger};
use function ini_set;

// allow to use a different autoloader to make it easier to use the examples (@todo: WIP)
require_once $AUTOLOADER ?? __DIR__.'/../vendor/autoload.php';

ini_set('date.timezone', 'Europe/Amsterdam');

/**
 * these vars are supposed to be set before this file is included
 *
 * @var string $ENVVAR   - name prefix for the environment variable
 * @var string $CFGDIR   - the directory where configuration is stored (.env, cacert, tokens)
 * @var string $LOGLEVEL - log level for the test logger, use 'none' to suppress logging
 */
$ENVVAR   = $ENVVAR ?? '';
$CFGDIR   = $CFGDIR ?? __DIR__.'/../config';
$LOGLEVEL = $LOGLEVEL ?? 'info';

$env = (new DotEnv($CFGDIR, '.env', false))->load();

$options_arr = [
	// OAuthOptions
	'key'              => $env->get($ENVVAR.'_KEY') ?? '', // @todo: $env->get(..., default)
	'secret'           => $env->get($ENVVAR.'_SECRET') ?? '',
	'callbackURL'      => $env->get($ENVVAR.'_CALLBACK_URL') ?? '',
	'tokenAutoRefresh' => true,
	'sessionStart'     => true,

	// HTTPOptions
	'ca_info'          => $CFGDIR.'/cacert.pem',
	'userAgent'        => 'chillerlanPhpOAuth/4.0.0 +https://github.com/codemasher/php-oauth-core',
	'sleep'            => 0.25, // request delay used in the test http client
];

/**
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 * @var \Psr\Http\Client\ClientInterface $http
 */
$options = $options ?? new OAuthOptions($options_arr);
$logger  = $logger ?? new OAuthTestLogger($LOGLEVEL);
$http    = $http ?? new OAuthTestHttpClient($options);
#$http->setLogger($logger);

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = $storage ?? new OAuthExampleSessionStorage($options, $CFGDIR);
#$storage->setLogger($logger);
