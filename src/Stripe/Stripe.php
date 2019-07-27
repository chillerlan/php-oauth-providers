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

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, TokenExpires, TokenRefresh};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Stripe extends OAuth2Provider implements CSRFToken, TokenExpires, TokenRefresh{

	public const SCOPE_READ_WRITE = 'read_write';
	public const SCOPE_READ_ONLY  = 'read_only';

	protected $apiURL         = 'https://api.stripe.com/v1';
	protected $authURL        = 'https://connect.stripe.com/oauth/authorize';
	protected $accessTokenURL = 'https://connect.stripe.com/oauth/token';
	protected $revokeURL      = 'https://connect.stripe.com/oauth/deauthorize';
	protected $userRevokeURL  = 'https://dashboard.stripe.com/account/applications';
	protected $endpointMap    = StripeEndpoints::class;
	protected $apiDocs        = 'https://stripe.com/docs/api';
	protected $applicationURL = 'https://dashboard.stripe.com/apikeys';

}
