<?php
/**
 * Class GitLab
 *
 * @link https://docs.gitlab.com/ee/api/oauth2.html
 *
 * @filesource   GitLab.php
 * @created      29.07.2019
 * @package      chillerlan\OAuth\Providers\GitLab
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\GitLab;

use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, TokenExpires, TokenRefresh};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class GitLab extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenExpires, TokenRefresh{

	protected $apiURL         = 'https://gitlab.com/api';
	protected $authURL        = 'https://gitlab.com/oauth/authorize';
	protected $accessTokenURL = 'https://gitlab.com/oauth/token';
	protected $endpointMap    = GitLabV4Endpoints::class;
	protected $apiDocs        = 'https://docs.gitlab.com/ee/api/README.html';
	protected $applicationURL = 'https://gitlab.com/profile/applications';

}
