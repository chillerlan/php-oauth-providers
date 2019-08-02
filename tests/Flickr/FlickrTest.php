<?php
/**
 * Class FlickrTest
 *
 * @filesource   FlickrTest.php
 * @created      01.01.2018
 * @package      chillerlan\OAuthTest\Providers\Flickr
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Flickr;

use chillerlan\OAuth\Providers\Flickr\Flickr;
use chillerlan\OAuthTest\Providers\OAuth1ProviderTest;

/**
 * @property \chillerlan\OAuth\Providers\Flickr\Flickr $provider
 */
class FlickrTest extends OAuth1ProviderTest{

	protected $FQN = Flickr::class;

}
