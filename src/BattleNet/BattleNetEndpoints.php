<?php
/**
 * Class BattleNetEndpoints
 *
 * @filesource   BattleNetEndpoints.php
 * @created      02.08.2019
 * @package      chillerlan\OAuth\Providers\BattleNet
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\BattleNet;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @link https://develop.battle.net/documentation/api-reference
 */
class BattleNetEndpoints extends EndpointMap{

	protected $userinfo = [
		'path'          => '/oauth/userinfo',
		'method'        => 'GET',
		'query'         => ['access_token'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
