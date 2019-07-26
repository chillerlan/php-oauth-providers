<?php
/**
 * Class Twitter2APITest
 *
 * @filesource   Twitter2APITest.php
 * @created      26.10.2017
 * @package      chillerlan\OAuthTest\Providers\Twitter
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitter;


use chillerlan\OAuth\Providers\Twitter\Twitter2;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\Twitter\Twitter2 $provider
 */
class Twitter2APITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Twitter2::class;
	protected $ENV = 'TWITTER';

}
