<?php
/**
 * @link https://www.instagram.com/developer/authentication/
 *
 * @created      10.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\Instagram;

$ENVVAR ??= 'INSTAGRAM';

require_once __DIR__.'/../provider-example-common.php';

/** @var \OAuthProviderFactory $factory */
$provider = $factory->getProvider(Instagram::class, $ENVVAR);

require_once __DIR__.'/_flow-oauth2.php';

exit;
