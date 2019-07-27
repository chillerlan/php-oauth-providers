<?php
/**
 * Class DeviantArt
 *
 * @filesource   DeviantArt.php
 * @created      26.10.2017
 * @package      chillerlan\OAuth\Providers\DeviantArt
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\DeviantArt;

use chillerlan\OAuth\Core\{
	ClientCredentials, CSRFToken, OAuth2CSRFTokenTrait, OAuth2ClientCredentialsTrait,
	OAuth2Provider, OAuth2TokenRefreshTrait, TokenExpires, TokenRefresh,
};

/**
 * @method \Psr\Http\Message\ResponseInterface whoami()
 */
class DeviantArt extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenExpires, TokenRefresh{
	use OAuth2CSRFTokenTrait, OAuth2ClientCredentialsTrait, OAuth2TokenRefreshTrait;

	public const SCOPE_BASIC        = 'basic';
	public const SCOPE_BROWSE       = 'browse';
	public const SCOPE_COLLECTION   = 'collection';
	public const SCOPE_COMMENT_POST = 'comment.post';
	public const SCOPE_FEED         = 'feed';
	public const SCOPE_GALLERY      = 'gallery';
	public const SCOPE_MESSAGE      = 'message';
	public const SCOPE_NOTE         = 'note';
	public const SCOPE_STASH        = 'stash';
	public const SCOPE_USER         = 'user';
	public const SCOPE_USER_MANAGE  = 'user.manage';

	protected $apiURL         = 'https://www.deviantart.com/api/v1/oauth2';
	protected $authURL        = 'https://www.deviantart.com/oauth2/authorize';
	protected $accessTokenURL = 'https://www.deviantart.com/oauth2/token';
	protected $userRevokeURL  = 'https://www.deviantart.com/settings/applications';
	protected $endpointMap    = DeviantArtEndpoints::class;

}
