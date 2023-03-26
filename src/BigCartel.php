<?php
/**
 * Class BigCartel
 *
 * @created      10.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, ProviderException};
use Psr\Http\Message\ResponseInterface;
use function sprintf;

/**
 * BigCartel OAuth
 *
 * @see https://developers.bigcartel.com/api/v1
 * @see https://bigcartel.wufoo.com/confirm/big-cartel-api-application/
 */
class BigCartel extends OAuth2Provider implements CSRFToken{

	protected string  $authURL        = 'https://my.bigcartel.com/oauth/authorize';
	protected string  $accessTokenURL = 'https://api.bigcartel.com/oauth/token';
	protected string  $apiURL         = 'https://api.bigcartel.com/v1';
	protected ?string $userRevokeURL  = 'https://my.bigcartel.com/account';
	protected ?string $revokeURL      = 'https://api.bigcartel.com/oauth/deauthorize/{ACCOUNT_ID}'; // @todo
	protected ?string $apiDocs        = 'https://developers.bigcartel.com/api/v1';
	protected ?string $applicationURL = 'https://bigcartel.wufoo.com/forms/big-cartel-api-application/';
	protected array   $apiHeaders     = ['Accept' => 'application/vnd.api+json'];

}
