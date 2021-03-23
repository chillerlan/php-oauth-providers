<?php
/**
 * Class Discogs
 *
 * @link https://www.discogs.com/developers/
 * @link https://www.discogs.com/developers/#page:authentication,header:authentication-oauth-flow
 *
 * @created      08.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Discogs;

use chillerlan\OAuth\Core\OAuth1Provider;

/**
 * @method \Psr\Http\Message\ResponseInterface artist(string $artist_id)
 * @method \Psr\Http\Message\ResponseInterface artistReleases(string $artist_id, array $params = ['page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface collectionCreateFolder(string $username, array $body = ['name'])
 * @method \Psr\Http\Message\ResponseInterface collectionDeleteFolder(string $username, string $folder_id)
 * @method \Psr\Http\Message\ResponseInterface collectionFields(string $username)
 * @method \Psr\Http\Message\ResponseInterface collectionFolder(string $username, string $folder_id)
 * @method \Psr\Http\Message\ResponseInterface collectionFolderAddRelease(string $username, string $folder_id, string $release_id)
 * @method \Psr\Http\Message\ResponseInterface collectionFolderRateRelease(string $username, string $folder_id, string $release_id, string $instance_id, array $body = ['rating'])
 * @method \Psr\Http\Message\ResponseInterface collectionFolderReleases(string $username, string $folder_id, array $params = ['page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface collectionFolderRemoveRelease(string $username, string $folder_id, string $release_id, string $instance_id)
 * @method \Psr\Http\Message\ResponseInterface collectionFolderUpdateReleaseField(string $username, string $folder_id, string $release_id, string $instance_id, string $field_id, array $body = ['value'])
 * @method \Psr\Http\Message\ResponseInterface collectionFolders(string $username)
 * @method \Psr\Http\Message\ResponseInterface collectionRelease(string $username, string $release_id)
 * @method \Psr\Http\Message\ResponseInterface collectionUpdateFolder(string $username, string $folder_id, array $body = ['name'])
 * @method \Psr\Http\Message\ResponseInterface collectionValue(string $username)
 * @method \Psr\Http\Message\ResponseInterface contributions(string $username, array $params = ['page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface identity()
 * @method \Psr\Http\Message\ResponseInterface inventory(string $username, array $params = ['page', 'per_page', 'status', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface label(string $label_id)
 * @method \Psr\Http\Message\ResponseInterface labelReleases(string $label_id, array $params = ['page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface list(string $list_id)
 * @method \Psr\Http\Message\ResponseInterface lists(string $username)
 * @method \Psr\Http\Message\ResponseInterface marketplaceCreateListing(array $body = ['release_id', 'condition', 'sleeve_condition', 'price', 'comments', 'allow_offers', 'status', 'external_id', 'location', 'weight', 'format_quantity'])
 * @method \Psr\Http\Message\ResponseInterface marketplaceFee(string $price)
 * @method \Psr\Http\Message\ResponseInterface marketplaceFeeCurrency(string $price, string $currency)
 * @method \Psr\Http\Message\ResponseInterface marketplaceListing(string $listing_id, array $params = ['curr_abbr'])
 * @method \Psr\Http\Message\ResponseInterface marketplaceOrder(string $order_id)
 * @method \Psr\Http\Message\ResponseInterface marketplaceOrderAddMessage(string $order_id, array $body = ['message', 'status'])
 * @method \Psr\Http\Message\ResponseInterface marketplaceOrderMessages(string $order_id, array $params = ['page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface marketplaceOrders(array $params = ['status', 'page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface marketplaceRemoveListing(string $listing_id)
 * @method \Psr\Http\Message\ResponseInterface marketplaceUpdateListing(string $listing_id, array $body = ['release_id', 'condition', 'sleeve_condition', 'price', 'comments', 'allow_offers', 'status', 'external_id', 'location', 'weight', 'format_quantity'])
 * @method \Psr\Http\Message\ResponseInterface marketplaceUpdateOrder(string $order_id, array $body = ['status', 'shipping'])
 * @method \Psr\Http\Message\ResponseInterface master(string $master_id)
 * @method \Psr\Http\Message\ResponseInterface masterVersions(string $master_id, array $params = ['page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface profile(string $username)
 * @method \Psr\Http\Message\ResponseInterface profileUpdate(string $username, array $body = ['name', 'home_page', 'location', 'profile', 'curr_abbr'])
 * @method \Psr\Http\Message\ResponseInterface release(string $release_id, array $params = ['curr_abbr'])
 * @method \Psr\Http\Message\ResponseInterface releasePriceSuggestion(string $release_id)
 * @method \Psr\Http\Message\ResponseInterface releaseRating(string $release_id)
 * @method \Psr\Http\Message\ResponseInterface releaseRemoveUserRating(string $release_id, string $username)
 * @method \Psr\Http\Message\ResponseInterface releaseUpdateUserRating(string $release_id, string $username, array $params = ['rating'])
 * @method \Psr\Http\Message\ResponseInterface releaseUserRating(string $release_id, string $username)
 * @method \Psr\Http\Message\ResponseInterface search(array $params = ['q', 'query', 'type', 'title', 'release_title', 'credit', 'artist', 'anv', 'label', 'genre', 'style', 'country', 'year', 'format', 'catno', 'barcode', 'track', 'submitter', 'contributor'])
 * @method \Psr\Http\Message\ResponseInterface submissions(string $username, array $params = ['page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface wantlist(string $username, array $params = ['page', 'per_page', 'sort', 'sort_order'])
 * @method \Psr\Http\Message\ResponseInterface wantlistAdd(string $username, string $release_id, array $body = ['notes', 'rating'])
 * @method \Psr\Http\Message\ResponseInterface wantlistRemove(string $username, string $release_id)
 * @method \Psr\Http\Message\ResponseInterface wantlistUpdate(string $username, string $release_id, array $body = ['notes', 'rating'])
 */
class Discogs extends OAuth1Provider{

	protected string $requestTokenURL = 'https://api.discogs.com/oauth/request_token';
	protected string $authURL         = 'https://www.discogs.com/oauth/authorize';
	protected string $accessTokenURL  = 'https://api.discogs.com/oauth/access_token';
	protected ?string $apiURL         = 'https://api.discogs.com';
	protected ?string $revokeURL      = 'https://www.discogs.com/oauth/revoke'; // ?access_key=<TOKEN>
	protected ?string $userRevokeURL  = 'https://www.discogs.com/settings/applications';
	protected ?string $endpointMap    = DiscogsEndpoints::class;
	protected ?string $apiDocs        = 'https://www.discogs.com/developers/';
	protected ?string $applicationURL = 'https://www.discogs.com/settings/developers';
	protected array $apiHeaders       = ['Accept' => 'application/vnd.discogs.v2.discogs+json'];

}
