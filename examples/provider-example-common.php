<?php
/**
 * @created      26.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;

/**
 * allow to use a different autoloader to make it easier to use the examples (@todo: WIP)
 *
 * @var string $AUTOLOADER - path to an alternate autoloader
 */
require_once ($AUTOLOADER ?? __DIR__.'/../vendor/autoload.php');
require_once __DIR__.'/OAuthProviderFactory.php';

/**
 * these vars are supposed to be set before this file is included to ease testing
 *
 * @var string     $ENVFILE  - the name of the .env file in case it differs from the default
 * @var string     $ENVVAR   - name prefix for the environment variable
 * @var string     $CFGDIR   - the directory where configuration is stored (.env, cacert, tokens)
 * @var string     $LOGLEVEL - log level for the test logger, use 'none' to suppress logging
 * @var array|null $PARAMS   - additional params to pass to getAuthURL()
 * @var array|null $SCOPES   - a set of scopes for the current provider (OAuth2 only)
 */
$ENVFILE  ??= '.env';
$ENVVAR   ??= '';
$CFGDIR   ??= __DIR__.'/../config';
$LOGLEVEL ??= 'info';
$PARAMS   ??= null;
$SCOPES   ??= null;

$httpFactory = new HttpFactory;
$http        = new Client([
	'verify'  => $CFGDIR.'/cacert.pem',
	'headers' => [
		'User-Agent' => 'chillerlanPhpOAuth/5.0.0 +https://github.com/chillerlan/php-oauth-core',
	],
]);

$factory = new OAuthProviderFactory($http, $httpFactory, $httpFactory, $httpFactory, $CFGDIR, $ENVFILE, $LOGLEVEL);
