<?php
/**
 * Class GitLab
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://docs.gitlab.com/ee/api/oauth2.html
 */
class GitLab extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	protected string  $authURL        = 'https://gitlab.com/oauth/authorize';
	protected string  $accessTokenURL = 'https://gitlab.com/oauth/token';
	protected string  $apiURL         = 'https://gitlab.com/api';
	protected ?string $apiDocs        = 'https://docs.gitlab.com/ee/api/README.html';
	protected ?string $applicationURL = 'https://gitlab.com/profile/applications';

}
