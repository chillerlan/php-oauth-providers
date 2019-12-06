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

	protected string $authURL         = 'https://gitter.im/login/oauth/authorize';
	protected string $accessTokenURL  = 'https://gitter.im/login/oauth/token';
	protected string $scopesDelimiter = ',';
	protected ?string $apiURL         = 'https://api.gitter.im/v1';
	protected ?string $endpointMap    = GitterEndpoints::class;
	protected ?string $apiDocs        = 'https://developer.gitter.im';
	protected ?string $applicationURL = 'https://developer.gitter.im/apps';

}
