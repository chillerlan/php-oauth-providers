<?php
/**
 * Class PatreonAbstract
 *
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Patreon;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, TokenRefresh};

/**
 */
abstract class PatreonAbstract extends OAuth2Provider implements CSRFToken, TokenRefresh{

	protected string $authURL         = 'https://www.patreon.com/oauth2/authorize';
	protected string $accessTokenURL  = 'https://www.patreon.com/api/oauth2/token';
	protected ?string $apiURL         = 'https://www.patreon.com/api/oauth2';
	protected ?string $apiDocs        = 'https://docs.patreon.com/';
	protected ?string $applicationURL = 'https://www.patreon.com/portal/registration/register-clients';

}
