<?php
/**
 * Class AzureActiveDirectory
 *
 * @link https://docs.microsoft.com/azure/active-directory/develop/v2-app-types
 *
 * @filesource   AzureActiveDirectory.php
 * @created      29.07.2019
 * @package      chillerlan\OAuth\Providers\Microsoft
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Microsoft;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, TokenExpires};

/**
 */
abstract class AzureActiveDirectory extends OAuth2Provider implements CSRFToken, TokenExpires{

	public const SCOPE_OPENID         = 'openid';
	public const SCOPE_OPENID_EMAIL   = 'email';
	public const SCOPE_OPENID_PROFILE = 'profile';
	public const SCOPE_OFFLINE_ACCESS = 'offline_access';

	protected $authURL        = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize';
	protected $accessTokenURL = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
	protected $userRevokeURL  = 'https://account.live.com/consent/Manage';
	protected $applicationURL = 'https://aad.portal.azure.com/#blade/Microsoft_AAD_IAM/ActiveDirectoryMenuBlade/RegisteredApps';

}
