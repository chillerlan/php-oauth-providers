<?php
/**
 * Class BigCartelEndpoints
 *
 * @created      10.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\BigCartel;

use chillerlan\OAuth\MagicAPI\EndpointMap;

/**
 * @link https://developers.bigcartel.com/api/v1
 */
class BigCartelEndpoints extends EndpointMap{

	/**
	 * Account
	 *
	 * @link https://developers.bigcartel.com/api/v1#account
	 */

	/**
	 * @todo: undocumented: returns the current user's account info (/me)
	 * @link
	 */
	protected array $account = [
		'path'          => '/accounts',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-an-account
	 */
	protected array $getAccount = [
		'path'          => '/accounts/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Artists
	 *
	 * @link https://developers.bigcartel.com/api/v1#artists
	 */

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-all-artists
	 */
	protected array $getArtists = [
		'path'          => '/accounts/%1$s/artists',
		'method'        => 'GET',
		'query'         => ['page'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-an-artist
	 */
	protected array $getArtist = [
		'path'          => '/accounts/%1$s/artists/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id', 'artist_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#create-an-artist
	 */
	protected array $createArtist = [
		'path'          => '/accounts/%1$s/artists',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => ['type', 'name'],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#update-an-artist
	 */
	protected array $updateArtist = [
		'path'          => '/accounts/%1$s/artists/%2$s',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['account_id', 'artist_id'],
		'body'          => ['id', 'type', 'name'],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#reposition-artists
	 */
	protected array $repositionArtists = [
		'path'          => '/accounts/%1$s/relationships/artists',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => ['id', 'type'],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#delete-an-artist
	 */
	protected array $deleteArtist = [
		'path'          => '/accounts/%1$s/artists/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['account_id', 'artist_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Categories
	 *
	 * @link https://developers.bigcartel.com/api/v1#categories
	 */

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-all-categories
	 */
	protected array $getCategories = [
		'path'          => '/accounts/%1$s/categories',
		'method'        => 'GET',
		'query'         => ['page'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-a-category
	 */
	protected array $getCategory = [
		'path'          => '/accounts/%1$s/categories/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id', 'category_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#create-a-category
	 */
	protected array $createCategory = [
		'path'          => '/accounts/%1$s/categories',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => ['type', 'name'],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#update-a-category
	 */
	protected array $updateCategory = [
		'path'          => '/accounts/%1$s/categories/%2$s',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['account_id', 'category_id'],
		'body'          => ['id', 'type', 'name'],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#reposition-categories
	 */
	protected array $repositionCategories = [
		'path'          => '/accounts/%1$s/relationships/categories',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => ['id', 'type'],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#delete-a-category
	 */
	protected array $deleteCategory = [
		'path'          => '/accounts/%1$s/categories/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['account_id', 'category_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Countries
	 *
	 * @link https://developers.bigcartel.com/api/v1#countries
	 */

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-all-countries
	 */
	protected array $countries = [
		'path'          => '/countries',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Discounts
	 *
	 * @link https://developers.bigcartel.com/api/v1#discounts
	 */

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-all-discounts
	 */
	protected array $getDiscounts = [
		'path'          => '/accounts/%1$s/discounts',
		'method'        => 'GET',
		'query'         => ['filter', 'page'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link
	 */
	protected array $getDiscount = [
		'path'          => '/accounts/%1$s/discounts/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id', 'discount_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#create-a-discount
	 */
	protected array $createDiscount = [
		'path'          => '/accounts/%1$s/discounts',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => [
			'type', 'name', 'code', 'active_at', 'expires_at', 'requirement_type',
			'expiration_type', 'reward_type', 'application_type', 'percent_discount',
			'flat_rate_discount', 'use_limit', 'minimum_cart_total', 'minimum_cart_quantity',
		],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#update-a-discount
	 */
	protected array $updateDiscount = [
		'path'          => '/accounts/%1$s/discounts/%2$s',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['account_id', 'discount_id'],
		'body'          => [
			'type', 'name', 'code', 'active_at', 'expires_at', 'requirement_type',
			'expiration_type', 'reward_type', 'application_type', 'percent_discount',
			'flat_rate_discount', 'use_limit', 'minimum_cart_total', 'minimum_cart_quantity',
		],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#delete-a-discount
	 */
	protected array $deleteDiscount = [
		'path'          => '/accounts/%1$s/discounts/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['account_id', 'discount_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * Orders
	 *
	 * @link https://developers.bigcartel.com/api/v1#orders
	 */

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-all-orders
	 */
	protected array $getOrders = [
		'path'          => '/accounts/%1$s/orders',
		'method'        => 'GET',
		'query'         => ['filter', 'page', 'search', 'sort'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-an-order
	 */
	protected array $getOrder = [
		'path'          => '/accounts/%1$s/orders/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id', 'order_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#update-an-order
	 */
	protected array $updateOrder = [
		'path'          => '/accounts/%1$s/orders/%2$s',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['account_id', 'order_id'],
		'body'          => [
			'id', 'type', 'customer_first_name', 'customer_last_name',
			'customer_email', 'shipping_address_1', 'shipping_address_2',
			'shipping_city', 'shipping_state', 'shipping_zip', 'shipping_country_id',
			'shipping_status',
		],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

	/**
	 * Products
	 *
	 * @link https://developers.bigcartel.com/api/v1#products
	 */

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-all-products
	 */
	protected array $getProducts = [
		'path'          => '/accounts/%1$s/products',
		'method'        => 'GET',
		'query'         => ['filter', 'page', 'sort'],
		'path_elements' => ['account_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#get-a-product
	 */
	protected array $getProduct = [
		'path'          => '/accounts/%1$s/products/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['account_id', 'product_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://developers.bigcartel.com/api/v1#reposition-products
	 */
	protected array $repositionProducts = [
		'path'          => '/accounts/%1$s/relationships/products',
		'method'        => 'PATCH',
		'query'         => [],
		'path_elements' => ['account_id'],
		'body'          => ['id', 'type'],
		'headers'       => ['Content-Type' => 'application/vnd.api+json'],
	];

}
