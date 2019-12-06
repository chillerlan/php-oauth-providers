<?php
/**
 * Class Stripe
 *
 * @link https://stripe.com/docs/api
 * @link https://stripe.com/docs/connect/authentication
 * @link https://stripe.com/docs/connect/oauth-reference
 * @link https://stripe.com/docs/connect/standard-accounts
 * @link https://gist.github.com/amfeng/3507366
 *
 * @filesource   Stripe.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Stripe
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Stripe;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, TokenRefresh};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Stripe extends OAuth2Provider implements CSRFToken, TokenRefresh{

	public const SCOPE_READ_WRITE = 'read_write';
	public const SCOPE_READ_ONLY  = 'read_only';

	protected string $authURL         = 'https://connect.stripe.com/oauth/authorize';
	protected string $accessTokenURL  = 'https://connect.stripe.com/oauth/token';
	protected ?string $apiURL         = 'https://api.stripe.com/v1';
	protected ?string $revokeURL      = 'https://connect.stripe.com/oauth/deauthorize';
	protected ?string $userRevokeURL  = 'https://dashboard.stripe.com/account/applications';
	protected ?string $endpointMap    = StripeEndpoints::class;
	protected ?string $apiDocs        = 'https://stripe.com/docs/api';
	protected ?string $applicationURL = 'https://dashboard.stripe.com/apikeys';

}
