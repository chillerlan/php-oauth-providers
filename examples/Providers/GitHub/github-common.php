<?php
/**
 * @created      09.01.2022
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2022 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthAppExamples\GitHub;

use chillerlan\OAuth\Core\AccessToken;
use chillerlan\OAuth\Providers\GitHub;

$ENVVAR = 'GITHUB';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \Psr\Log\LoggerInterface $logger
 * @var string $CFGDIR
 */

require_once __DIR__.'/../../provider-example-common.php';

$github = new GitHub($http, $options, $logger);
$github->setStorage($storage);

if(!$storage->hasAccessToken('GitHub')){
	$token = (new AccessToken)->fromJSON(file_get_contents($CFGDIR.'/GitHub.token.json'));
	$github->storeAccessToken($token);
}
