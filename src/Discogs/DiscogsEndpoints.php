<?php
/**
 * Class DiscogsEndpoints
 *
 * @filesource   DiscogsEndpoints.php
 * @created      08.04.2018
 * @package      chillerlan\OAuth\Providers\Discogs
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Discogs;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * @todo https://www.discogs.com/forum/thread/757766
 *
 * POST /users/{username}/lists?name,description - creates a new list for the user
 * POST /lists/{list_id}?item_id,item_type,item_description - adds a new list item
 *
 * @link https://www.discogs.com/developers/
 *
 * Note: the endpoints are ordered by the api docs (against any logical pattern)
 */
class DiscogsEndpoints extends EndpointMap{

	/**
	 * Database
	 */

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-release
	 */
	protected array $release = [
		'path'          => '/releases/%1$s',
		'method'        => 'GET',
		'query'         => ['curr_abbr'],
		'path_elements' => ['release_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-release-rating-by-user
	 */
	protected array $releaseUserRating = [
		'path'          => '/releases/%1$s/rating/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['release_id', 'username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-release-rating-by-user-put
	 */
	protected array $releaseUpdateUserRating = [
		'path'          => '/releases/%1$s/rating/%2$s',
		'method'        => 'PUT',
		'query'         => ['rating'],
		'path_elements' => ['release_id', 'username'],
		'body'          => null,
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-release-rating-by-user-delete
	 */
	protected array $releaseRemoveUserRating = [
		'path'          => '/releases/%1$s/rating/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['release_id', 'username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-community-release-rating
	 */
	protected array $releaseRating = [
		'path'          => '/releases/%1$s/rating',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['release_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-master-release
	 */
	protected array $master = [
		'path'          => '/masters/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['master_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-master-release-versions
	 */
	protected array $masterVersions = [
		'path'          => '/masters/%1$s/versions',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => ['master_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-artist
	 */
	protected array $artist = [
		'path'          => '/artists/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['artist_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-artist-releases
	 */
	protected array $artistReleases = [
		'path'          => '/artists/%1$s/releases',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => ['artist_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-label
	 */
	protected array $label = [
		'path'          => '/labels/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['label_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-all-label-releases
	 */
	protected array $labelReleases = [
		'path'          => '/labels/%1$s/releases',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => ['label_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-search
	 */
	protected array $search = [
		'path'          => '/database/search',
		'method'        => 'GET',
		'query'         => [
			'q', 'query', 'type', 'title', 'release_title', 'credit', 'artist', 'anv', 'label', 'genre', 'style', 'country',
			'year', 'format', 'catno', 'barcode', 'track', 'submitter', 'contributor',
		],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:database,header:database-videos
	 */

	/**
	 * Marketplace
	 */

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-inventory
	 */
	protected array $inventory = [
		'path'          => '/users/%1$s/inventory',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'status', 'sort', 'sort_order'],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-listing
	 */
	protected array $marketplaceListing = [
		'path'          => '/marketplace/listings/%1$s',
		'method'        => 'GET',
		'query'         => ['curr_abbr'],
		'path_elements' => ['listing_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-listing-post
	 */
	protected array $marketplaceUpdateListing = [
		'path'          => '/marketplace/listings/%1$s',
		'method'        => 'POST',
		'query'         => [], // curr_abbr???
		'path_elements' => ['listing_id'],
		'body'          => [
			'release_id', 'condition', 'sleeve_condition', 'price',
			'comments', 'allow_offers', 'status', 'external_id',
			'location', 'weight', 'format_quantity',
		],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-listing-delete
	 */
	protected array $marketplaceRemoveListing = [
		'path'          => '/marketplace/listings/%1$s',
		'method'        => 'DELETE',
		'query'         => [], // curr_abbr???
		'path_elements' => ['listing_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-new-listing
	 */
	protected array $marketplaceCreateListing = [
		'path'          => '/marketplace/listings',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => [
			'release_id', 'condition', 'sleeve_condition', 'price',
			'comments', 'allow_offers', 'status', 'external_id',
			'location', 'weight', 'format_quantity',
		],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-order-get
	 */
	protected array $marketplaceOrder = [
		'path'          => '/marketplace/orders/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['order_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-order-post
	 */
	protected array $marketplaceUpdateOrder = [
		'path'          => '/marketplace/orders/%1$s',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['order_id'],
		'body'          => ['status', 'shipping'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-list-orders-get
	 */
	protected array $marketplaceOrders = [
		'path'          => '/marketplace/orders',
		'method'        => 'GET',
		'query'         => ['status', 'page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-list-order-messages-get
	 */
	protected array $marketplaceOrderMessages = [
		'path'          => '/marketplace/orders/%1$s/messages',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => ['order_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-list-order-messages-post
	 */
	protected array $marketplaceOrderAddMessage = [
		'path'          => '/marketplace/orders/%1$s/messages',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['order_id'],
		'body'          => ['message', 'status'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-fee-get
	 */
	protected array $marketplaceFee = [
		'path'          => '/marketplace/fee/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['price'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-fee-with-currency-get
	 */
	protected array $marketplaceFeeCurrency = [
		'path'          => '/marketplace/fee/%1$s/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['price', 'currency'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:marketplace,header:marketplace-price-suggestions
	 */
	protected array $releasePriceSuggestion = [
		'path'          => '/marketplace/price_suggestions/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['release_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * User Identity
	 */

	/**
	 * @link https://www.discogs.com/developers/#page:user-identity,header:user-identity-identity-get
	 */
	protected array $identity = [
		'path'          => '/oauth/identity',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-identity,header:user-identity-profile-get
	 */
	protected array $profile = [
		'path'          => '/users/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-identity,header:user-identity-profile-post
	 */
	protected array $profileUpdate = [
		'path'          => '/users/%1$s',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => ['name', 'home_page', 'location', 'profile', 'curr_abbr'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-identity,header:user-identity-user-submissions-get
	 */
	protected array $submissions = [
		'path'          => '/users/%1$s/submissions',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-identity,header:user-identity-user-contributions-get
	 */
	protected array $contributions = [
		'path'          => '/users/%1$s/contributions',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * User Collection
	 */

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-collection-get
	 */
	protected array $collectionFolders = [
		'path'          => '/users/%1$s/collection/folders',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-collection-post
	 */
	protected array $collectionCreateFolder = [
		'path'          => '/users/%1$s/collection/folders',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => ['name'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-collection-folder-get
	 */
	protected array $collectionFolder = [
		'path'          => '/users/%1$s/collection/folders/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username', 'folder_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-collection-folder-post
	 */
	protected array $collectionUpdateFolder = [
		'path'          => '/users/%1$s/collection/folders/%2$s',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['username', 'folder_id'],
		'body'          => ['name'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-collection-folder-delete
	 */
	protected array $collectionDeleteFolder = [
		'path'          => '/users/%1$s/collection/folders/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['username', 'folder_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-collection-items-by-release-get
	 */
	protected array $collectionRelease = [
		'path'          => '/users/%1$s/collection/releases/%2$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username', 'release_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-collection-items-by-folder-get
	 */
	protected array $collectionFolderReleases = [
		'path'          => '/users/%1$s/collection/folders/%2$s/releases',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => ['username', 'folder_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-add-to-collection-folder-post
	 */
	protected array $collectionFolderAddRelease = [
		'path'          => '/users/%1$s/collection/folders/%2$s/releases/%3$s',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['username', 'folder_id', 'release_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-change-rating-of-release-post
	 */
	protected array $collectionFolderRateRelease = [
		'path'          => '/users/%1$s/collection/folders/%2$s/releases/%3$s/instances/%4$s',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['username', 'folder_id', 'release_id', 'instance_id'],
		'body'          => ['rating'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-delete-instance-from-folder-delete
	 */
	protected array $collectionFolderRemoveRelease = [
		'path'          => '/users/%1$s/collection/folders/%2$s/releases/%3$s/instances/%4$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['username', 'folder_id', 'release_id', 'instance_id'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-list-custom-fields-get
	 */
	protected array $collectionFields = [
		'path'          => '/users/%1$s/collection/fields',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-edit-fields-instance-post
	 */
	protected array $collectionFolderUpdateReleaseField = [
		'path'          => '/users/%1$s/collection/folders/%2$s/releases/%3$s/instances/%4$s/fields/%5$s',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['username', 'folder_id', 'release_id', 'instance_id', 'field_id'],
		'body'          => ['value'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-collection,header:user-collection-collection-value-get
	 */
	protected array $collectionValue = [
		'path'          => '/users/%1$s/collection/value',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * User Wantlist
	 */

	/**
	 * @link https://www.discogs.com/developers/#page:user-wantlist,header:user-wantlist-wantlist-get
	 */
	protected array $wantlist = [
		'path'          => '/users/%1$s/wants',
		'method'        => 'GET',
		'query'         => ['page', 'per_page', 'sort', 'sort_order'],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-wantlist,header:user-wantlist-add-to-wantlist-put
	 */
	protected array $wantlistAdd = [
		'path'          => '/users/%1$s/wants/%2$s',
		'method'        => 'PUT',
		'query'         => [],
		'path_elements' => ['username', 'release_id'],
		'body'          => ['notes', 'rating'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-wantlist,header:user-wantlist-add-to-wantlist-post
	 */
	protected array $wantlistUpdate = [
		'path'          => '/users/%1$s/wants/%2$s',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => ['username', 'release_id'],
		'body'          => ['notes', 'rating'],
		'headers'       => ['Content-Type' => 'application/json'],
	];

	/**
	 * @link https://www.discogs.com/developers/#page:user-wantlist,header:user-wantlist-add-to-wantlist-delete
	 */
	protected array $wantlistRemove = [
		'path'          => '/users/%1$s/wants/%2$s',
		'method'        => 'DELETE',
		'query'         => [],
		'path_elements' => ['username', 'release_id'],
		'body'          => null, // ['notes', 'rating'] has no effect
		'headers'       => [],
	];

	/**
	 * User Lists
	 */

	/**
	 * @link https://www.discogs.com/developers/#page:user-lists,header:user-lists-user-lists-get
	 */
	protected array $lists = [
		'path'          => '/users/%1$s/lists',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['username'],
		'body'          => null,
		'headers'       => [],
	];


	/**
	 * @link https://www.discogs.com/developers/#page:user-lists,header:user-lists-list-get
	 */
	protected array $list = [
		'path'          => '/lists/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['list_id'],
		'body'          => null,
		'headers'       => [],
	];

}
