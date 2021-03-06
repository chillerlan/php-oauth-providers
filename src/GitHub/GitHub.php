<?php
/**
 * Class GitHub
 *
 * @link https://developer.github.com/apps/building-integrations/setting-up-and-registering-oauth-apps/
 * @link https://developer.github.com/v3/
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\GitHub;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider};

/**
 * @method \Psr\Http\Message\ResponseInterface getUser(string $username)
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class GitHub extends OAuth2Provider implements CSRFToken{

	public const SCOPE_USER             = 'user';
	public const SCOPE_USER_EMAIL       = 'user:email';
	public const SCOPE_USER_FOLLOW      = 'user:follow';
	public const SCOPE_PUBLIC_REPO      = 'public_repo';
	public const SCOPE_REPO             = 'repo';
	public const SCOPE_REPO_DEPLOYMENT  = 'repo_deployment';
	public const SCOPE_REPO_STATUS      = 'repo:status';
	public const SCOPE_REPO_INVITE      = 'repo:invite';
	public const SCOPE_REPO_DELETE      = 'delete_repo';
	public const SCOPE_NOTIFICATIONS    = 'notifications';
	public const SCOPE_GIST             = 'gist';
	public const SCOPE_REPO_HOOK_READ   = 'read:repo_hook';
	public const SCOPE_REPO_HOOK_WRITE  = 'write:repo_hook';
	public const SCOPE_REPO_HOOK_ADMIN  = 'admin:repo_hook';
	public const SCOPE_ORG_HOOK_ADMIN   = 'admin:org_hook';
	public const SCOPE_ORG_READ         = 'read:org';
	public const SCOPE_ORG_WRITE        = 'write:org';
	public const SCOPE_ORG_ADMIN        = 'admin:org';
	public const SCOPE_PUBLIC_KEY_READ  = 'read:public_key';
	public const SCOPE_PUBLIC_KEY_WRITE = 'write:public_key';
	public const SCOPE_PUBLIC_KEY_ADMIN = 'admin:public_key';
	public const SCOPE_GPG_KEY_READ     = 'read:gpg_key';
	public const SCOPE_GPG_KEY_WRITE    = 'write:gpg_key';
	public const SCOPE_GPG_KEY_ADMIN    = 'admin:gpg_key';

	protected string $authURL         = 'https://github.com/login/oauth/authorize';
	protected string $accessTokenURL  = 'https://github.com/login/oauth/access_token';
	protected ?string $apiURL         = 'https://api.github.com';
	protected ?string $userRevokeURL  = 'https://github.com/settings/applications';
	protected ?string $endpointMap    = GitHubEndpoints::class;
	protected ?string $apiDocs        = 'https://developer.github.com/';
	protected ?string $applicationURL = 'https://github.com/settings/developers';
	protected array $authHeaders      = ['Accept' => 'application/json'];
	protected array $apiHeaders       = ['Accept' => 'application/vnd.github.beta+json'];

	protected array $defaultScopes    = [
		self::SCOPE_USER,
		self::SCOPE_USER_EMAIL,
		self::SCOPE_PUBLIC_REPO,
		self::SCOPE_GIST,
	];

}
