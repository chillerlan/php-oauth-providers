<?php
/**
 * Class GitLab
 *
 * @link https://docs.gitlab.com/ee/api/oauth2.html
 *
 * @created      29.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\GitLab;

use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, TokenRefresh};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class GitLab extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	protected string $authURL         = 'https://gitlab.com/oauth/authorize';
	protected string $accessTokenURL  = 'https://gitlab.com/oauth/token';
	protected ?string $apiURL         = 'https://gitlab.com/api';
	protected ?string $endpointMap    = GitLabV4Endpoints::class;
	protected ?string $apiDocs        = 'https://docs.gitlab.com/ee/api/README.html';
	protected ?string $applicationURL = 'https://gitlab.com/profile/applications';

}
