<?php
/**
 * Class PatreonAPITestAbstract
 *
 * @filesource   PatreonAPITestAbstract.php
 * @created      04.03.2019
 * @package      chillerlan\OAuthTest\Providers\Patreon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Patreon;

use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

abstract class PatreonAPITestAbstract extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';

}
