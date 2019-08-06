<?php
/**
 * Class Gitter
 *
 * @link https://developer.gitter.im/
 * @link https://developer.gitter.im/docs/authentication
 *
 * @filesource   Gitter.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Gitter
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Gitter;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Gitter extends OAuth2Provider implements CSRFToken{

	public const SCOPE_FLOW    = 'flow';
	public const SCOPE_PRIVATE = 'private';

	protected $apiURL          = 'https://api.gitter.im/v1';
	protected $authURL         = 'https://gitter.im/login/oauth/authorize';
	protected $accessTokenURL  = 'https://gitter.im/login/oauth/token';
	protected $scopesDelimiter = ',';
	protected $endpointMap     = GitterEndpoints::class;
	protected $apiDocs         = 'https://developer.gitter.im';
	protected $applicationURL  = 'https://developer.gitter.im/apps';

}
