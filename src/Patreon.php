<?php
/**
 * Class Patreon
 *
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\ResponseInterface;
use function explode;
use function in_array;
use function sprintf;

/**
 * @see https://docs.patreon.com/
 * @see https://docs.patreon.com/#oauth
 * @see https://docs.patreon.com/#apiv2-oauth
 */
class Patreon extends OAuth2Provider implements CSRFToken, TokenRefresh{

	public const SCOPE_V1_USERS                     = 'users';
	public const SCOPE_V1_PLEDGES_TO_ME             = 'pledges-to-me';
	public const SCOPE_V1_MY_CAMPAIGN               = 'my-campaign';

	// wow, consistency...
	public const SCOPE_V2_IDENTITY                  = 'identity';
	public const SCOPE_V2_IDENTITY_EMAIL            = 'identity[email]';
	public const SCOPE_V2_IDENTITY_MEMBERSHIPS      = 'identity.memberships';
	public const SCOPE_V2_CAMPAIGNS                 = 'campaigns';
	public const SCOPE_V2_CAMPAIGNS_WEBHOOK         = 'w:campaigns.webhook';
	public const SCOPE_V2_CAMPAIGNS_MEMBERS         = 'campaigns.members';
	public const SCOPE_V2_CAMPAIGNS_MEMBERS_EMAIL   = 'campaigns.members[email]';
	public const SCOPE_V2_CAMPAIGNS_MEMBERS_ADDRESS = 'campaigns.members.address';

	protected string  $authURL        = 'https://www.patreon.com/oauth2/authorize';
	protected string  $accessTokenURL = 'https://www.patreon.com/api/oauth2/token';
	protected string  $apiURL         = 'https://www.patreon.com/api/oauth2';
	protected ?string $apiDocs        = 'https://docs.patreon.com/';
	protected ?string $applicationURL = 'https://www.patreon.com/portal/registration/register-clients';

	protected array   $defaultScopes  = [
		self::SCOPE_V2_IDENTITY,
		self::SCOPE_V2_IDENTITY_EMAIL,
		self::SCOPE_V2_IDENTITY_MEMBERSHIPS,
		self::SCOPE_V2_CAMPAIGNS,
		self::SCOPE_V2_CAMPAIGNS_MEMBERS,
	];

}
