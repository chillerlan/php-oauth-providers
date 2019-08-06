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

	protected $apiURL             = 'https://api.soundcloud.com';
	protected $authURL            = 'https://soundcloud.com/connect';
	protected $accessTokenURL     = 'https://api.soundcloud.com/oauth2/token';
	protected $userRevokeURL      = 'https://soundcloud.com/settings/connections';
	protected $authMethod         = self::HEADER_OAUTH;
	protected $endpointMap        = SoundCloudEndpoints::class;
	protected $apiDocs            = 'https://developers.soundcloud.com/';
	protected $applicationURL     = 'https://soundcloud.com/you/apps';

}
