<?php
/**
 * Class Wordpress
 *
 * @link https://developer.wordpress.com/docs/oauth2/
 *
 * @created      26.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Wordpress;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Wordpress extends OAuth2Provider implements CSRFToken{

	public const SCOPE_AUTH   = 'auth';
	public const SCOPE_GLOBAL = 'global';

	protected string $authURL         = 'https://public-api.wordpress.com/oauth2/authorize';
	protected string $accessTokenURL  = 'https://public-api.wordpress.com/oauth2/token';
	protected ?string $apiURL         = 'https://public-api.wordpress.com/rest/v1';
	protected ?string $userRevokeURL  = 'https://wordpress.com/me/security/connected-applications';
	protected ?string $endpointMap    = WordpressEndpoints::class;
	protected ?string $apiDocs        = 'https://developer.wordpress.com/docs/api/';
	protected ?string $applicationURL = 'https://developer.wordpress.com/apps/';

	protected array $defaultScopes    = [
		self::SCOPE_GLOBAL,
	];

}
