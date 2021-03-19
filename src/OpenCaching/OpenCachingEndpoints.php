<?php
/**
 * Class OpenCachingEndpoints (auto created)
 *
 * @link https://www.opencaching.de/okapi/introduction.html
 *
 * @created      06.12.2019
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\OpenCaching;

use chillerlan\OAuth\MagicAPI\EndpointMap;

class OpenCachingEndpoints extends EndpointMap{

	/**
	 * @link https://www.opencaching.de/okapi/services/apiref/method.html
	 */
	protected array $apirefMethod = [
		'path'  => '/apiref/method',
		'query' => ['name', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apiref/method_index.html
	 */
	protected array $apirefMethodIndex = [
		'path'  => '/apiref/method_index',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apiref/issue.html
	 */
	protected array $apirefIssue = [
		'path'  => '/apiref/issue',
		'query' => ['issue_id', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apisrv/installation.html
	 */
	protected array $apisrvInstallation = [
		'path'  => '/apisrv/installation',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apisrv/installations.html
	 */
	protected array $apisrvInstallations = [
		'path'  => '/apisrv/installations',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/apisrv/stats.html
	 */
	protected array $apisrvStats = [
		'path'  => '/apisrv/stats',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/attrs/attribute_index.html
	 */
	protected array $attrsAttributeIndex = [
		'path'  => '/attrs/attribute_index',
		'query' => ['langpref', 'fields', 'only_locally_used', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/attrs/attribute.html
	 */
	protected array $attrsAttribute = [
		'path'  => '/attrs/attribute',
		'query' => ['acode', 'langpref', 'fields', 'forward_compatible', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/attrs/attributes.html
	 */
	protected array $attrsAttributes = [
		'path'  => '/attrs/attributes',
		'query' => ['acodes', 'langpref', 'fields', 'forward_compatible', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/all.html
	 */
	protected array $cachesSearchAll = [
		'path'  => '/caches/search/all',
		'query' => ['type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/bbox.html
	 */
	protected array $cachesSearchBbox = [
		'path'  => '/caches/search/bbox',
		'query' => ['bbox', 'location_source', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/nearest.html
	 */
	protected array $cachesSearchNearest = [
		'path'  => '/caches/search/nearest',
		'query' => ['center', 'radius', 'location_source', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/by_urls.html
	 */
	protected array $cachesSearchByUrls = [
		'path'  => '/caches/search/by_urls',
		'query' => ['urls', 'as_dict', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/search/save.html
	 */
	protected array $cachesSearchSave = [
		'path'  => '/caches/search/save',
		'query' => ['min_store', 'ref_max_age', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/shortcuts/search_and_retrieve.html
	 */
	protected array $cachesShortcutsSearchAndRetrieve = [
		'path'  => '/caches/shortcuts/search_and_retrieve',
		'query' => ['search_method', 'search_params', 'retr_method', 'retr_params', 'wrap', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/edit.html
	 */
	protected array $cachesEdit = [
		'path'  => '/caches/edit',
		'query' => ['cache_code', 'passwd', 'langpref', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/geocache.html
	 */
	protected array $cachesGeocache = [
		'path'  => '/caches/geocache',
		'query' => ['cache_code', 'langpref', 'fields', 'attribution_append', 'oc_team_annotation', 'owner_fields', 'lpc', 'log_fields', 'log_user_fields', 'user_logs_only', 'my_location', 'user_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/geocaches.html
	 */
	protected array $cachesGeocaches = [
		'path'  => '/caches/geocaches',
		'query' => ['cache_codes', 'langpref', 'fields', 'attribution_append', 'oc_team_annotation', 'owner_fields', 'lpc', 'log_fields', 'log_user_fields', 'user_logs_only', 'my_location', 'user_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/mark.html
	 */
	protected array $cachesMark = [
		'path'  => '/caches/mark',
		'query' => ['cache_code', 'watched', 'ignored', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/save_personal_notes.html
	 */
	protected array $cachesSavePersonalNotes = [
		'path'  => '/caches/save_personal_notes',
		'query' => ['cache_code', 'new_value', 'old_value', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/formatters/gpx.html
	 */
	protected array $cachesFormattersGpx = [
		'path'  => '/caches/formatters/gpx',
		'query' => ['cache_codes', 'langpref', 'ns_ground', 'ns_oc', 'ns_gsak', 'ns_ox', 'images', 'attrs', 'protection_areas', 'trackables', 'recommendations', 'my_notes', 'latest_logs', 'lpc', 'alt_wpts', 'mark_found', 'user_uuid', 'location_source', 'location_change_prefix'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/formatters/garmin.html
	 */
	protected array $cachesFormattersGarmin = [
		'path'  => '/caches/formatters/garmin',
		'query' => ['cache_codes', 'langpref', 'images', 'caches_format', 'location_source', 'location_change_prefix'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/formatters/ggz.html
	 */
	protected array $cachesFormattersGgz = [
		'path'  => '/caches/formatters/ggz',
		'query' => ['cache_codes', 'langpref', 'ns_ground', 'ns_oc', 'ns_gsak', 'ns_ox', 'images', 'attrs', 'protection_areas', 'trackables', 'recommendations', 'my_notes', 'latest_logs', 'lpc', 'alt_wpts', 'mark_found', 'user_uuid', 'location_source', 'location_change_prefix'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/caches/map/tile.html
	 */
	protected array $cachesMapTile = [
		'path'  => '/caches/map/tile',
		'query' => ['z', 'x', 'y', 'view_user_uuid', 'min_store', 'ref_max_age', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/capabilities.html
	 */
	protected array $logsCapabilities = [
		'path'  => '/logs/capabilities',
		'query' => ['cache_code', 'log_uuid', 'logtype', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/delete.html
	 */
	protected array $logsDelete = [
		'path'  => '/logs/delete',
		'query' => ['log_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/edit.html
	 */
	protected array $logsEdit = [
		'path'  => '/logs/edit',
		'query' => ['log_uuid', 'logtype', 'password', 'comment', 'comment_format', 'when', 'recommend', 'rating', 'langpref', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/entries.html
	 */
	protected array $logsEntries = [
		'path'  => '/logs/entries',
		'query' => ['log_uuids', 'fields', 'user_fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/entry.html
	 */
	protected array $logsEntry = [
		'path'  => '/logs/entry',
		'query' => ['log_uuid', 'fields', 'user_fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/logs.html
	 */
	protected array $logsLogs = [
		'path'  => '/logs/logs',
		'query' => ['cache_code', 'fields', 'user_fields', 'offset', 'limit', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/userlogs.html
	 */
	protected array $logsUserlogs = [
		'path'  => '/logs/userlogs',
		'query' => ['user_uuid', 'fields', 'limit', 'offset', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/submit.html
	 */
	protected array $logsSubmit = [
		'path'  => '/logs/submit',
		'query' => ['cache_code', 'logtype', 'comment', 'comment_format', 'when', 'password', 'langpref', 'on_duplicate', 'rating', 'recommend', 'needs_maintenance', 'needs_maintenance2', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/images/add.html
	 */
	protected array $logsImagesAdd = [
		'path'  => '/logs/images/add',
		'query' => ['log_uuid', 'image', 'caption', 'is_spoiler', 'position', 'langpref', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/images/edit.html
	 */
	protected array $logsImagesEdit = [
		'path'  => '/logs/images/edit',
		'query' => ['image_uuid', 'caption', 'is_spoiler', 'position', 'langpref', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/logs/images/delete.html
	 */
	protected array $logsImagesDelete = [
		'path'  => '/logs/images/delete',
		'query' => ['image_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/replicate/changelog.html
	 */
	protected array $replicateChangelog = [
		'path'  => '/replicate/changelog',
		'query' => ['since', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/replicate/fulldump.html
	 */
	protected array $replicateFulldump = [
		'path'  => '/replicate/fulldump',
		'query' => [],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/replicate/info.html
	 */
	protected array $replicateInfo = [
		'path'  => '/replicate/info',
		'query' => ['format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/user.html
	 */
	protected array $usersUser = [
		'path'  => '/users/user',
		'query' => ['fields', 'user_uuid', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/users.html
	 */
	protected array $usersUsers = [
		'path'  => '/users/users',
		'query' => ['user_uuids', 'fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/by_usernames.html
	 */
	protected array $usersByUsernames = [
		'path'  => '/users/by_usernames',
		'query' => ['usernames', 'fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/by_username.html
	 */
	protected array $usersByUsername = [
		'path'  => '/users/by_username',
		'query' => ['username', 'fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/by_internal_id.html
	 */
	protected array $usersByInternalId = [
		'path'  => '/users/by_internal_id',
		'query' => ['internal_id', 'fields', 'format', 'callback'],
	];

	/**
	 * @link https://www.opencaching.de/okapi/services/users/by_internal_ids.html
	 */
	protected array $usersByInternalIds = [
		'path'  => '/users/by_internal_ids',
		'query' => ['internal_ids', 'fields', 'format', 'callback'],
	];

}
