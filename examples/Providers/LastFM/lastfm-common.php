<?php
/**
 * @filesource   lastfm-common.php
 * @created      03.08.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Providers\LastFM;

use chillerlan\OAuth\Core\AccessToken;
use chillerlan\OAuth\Providers\LastFM;
use function file_get_contents;

$ENVVAR = 'LASTFM';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \Psr\Log\LoggerInterface $logger
 * @var string $CFGDIR
 */

require_once __DIR__.'/../provider-api-example-common.php';

$lfm = new LastFM($http, $options, $logger);
$lfm->setStorage($storage);

if(!$storage->hasAccessToken()){
	$token = (new AccessToken)->fromJSON(file_get_contents(($CFGDIR ?? '').'/LastFM.token.json'));
	$lfm->storeAccessToken($token);
}
