<?php
/**
 * Class SoundCloud
 *
 * @link https://developers.soundcloud.com/
 * @link https://developers.soundcloud.com/docs/api/guide#authentication
 *
 * @filesource   SoundCloud.php
 * @created      22.10.2017
 * @package      chillerlan\OAuth\Providers\SoundCloud
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\SoundCloud;

use chillerlan\OAuth\Core\{OAuth2Provider};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 * @method \Psr\Http\Message\ResponseInterface user(string $id)
 */
class SoundCloud extends OAuth2Provider{

	public const SCOPE_NONEXPIRING = 'non-expiring';
#	public const SCOPE_EMAIL       = 'email'; // ???

	protected string $authURL          = 'https://soundcloud.com/connect';
	protected string $accessTokenURL   = 'https://api.soundcloud.com/oauth2/token';
	protected ?string $apiURL          = 'https://api.soundcloud.com';
	protected ?string $userRevokeURL   = 'https://soundcloud.com/settings/connections';
	protected ?string $endpointMap     = SoundCloudEndpoints::class;
	protected ?string $apiDocs         = 'https://developers.soundcloud.com/';
	protected ?string $applicationURL  = 'https://soundcloud.com/you/apps';
	protected string $authMethodHeader = 'OAuth';

}
