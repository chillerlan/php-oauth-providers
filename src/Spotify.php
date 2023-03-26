<?php
/**
 * Class Spotify
 *
 * @created      06.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{ClientCredentials, CSRFToken, OAuth2Provider, ProviderException, TokenRefresh};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://developer.spotify.com/web-api
 * @see https://beta.developer.spotify.com/documentation/general/guides/authorization-guide/
 */
class Spotify extends OAuth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	/**
	 * @see https://developer.spotify.com/documentation/general/guides/scopes/
	 */
	// images
	public const SCOPE_UGC_IMAGE_UPLOAD            = 'ugc-image-upload';
	// playlists
	public const SCOPE_PLAYLIST_MODIFY_PRIVATE     = 'playlist-modify-private';
	public const SCOPE_PLAYLIST_READ_PRIVATE       = 'playlist-read-private';
	public const SCOPE_PLAYLIST_MODIFY_PUBLIC      = 'playlist-modify-public';
	public const SCOPE_PLAYLIST_READ_COLLABORATIVE = 'playlist-read-collaborative';
	// users
	public const SCOPE_USER_READ_PRIVATE           = 'user-read-private';
	public const SCOPE_USER_READ_EMAIL             = 'user-read-email';
	// spotify connect
	public const SCOPE_USER_READ_PLAYBACK_STATE    = 'user-read-playback-state';
	public const SCOPE_USER_MODIFY_PLAYBACK_STATE  = 'user-modify-playback-state';
	public const SCOPE_USER_READ_CURRENTLY_PLAYING = 'user-read-currently-playing';
	// library
	public const SCOPE_USER_LIBRARY_MODIFY         = 'user-library-modify';
	public const SCOPE_USER_LIBRARY_READ           = 'user-library-read';
	// listening history
	public const SCOPE_USER_READ_PLAYBACK_POSITION = 'user-read-playback-position';
	public const SCOPE_USER_READ_RECENTLY_PLAYED   = 'user-read-recently-played';
	public const SCOPE_USER_TOP_READ               = 'user-top-read';
	// playback
#	public const SCOPE_APP_REMOTE_CONTROL          = 'app-remote-control'; // currently only on ios and android
	public const SCOPE_STREAMING                   = 'streaming'; // web playback SDK
	// follow
	public const SCOPE_USER_FOLLOW_MODIFY          = 'user-follow-modify';
	public const SCOPE_USER_FOLLOW_READ            = 'user-follow-read';

	protected string  $authURL                     = 'https://accounts.spotify.com/authorize';
	protected string  $accessTokenURL              = 'https://accounts.spotify.com/api/token';
	protected string  $apiURL                      = 'https://api.spotify.com';
	protected ?string $userRevokeURL               = 'https://www.spotify.com/account/apps/';
	protected ?string $apiDocs                     = 'https://developer.spotify.com/documentation/web-api/';
	protected ?string $applicationURL              = 'https://developer.spotify.com/dashboard/applications';

	protected array   $defaultScopes               = [
		self::SCOPE_PLAYLIST_READ_COLLABORATIVE,
		self::SCOPE_PLAYLIST_MODIFY_PUBLIC,
		self::SCOPE_USER_FOLLOW_MODIFY,
		self::SCOPE_USER_FOLLOW_READ,
		self::SCOPE_USER_LIBRARY_READ,
		self::SCOPE_USER_LIBRARY_MODIFY,
		self::SCOPE_USER_TOP_READ,
		self::SCOPE_USER_READ_EMAIL,
		self::SCOPE_STREAMING,
		self::SCOPE_USER_READ_PLAYBACK_STATE,
		self::SCOPE_USER_MODIFY_PLAYBACK_STATE,
		self::SCOPE_USER_READ_CURRENTLY_PLAYING,
		self::SCOPE_USER_READ_RECENTLY_PLAYED,
	];

	/**
	 * @inheritDoc
	 */
	public function me():ResponseInterface{
		$response = $this->request('/v1/me');
		$status   = $response->getStatusCode();

		if($status === 200){
			return $response;
		}

		$json = MessageUtil::decodeJSON($response);

		if(isset($json->error, $json->error->message)){
			throw new ProviderException($json->error->message);
		}

		throw new ProviderException(sprintf('user info error error HTTP/%s', $status));
	}

}
