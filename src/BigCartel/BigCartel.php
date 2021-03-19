<?php
/**
 * Class BigCartel
 *
 * @link https://developers.bigcartel.com/api/v1
 * @link https://bigcartel.wufoo.com/confirm/big-cartel-api-application/
 *
 * @created      10.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\BigCartel;

use chillerlan\OAuth\Core\{CSRFToken, OAuth2Provider};

/**
 * @method \Psr\Http\Message\ResponseInterface account()
 * @method \Psr\Http\Message\ResponseInterface countries()
 * @method \Psr\Http\Message\ResponseInterface createArtist(string $account_id, array $body = ['type', 'name'])
 * @method \Psr\Http\Message\ResponseInterface createCategory(string $account_id, array $body = ['type', 'name'])
 * @method \Psr\Http\Message\ResponseInterface createDiscount(string $account_id, array $body = ['type', 'name', 'code', 'active_at', 'expires_at', 'requirement_type', 'expiration_type', 'reward_type', 'application_type', 'percent_discount', 'flat_rate_discount', 'use_limit', 'minimum_cart_total', 'minimum_cart_quantity'])
 * @method \Psr\Http\Message\ResponseInterface deleteArtist(string $account_id, string $artist_id)
 * @method \Psr\Http\Message\ResponseInterface deleteCategory(string $account_id, string $category_id)
 * @method \Psr\Http\Message\ResponseInterface deleteDiscount(string $account_id, string $discount_id)
 * @method \Psr\Http\Message\ResponseInterface getAccount(string $account_id)
 * @method \Psr\Http\Message\ResponseInterface getArtist(string $account_id, string $artist_id)
 * @method \Psr\Http\Message\ResponseInterface getArtists(string $account_id, array $params = ['page'])
 * @method \Psr\Http\Message\ResponseInterface getCategories(string $account_id, array $params = ['page'])
 * @method \Psr\Http\Message\ResponseInterface getCategory(string $account_id, string $category_id)
 * @method \Psr\Http\Message\ResponseInterface getDiscount(string $account_id, string $discount_id)
 * @method \Psr\Http\Message\ResponseInterface getDiscounts(string $account_id, array $params = ['filter', 'page'])
 * @method \Psr\Http\Message\ResponseInterface getOrder(string $account_id, string $order_id)
 * @method \Psr\Http\Message\ResponseInterface getOrders(string $account_id, array $params = ['filter', 'page', 'search', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface getProduct(string $account_id, string $product_id)
 * @method \Psr\Http\Message\ResponseInterface getProducts(string $account_id, array $params = ['filter', 'page', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface repositionArtists(string $account_id, array $body = ['id', 'type'])
 * @method \Psr\Http\Message\ResponseInterface repositionCategories(string $account_id, array $body = ['id', 'type'])
 * @method \Psr\Http\Message\ResponseInterface repositionProducts(string $account_id, array $body = ['id', 'type'])
 * @method \Psr\Http\Message\ResponseInterface updateArtist(string $account_id, string $artist_id, array $body = ['id', 'type', 'name'])
 * @method \Psr\Http\Message\ResponseInterface updateCategory(string $account_id, string $category_id, array $body = ['id', 'type', 'name'])
 * @method \Psr\Http\Message\ResponseInterface updateDiscount(string $account_id, string $discount_id, array $body = ['type', 'name', 'code', 'active_at', 'expires_at', 'requirement_type', 'expiration_type', 'reward_type', 'application_type', 'percent_discount', 'flat_rate_discount', 'use_limit', 'minimum_cart_total', 'minimum_cart_quantity'])
 * @method \Psr\Http\Message\ResponseInterface updateOrder(string $account_id, string $order_id, array $body = ['id', 'type', 'customer_first_name', 'customer_last_name', 'customer_email', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_state', 'shipping_zip', 'shipping_country_id', 'shipping_status'])
 */
class BigCartel extends OAuth2Provider implements CSRFToken{

	protected string $authURL         = 'https://my.bigcartel.com/oauth/authorize';
	protected string $accessTokenURL  = 'https://api.bigcartel.com/oauth/token';
	protected ?string $apiURL         = 'https://api.bigcartel.com/v1';
	protected ?string $userRevokeURL  = 'https://my.bigcartel.com/account';
	protected ?string $endpointMap    = BigCartelEndpoints::class;
#	protected ?string $revokeURL      = 'https://api.bigcartel.com/oauth/deauthorize/{ACCOUNT_ID}'; // @todo
	protected ?string $apiDocs        = 'https://developers.bigcartel.com/api/v1';
	protected ?string $applicationURL = 'https://bigcartel.wufoo.com/forms/big-cartel-api-application/';
	protected array $apiHeaders       = ['Accept' => 'application/vnd.api+json'];

}
