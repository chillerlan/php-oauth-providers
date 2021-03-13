<?php
/**
 * Class Patreon1Endpoints
 *
 * @filesource   Patreon1Endpoints.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Patreon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Patreon;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 */
class Patreon1Endpoints extends EndpointMap{

	protected string $API_BASE = '/api';

	protected array $currentUser = [
		'path'          => '/current_user',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $currentUserCampaigns = [
		'path'          => '/current_user/campaigns',
		'method'        => 'GET',
		'query'         => ['includes'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	protected array $campaignPledges = [
		'path'          => '/campaigns/%1$s/pledges',
		'method'        => 'GET',
		'query'         => ['include', 'fields'],
		'path_elements' => ['campaign_id'],
		'body'          => null,
		'headers'       => [],
	];

}
