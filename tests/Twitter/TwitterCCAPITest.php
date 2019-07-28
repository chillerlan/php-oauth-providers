<?php
/**
 * Class TwitterCCAPITest
 *
 * @filesource   TwitterCCAPITest.php
 * @created      26.10.2017
 * @package      chillerlan\OAuthTest\Providers\Twitter
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitter;


use chillerlan\OAuth\Providers\Twitter\TwitterCC;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Twitter\TwitterCC $provider
 */
class TwitterCCAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = TwitterCC::class;
	protected $ENV = 'TWITTER';

}
