<?php
/**
 * Class OAuthAPITest
 *
 * @filesource   OAuthAPITest.php
 * @created      02.08.2019
 * @package      chillerlan\OAuthTest\Providers
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\OAuthTest\API\OAuthAPITestAbstract;

/**
 * @property \chillerlan\OAuth\Core\OAuthInterface $provider
 */
abstract class OAuthAPITest extends OAuthAPITestAbstract{

	protected string $CFG = __DIR__.'/../config';

}
