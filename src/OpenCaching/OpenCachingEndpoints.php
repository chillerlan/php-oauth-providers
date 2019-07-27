<?php
/**
 * Class OpenCachingEndpoints (auto created)
 *
 * @link https://www.opencaching.de/okapi/introduction.html
 *
 * @filesource   OpenCachingEndpoints.php
 * @created      27.07.2019
 * @package      chillerlan\OAuth\Providers\OpenCaching
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\OpenCaching;

use chillerlan\HTTP\MagicAPI\EndpointMap;

class OpenCachingEndpoints extends EndpointMap{

	/**
	 * @link https://www.opencaching.de/okapi/services/apiref/method.html
	 */
	protected $apirefMethod = [
		'path'  => '/apiref/method',
		'query' => ['name', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apiref/method_index.html
	 */
	protected $apirefMethodIndex = [
		'path'  => '/apiref/method_index',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apiref/issue.html
	 */
	protected $apirefIssue = [
		'path'  => '/apiref/issue',
		'query' => ['issue_id', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apisrv/installation.html
	 */
	protected $apisrvInstallation = [
		'path'  => '/apisrv/installation',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apisrv/installations.html
	 */
	protected $apisrvInstallations = [
		'path'  => '/apisrv/installations',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apisrv/stats.html
	 */
	protected $apisrvStats = [
		'path'  => '/apisrv/stats',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/attrs/attribute_index.html
	 */
	protected $attrsAttributeIndex = [
		'path'  => '/attrs/attribute_index',
		'query' => ['langpref', 'fields', 'only_locally_used', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/attrs/attribute.html
	 */
	protected $attrsAttribute = [
		'path'  => '/attrs/attribute',
		'query' => ['acode', 'langpref', 'fields', 'forward_compatible', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/attrs/attributes.html
	 */
	protected $attrsAttributes = [
		'path'  => '/attrs/attributes',
		'query' => ['acodes', 'langpref', 'fields', 'forward_compatible', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/all.html
	 */
	protected $cachesSearchAll = [
		'path'  => '/caches/search/all',
		'query' => ['type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/bbox.html
	 */
	protected $cachesSearchBbox = [
		'path'  => '/caches/search/bbox',
		'query' => ['bbox', 'location_source', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/nearest.html
	 */
	protected $cachesSearchNearest = [
		'path'  => '/caches/search/nearest',
		'query' => ['center', 'radius', 'location_source', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/by_urls.html
	 */
	protected $cachesSearchByUrls = [
		'path'  => '/caches/search/by_urls',
		'query' => ['urls', 'as_dict', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/save.html
	 */
	protected $cachesSearchSave = [
		'path'  => '/caches/search/save',
		'query' => ['min_store', 'ref_max_age', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/shortcuts/search_and_retrieve.html
	 */
	protected $cachesShortcutsSearchAndRetrieve = [
		'path'  => '/caches/shortcuts/search_and_retrieve',
		'query' => ['search_method', 'search_params', 'retr_method', 'retr_params', 'wrap', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/edit.html
	 */
	protected $cachesEdit = [
		'path'  => '/caches/edit',
		'query' => ['cache_code', 'passwd', 'langpref', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/geocache.html
	 */
	protected $cachesGeocache = [
		'path'  => '/caches/geocache',
		'query' => ['cache_code', 'langpref', 'fields', 'attribution_append', 'oc_team_annotation', 'owner_fields', 'lpc', 'log_fields', 'log_user_fields', 'user_logs_only', 'my_location', 'user_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/geocaches.html
	 */
	protected $cachesGeocaches = [
		'path'  => '/caches/geocaches',
		'query' => ['cache_codes', 'langpref', 'fields', 'attribution_append', 'oc_team_annotation', 'owner_fields', 'lpc', 'log_fields', 'log_user_fields', 'user_logs_only', 'my_location', 'user_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/mark.html
	 */
	protected $cachesMark = [
		'path'  => '/caches/mark',
		'query' => ['cache_code', 'watched', 'ignored', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/save_personal_notes.html
	 */
	protected $cachesSavePersonalNotes = [
		'path'  => '/caches/save_personal_notes',
		'query' => ['cache_code', 'new_value', 'old_value', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/formatters/gpx.html
	 */
	protected $cachesFormattersGpx = [
		'path'  => '/caches/formatters/gpx',
		'query' => ['cache_codes', 'langpref', 'ns_ground', 'ns_oc', 'ns_gsak', 'ns_ox', 'images', 'attrs', 'protection_areas', 'trackables', 'recommendations', 'my_notes', 'latest_logs', 'lpc', 'alt_wpts', 'mark_found', 'user_uuid', 'location_source', 'location_change_prefix'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/formatters/garmin.html
	 */
	protected $cachesFormattersGarmin = [
		'path'  => '/caches/formatters/garmin',
		'query' => ['cache_codes', 'langpref', 'images', 'caches_format', 'location_source', 'location_change_prefix'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/formatters/ggz.html
	 */
	protected $cachesFormattersGgz = [
		'path'  => '/caches/formatters/ggz',
		'query' => ['cache_codes', 'langpref', 'ns_ground', 'ns_oc', 'ns_gsak', 'ns_ox', 'images', 'attrs', 'protection_areas', 'trackables', 'recommendations', 'my_notes', 'latest_logs', 'lpc', 'alt_wpts', 'mark_found', 'user_uuid', 'location_source', 'location_change_prefix'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/map/tile.html
	 */
	protected $cachesMapTile = [
		'path'  => '/caches/map/tile',
		'query' => ['z', 'x', 'y', 'view_user_uuid', 'min_store', 'ref_max_age', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/capabilities.html
	 */
	protected $logsCapabilities = [
		'path'  => '/logs/capabilities',
		'query' => ['cache_code', 'log_uuid', 'logtype', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/delete.html
	 */
	protected $logsDelete = [
		'path'  => '/logs/delete',
		'query' => ['log_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/edit.html
	 */
	protected $logsEdit = [
		'path'  => '/logs/edit',
		'query' => ['log_uuid', 'logtype', 'password', 'comment', 'comment_format', 'when', 'recommend', 'rating', 'langpref', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/entries.html
	 */
	protected $logsEntries = [
		'path'  => '/logs/entries',
		'query' => ['log_uuids', 'fields', 'user_fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/entry.html
	 */
	protected $logsEntry = [
		'path'  => '/logs/entry',
		'query' => ['log_uuid', 'fields', 'user_fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/logs.html
	 */
	protected $logsLogs = [
		'path'  => '/logs/logs',
		'query' => ['cache_code', 'fields', 'user_fields', 'offset', 'limit', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/userlogs.html
	 */
	protected $logsUserlogs = [
		'path'  => '/logs/userlogs',
		'query' => ['user_uuid', 'fields', 'limit', 'offset', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/submit.html
	 */
	protected $logsSubmit = [
		'path'  => '/logs/submit',
		'query' => ['cache_code', 'logtype', 'comment', 'comment_format', 'when', 'password', 'langpref', 'on_duplicate', 'rating', 'recommend', 'needs_maintenance', 'needs_maintenance2', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/images/add.html
	 */
	protected $logsImagesAdd = [
		'path'  => '/logs/images/add',
		'query' => ['log_uuid', 'image', 'caption', 'is_spoiler', 'position', 'langpref', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/images/edit.html
	 */
	protected $logsImagesEdit = [
		'path'  => '/logs/images/edit',
		'query' => ['image_uuid', 'caption', 'is_spoiler', 'position', 'langpref', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/images/delete.html
	 */
	protected $logsImagesDelete = [
		'path'  => '/logs/images/delete',
		'query' => ['image_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/replicate/changelog.html
	 */
	protected $replicateChangelog = [
		'path'  => '/replicate/changelog',
		'query' => ['since', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/replicate/fulldump.html
	 */
	protected $replicateFulldump = [
		'path'  => '/replicate/fulldump',
		'query' => [],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/replicate/info.html
	 */
	protected $replicateInfo = [
		'path'  => '/replicate/info',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/user.html
	 */
	protected $usersUser = [
		'path'  => '/users/user',
		'query' => ['fields', 'user_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/users.html
	 */
	protected $usersUsers = [
		'path'  => '/users/users',
		'query' => ['user_uuids', 'fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/by_usernames.html
	 */
	protected $usersByUsernames = [
		'path'  => '/users/by_usernames',
		'query' => ['usernames', 'fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/by_username.html
	 */
	protected $usersByUsername = [
		'path'  => '/users/by_username',
		'query' => ['username', 'fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/by_internal_id.html
	 */
	protected $usersByInternalId = [
		'path'  => '/users/by_internal_id',
		'query' => ['internal_id', 'fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/by_internal_ids.html
	 */
	protected $usersByInternalIds = [
		'path'  => '/users/by_internal_ids',
		'query' => ['internal_ids', 'fields', 'format', 'callback'],
	];

}
