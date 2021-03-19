<?php
/**
 * Class BattleNetEndpoints
 *
 * @created      02.08.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\BattleNet;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://develop.battle.net/documentation/api-reference
 */
class BattleNetEndpoints extends EndpointMap{

	protected array $userinfo = [
		'path'          => '/oauth/userinfo',
		'method'        => 'GET',
		'query'         => ['access_token'],
		'path_elements' => null,
		'body'          => null,
		'headers'       => null,
	];

}
