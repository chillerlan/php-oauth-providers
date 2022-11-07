<?php
/**
 * @created      26.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 *
 * @phan-file-suppress PhanUndeclaredClassMethod, PhanInvalidCommentForDeclarationType
 */

namespace chillerlan\OAuthExamples;

use chillerlan\DotEnv\DotEnv;
use chillerlan\HTTP\HTTPOptionsTrait;
use chillerlan\HTTP\Psr18\CurlClient;
use chillerlan\OAuth\OAuthOptions;
use chillerlan\OAuth\Storage\SessionStorage;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\{NullHandler, StreamHandler};
use Monolog\Logger;

use function ini_set;

/**
 * allow to use a different autoloader to make it easier to use the examples (@todo: WIP)
 *
 * @var string $AUTOLOADER - path to an alternate autoloader
 */
require_once $AUTOLOADER ?? __DIR__.'/../vendor/autoload.php';

ini_set('date.timezone', 'Europe/Amsterdam');

/**
 * these vars are supposed to be set before this file is included
 *
 * @var string $ENVFILE  - the name of the .env file in case it differs from the default
 * @var string $ENVVAR   - name prefix for the environment variable
 * @var string $CFGDIR   - the directory where configuration is stored (.env, cacert, tokens)
 * @var string $LOGLEVEL - log level for the test logger, use 'none' to suppress logging
 * @var array  $SCOPES   - a set of scopes for the current provider (OAuth2 only)
 */
$ENVFILE  ??= '.env';
$ENVVAR   ??= '';
$CFGDIR   ??= __DIR__.'/../config';
$LOGLEVEL ??= 'info';
$SCOPES   ??= null;

$env = (new DotEnv($CFGDIR, $ENVFILE, false))->load();

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
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 */
$options = $options ?? new class($options_arr) extends OAuthOptions{ use HTTPOptionsTrait; };
$logger  = new Logger('oauthProviderExample', [new NullHandler]);

if($LOGLEVEL){
	$formatter = new LineFormatter(null, 'Y-m-d H:i:s', true, true);
	$formatter->setJsonPrettyPrint(true);

	$logHandler = (new StreamHandler('php://stdout', $LOGLEVEL))->setFormatter($formatter);

	$logger->pushHandler($logHandler);
}

$http    = new CurlClient($options);
$storage = new SessionStorage($options);

#$http->setLogger($logger);
#$storage->setLogger($logger);
