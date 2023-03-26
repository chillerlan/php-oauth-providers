<?php
/**
 * Class Discogs
 *
 * @created      08.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\OAuth1Provider;
use chillerlan\OAuth\Core\ProviderException;
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * @see https://www.discogs.com/developers/
 * @see https://www.discogs.com/developers/#page:authentication,header:authentication-oauth-flow
 */
class Discogs extends OAuth1Provider{

	protected string  $requestTokenURL = 'https://api.discogs.com/oauth/request_token';
	protected string  $authURL         = 'https://www.discogs.com/oauth/authorize';
	protected string  $accessTokenURL  = 'https://api.discogs.com/oauth/access_token';
	protected string  $apiURL          = 'https://api.discogs.com';
	protected ?string $revokeURL       = 'https://www.discogs.com/oauth/revoke'; // ?access_key=<TOKEN>
	protected ?string $userRevokeURL   = 'https://www.discogs.com/settings/applications';
	protected ?string $apiDocs         = 'https://www.discogs.com/developers/';
	protected ?string $applicationURL  = 'https://www.discogs.com/settings/developers';
	protected array   $apiHeaders      = ['Accept' => 'application/vnd.discogs.v2.discogs+json'];

}
