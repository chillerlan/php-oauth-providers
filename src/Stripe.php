<?php
/**
 * Class Stripe
 *
 * @created      09.08.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://stripe.com/docs/api
 * @see https://stripe.com/docs/connect/authentication
 * @see https://stripe.com/docs/connect/oauth-reference
 * @see https://stripe.com/docs/connect/standard-accounts
 * @see https://gist.github.com/amfeng/3507366
 */
class Stripe extends OAuth2Provider implements CSRFToken, TokenRefresh{

	public const SCOPE_READ_WRITE     = 'read_write';
	public const SCOPE_READ_ONLY      = 'read_only';

	protected string  $authURL        = 'https://connect.stripe.com/oauth/authorize';
	protected string  $accessTokenURL = 'https://connect.stripe.com/oauth/token';
	protected string  $apiURL         = 'https://api.stripe.com/v1';
	protected ?string $revokeURL      = 'https://connect.stripe.com/oauth/deauthorize';
	protected ?string $userRevokeURL  = 'https://dashboard.stripe.com/account/applications';
	protected ?string $apiDocs        = 'https://stripe.com/docs/api';
	protected ?string $applicationURL = 'https://dashboard.stripe.com/apikeys';

	protected array $defaultScopes    = [
		self::SCOPE_READ_ONLY,
	];

}
