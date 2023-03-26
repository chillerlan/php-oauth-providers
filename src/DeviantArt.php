<?php
/**
 * Class DeviantArt
 *
 * @created      26.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://www.deviantart.com/developers/
 */
class DeviantArt extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	public const SCOPE_BASIC          = 'basic';
	public const SCOPE_BROWSE         = 'browse';
	public const SCOPE_COLLECTION     = 'collection';
	public const SCOPE_COMMENT_POST   = 'comment.post';
	public const SCOPE_FEED           = 'feed';
	public const SCOPE_GALLERY        = 'gallery';
	public const SCOPE_MESSAGE        = 'message';
	public const SCOPE_NOTE           = 'note';
	public const SCOPE_STASH          = 'stash';
	public const SCOPE_USER           = 'user';
	public const SCOPE_USER_MANAGE    = 'user.manage';

	protected string  $authURL        = 'https://www.deviantart.com/oauth2/authorize';
	protected string  $accessTokenURL = 'https://www.deviantart.com/oauth2/token';
	protected string  $apiURL         = 'https://www.deviantart.com/api/v1/oauth2';
	protected ?string $userRevokeURL  = 'https://www.deviantart.com/settings/applications';
	protected ?string $apiDocs        = 'https://www.deviantart.com/developers/';
	protected ?string $applicationURL = 'https://www.deviantart.com/developers/apps';

	protected array $defaultScopes    = [
		self::SCOPE_BASIC,
		self::SCOPE_BROWSE,
	];

}
