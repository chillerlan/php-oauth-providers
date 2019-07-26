<?php
/**
 * @filesource   musicbrainz-common.php
 * @created      31.07.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\MusicBrainz;

$ENVVAR = 'MUSICBRAINZ';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

/** @var \Psr\Http\Client\ClientInterface $http */
$http = null;

/** @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage */
$storage = null;

require_once __DIR__.'/../provider-example-common.php';

$musicbrainz = new \chillerlan\OAuth\Providers\MusicBrainz\MusicBrainz($http, $storage, $options, $logger);