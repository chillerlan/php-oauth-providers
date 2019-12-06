<?php
/**
 * Class Imgur
 *
 * @link https://apidocs.imgur.com/
 *
 * Note: imgur sends an "expires_in" of 315360000 (10 years!) for access tokens,
 *       but states in the docs that tokens expire after one month.
 *       Either manually saving the expiry with the token to trigger auto refresh
 *       or manually refreshing via the refreshAccessToken() method is required.
 *
 * @filesource   Imgur.php
 * @created      28.07.2019
 * @package      chillerlan\OAuth\Providers\Imgur
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Imgur;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, TokenRefresh};

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Imgur extends OAuth2Provider implements CSRFToken, TokenRefresh{

	protected string $authURL         = 'https://api.imgur.com/oauth2/authorize';
	protected string $accessTokenURL  = 'https://api.imgur.com/oauth2/token';
	protected ?string $apiURL         = 'https://api.imgur.com';
	protected ?string $userRevokeURL  = 'https://imgur.com/account/settings/apps';
	protected ?string $endpointMap    = ImgurEndpoints::class;
	protected ?string $apiDocs        = 'https://apidocs.imgur.com';
	protected ?string $applicationURL = 'https://api.imgur.com/oauth2/addclient';

}
