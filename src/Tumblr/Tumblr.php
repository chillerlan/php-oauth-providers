<?php
/**
 * Class Tumblr
 *
 * @link https://www.tumblr.com/docs/en/api/v2
 *
 * @created      22.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Tumblr;

use chillerlan\OAuth\Core\OAuth1Provider;

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class Tumblr extends OAuth1Provider{

	protected string $requestTokenURL = 'https://www.tumblr.com/oauth/request_token';
	protected string $authURL         = 'https://www.tumblr.com/oauth/authorize';
	protected string $accessTokenURL  = 'https://www.tumblr.com/oauth/access_token';
	protected ?string $apiURL         = 'https://api.tumblr.com/v2';
	protected ?string $userRevokeURL  = 'https://www.tumblr.com/settings/apps';
	protected ?string $endpointMap    = TumblrEndpoints::class;
	protected ?string $apiDocs        = 'https://www.tumblr.com/docs/en/api/v2';
	protected ?string $applicationURL = 'https://www.tumblr.com/oauth/apps';

}
