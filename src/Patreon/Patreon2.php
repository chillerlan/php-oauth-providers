<?php
/**
 * Class Patreon2
 *
 * @link https://docs.patreon.com/#apiv2-oauth
 *
 * @created      09.08.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Patreon;

/**
 * @method \Psr\Http\Message\ResponseInterface campaignId(string $campaign_id, array $params = ['fields[campaign]'])
 * @method \Psr\Http\Message\ResponseInterface campaignIdMembers(string $campaign_id, array $params = ['fields[member]', 'fields[tier]'])
 * @method \Psr\Http\Message\ResponseInterface campaigns(array $params = ['fields[campaign]'])
 * @method \Psr\Http\Message\ResponseInterface createWebhook(array $body = ['data'])
 * @method \Psr\Http\Message\ResponseInterface identity(array $params = ['include', 'fields[user]'])
 * @method \Psr\Http\Message\ResponseInterface memberId(string $member_id, array $params = ['fields[member]', 'fields[tier]', 'fields[user]'])
 * @method \Psr\Http\Message\ResponseInterface webhooks(array $params = ['fields[webhook]'])
 */
class Patreon2 extends PatreonAbstract{

	// wow, consistency...
	public const  SCOPE_IDENTITY                  = 'identity';
	public const  SCOPE_IDENTITY_EMAIL            = 'identity[email]';
	public const  SCOPE_IDENTITY_MEMBERSHIPS      = 'identity.memberships';
	public const  SCOPE_CAMPAIGNS                 = 'campaigns';
	public const  SCOPE_CAMPAIGNS_WEBHOOK         = 'w:campaigns.webhook';
	public const  SCOPE_CAMPAIGNS_MEMBERS         = 'campaigns.members';
	public const  SCOPE_CAMPAIGNS_MEMBERS_EMAIL   = 'campaigns.members[email]';
	public const  SCOPE_CAMPAIGNS_MEMBERS_ADDRESS = 'campaigns.members.address';

	protected ?string $endpointMap = Patreon2Endpoints::class;

	protected array $defaultScopes = [
		self::SCOPE_IDENTITY,
		self::SCOPE_IDENTITY_EMAIL,
		self::SCOPE_IDENTITY_MEMBERSHIPS,
		self::SCOPE_CAMPAIGNS,
		self::SCOPE_CAMPAIGNS_MEMBERS,
	];

}
