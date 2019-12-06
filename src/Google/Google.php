<?php
/**
 * Class Google
 *
 * @link https://developers.google.com/identity/protocols/OAuth2WebServer
 * @link https://developers.google.com/identity/protocols/OAuth2ServiceAccount
 * @link https://developers.google.com/oauthplayground/
 *
 * @filesource   Google.php
 * @created      09.08.2018
 * @package      chillerlan\Google
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Google;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Google extends OAuth2Provider implements CSRFToken{

	public const SCOPE_EMAIL            = 'email';
	public const SCOPE_PROFILE          = 'profile';
	public const SCOPE_USERINFO_EMAIL   = 'https://www.googleapis.com/auth/userinfo.email';
	public const SCOPE_USERINFO_PROFILE = 'https://www.googleapis.com/auth/userinfo.profile';

	protected string $authURL        = 'https://accounts.google.com/o/oauth2/auth';
	protected string $accessTokenURL = 'https://accounts.google.com/o/oauth2/token';
	protected ?string $apiURL         = 'https://www.googleapis.com';
	protected ?string $userRevokeURL  = 'https://myaccount.google.com/permissions';
	protected ?string $endpointMap    = GoogleEndpoints::class;
	protected ?string $apiDocs        = 'https://developers.google.com/oauthplayground/';
	protected ?string $applicationURL = 'https://console.developers.google.com/apis/credentials';

}
