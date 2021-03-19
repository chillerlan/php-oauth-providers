<?php
/**
 * Class SlackEndpoints
 *
 * @created      20.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Slack;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @todo: abstract class for the different endpoint types
 *
 * @link https://api.slack.com/web
 * @link https://api.slack.com/events-api
 * @link https://api.slack.com/docs/conversations-api
 * @link https://api.slack.com/rtm
 */
class SlackEndpoints extends EndpointMap{

	protected array $userIdentity = [
		'path'          => '/users.identity',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
