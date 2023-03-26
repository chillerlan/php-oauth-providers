<?php
/**
 * Class OpenCaching
 *
 * @created      04.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\OAuth1Provider;
use chillerlan\OAuth\Core\ProviderException;
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://www.opencaching.de/okapi/
 */
class OpenCaching extends OAuth1Provider{

	protected string  $requestTokenURL = 'https://www.opencaching.de/okapi/services/oauth/request_token';
	protected string  $authURL         = 'https://www.opencaching.de/okapi/services/oauth/authorize';
	protected string  $accessTokenURL  = 'https://www.opencaching.de/okapi/services/oauth/access_token';
	protected string  $apiURL          = 'https://www.opencaching.de/okapi/services';
	protected ?string $userRevokeURL   = 'https://www.opencaching.de/okapi/apps/';
	protected ?string $apiDocs         = 'https://www.opencaching.de/okapi/';
	protected ?string $applicationURL  = 'https://www.opencaching.de/okapi/signup.html';

}
