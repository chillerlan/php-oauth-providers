<?php
/**
 * Class Patreon2Endpoints
 *
 * @filesource   Patreon2Endpoints.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Patreon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Patreon;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 */
class Patreon2Endpoints extends EndpointMap{

	protected $API_BASE = '/v2';

	protected $identity = [
		'path'          => '/identity',
		'method'        => 'GET',
		'query'         => ['include', 'fields[user]'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $campaigns = [
		'path'          => '/campaigns',
		'method'        => 'GET',
		'query'         => ['fields[campaign]'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $campaignId = [
		'path'          => '/campaigns/%1$s',
		'method'        => 'GET',
		'query'         => ['fields[campaign]'],
		'path_elements' => ['campaign_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $campaignIdMembers = [
		'path'          => '/campaigns/%1$s/members',
		'method'        => 'GET',
		'query'         => ['fields[member]', 'fields[tier]'],
		'path_elements' => ['campaign_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $memberId = [
		'path'          => '/members/%1$s',
		'method'        => 'GET',
		'query'         => ['fields[member]', 'fields[tier]', 'fields[user]'],
		'path_elements' => ['member_id'],
		'body'          => null,
		'headers'       => [],
	];

	protected $webhooks = [
		'path'          => '/webhooks',
		'method'        => 'GET',
		'query'         => ['fields[webhook]'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected $createWebhook = [
		'path'          => '/webhooks',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['data'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

}
