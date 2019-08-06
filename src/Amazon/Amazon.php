<?php
/**
 * Class Amazon
 *
 * @link https://login.amazon.com/
 * @link https://images-na.ssl-images-amazon.com/images/G/01/lwa/dev/docs/website-developer-guide._TTH_.pdf
 * @link https://images-na.ssl-images-amazon.com/images/G/01/mwsportal/doc/en_US/offamazonpayments/LoginAndPayWithAmazonIntegrationGuide._V335378063_.pdf
 *
 * @filesource   Amazon.php
 * @created      10.08.2018
 * @package      chillerlan\OAuth\Providers\Amazon
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Amazon;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider, TokenRefresh,};

/**
 * @method \Psr\Http\Message\ResponseInterface userProfile()
 */
class Amazon extends OAuth2Provider implements CSRFToken, TokenRefresh{

	public const SCOPE_PROFILE         = 'profile';
	public const SCOPE_PROFILE_USER_ID = 'profile:user_id';
	public const SCOPE_POSTAL_CODE     = 'postal_code';

	protected $apiURL         = 'https://api.amazon.com';
	protected $authURL        = 'https://www.amazon.com/ap/oa';
	protected $accessTokenURL = 'https://www.amazon.com/ap/oatoken';
	protected $endpointMap    = AmazonEndpoints::class;
	protected $apiDocs        = 'https://login.amazon.com/';
	protected $applicationURL = 'https://sellercentral.amazon.com/hz/home';
}
