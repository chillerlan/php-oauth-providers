<?php
/**
 * Class PatreonAbstract
 *
 * @filesource   PatreonAbstract.php
 * @created      04.03.2019
 * @package      chillerlan\OAuth\Providers\Patreon
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Patreon;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, TokenExpires, TokenRefresh};

/**
 */
abstract class PatreonAbstract extends OAuth2Provider implements CSRFToken, TokenExpires, TokenRefresh{

	protected $authURL        = 'https://www.patreon.com/oauth2/authorize';
	protected $accessTokenURL = 'https://www.patreon.com/api/oauth2/token';
	protected $apiURL         = 'https://www.patreon.com/api/oauth2';
	protected $apiDocs        = 'https://docs.patreon.com/';
	protected $applicationURL = 'https://www.patreon.com/portal/registration/register-clients';

}
