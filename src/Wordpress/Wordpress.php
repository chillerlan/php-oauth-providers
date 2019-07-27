<?php
/**
 * Class Wordpress
 *
 * @link https://developer.wordpress.com/docs/oauth2/
 *
 * @filesource   Wordpress.php
 * @created      26.10.2017
 * @package      chillerlan\OAuth\Providers\Wordpress
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

	protected $apiURL         = 'https://public-api.wordpress.com/rest/v1';
	protected $authURL        = 'https://public-api.wordpress.com/oauth2/authorize';
	protected $accessTokenURL = 'https://public-api.wordpress.com/oauth2/token';
	protected $userRevokeURL  = 'https://wordpress.com/me/security/connected-applications';
	protected $endpointMap    = WordpressEndpoints::class;
	protected $apiDocs        = 'https://developer.wordpress.com/docs/api/';
	protected $applicationURL = 'https://developer.wordpress.com/apps/';

}
