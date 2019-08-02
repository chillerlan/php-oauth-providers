<?php
/**
 * Class AmazonTest
 *
 * @filesource   AmazonTest.php
 * @created      10.08.2018
 * @package      chillerlan\OAuthTest\Providers\Amazon
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Amazon;

use chillerlan\OAuth\Providers\Amazon\Amazon;
use chillerlan\OAuthTest\Providers\OAuth2ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Amazon\Amazon $provider
 */
class AmazonTest extends OAuth2ProviderTest{

	protected $FQN = Amazon::class;

}
