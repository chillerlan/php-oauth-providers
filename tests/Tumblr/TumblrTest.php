<?php
/**
 * Class TumblrTest
 *
 * @created      01.01.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Tumblr;

use chillerlan\OAuth\Providers\Tumblr\Tumblr;
use chillerlan\OAuthTest\Providers\OAuth1ProviderTestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Tumblr\Tumblr $provider
 */
class TumblrTest extends OAuth1ProviderTestAbstract{

	protected string $FQN = Tumblr::class;

}
