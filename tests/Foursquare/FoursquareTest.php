<?php
/**
 * Class FoursquareTest
 *
 * @filesource   FoursquareTest.php
 * @created      10.08.2018
 * @package      chillerlan\OAuthTest\Providers\Foursquare
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Foursquare;

use chillerlan\OAuth\Providers\Foursquare\Foursquare;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Foursquare\Foursquare $provider
 */
class FoursquareTest extends OAuth2ProviderTestAbstract{

	protected $FQN = Foursquare::class;

}
