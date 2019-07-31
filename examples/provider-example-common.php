<?php
/**
 * @filesource   provider-example-common.php
 * @created      26.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples;

require_once __DIR__.'/../vendor/autoload.php';

$CFGDIR = __DIR__.'/../config';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

require_once __DIR__.'/../vendor/chillerlan/php-oauth-core/examples/oauth-example-common.php';

