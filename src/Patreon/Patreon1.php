<?php
/**
 * Class Patreon1
 *
 * @link https://docs.patreon.com/
 * @link https://docs.patreon.com/#oauth
 *
 * @filesource   Patreon1.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Patreon1
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Patreon;

/**
 * @method \Psr\Http\Message\ResponseInterface campaignPledges(string $campaign_id, array $params = ['include', 'fields'])
 * @method \Psr\Http\Message\ResponseInterface currentUser()
 * @method \Psr\Http\Message\ResponseInterface currentUserCampaigns(array $params = ['includes'])
 */
class Patreon1 extends PatreonAbstract{

	public const SCOPE_USERS         = 'users';
	public const SCOPE_PLEDGES_TO_ME = 'pledges-to-me';
	public const SCOPE_MY_CAMPAIGN   = 'my-campaign';

	protected $endpointMap    = Patreon1Endpoints::class;

}
