<?php
/**
 * Class OpenCaching
 *
 * @filesource   OpenCaching.php
 * @created      04.03.2019
 * @package      chillerlan\OAuth\Providers\OpenCaching
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\OpenCaching;

use chillerlan\OAuth\Core\OAuth1Provider;

/**
 * @method \Psr\Http\Message\ResponseInterface apirefIssue(array $params = ['issue_id', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface apirefMethod(array $params = ['name', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface apirefMethodIndex(array $params = ['format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface apisrvInstallation(array $params = ['format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface apisrvInstallations(array $params = ['format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface apisrvStats(array $params = ['format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface attrsAttribute(array $params = ['acode', 'langpref', 'fields', 'forward_compatible', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface attrsAttributeIndex(array $params = ['langpref', 'fields', 'only_locally_used', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface attrsAttributes(array $params = ['acodes', 'langpref', 'fields', 'forward_compatible', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesEdit(array $params = ['cache_code', 'passwd', 'langpref', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesFormattersGarmin(array $params = ['cache_codes', 'langpref', 'images', 'caches_format', 'location_source', 'location_change_prefix'])
 * @method \Psr\Http\Message\ResponseInterface cachesFormattersGgz(array $params = ['cache_codes', 'langpref', 'ns_ground', 'ns_oc', 'ns_gsak', 'ns_ox', 'images', 'attrs', 'protection_areas', 'trackables', 'recommendations', 'my_notes', 'latest_logs', 'lpc', 'alt_wpts', 'mark_found', 'user_uuid', 'location_source', 'location_change_prefix'])
 * @method \Psr\Http\Message\ResponseInterface cachesFormattersGpx(array $params = ['cache_codes', 'langpref', 'ns_ground', 'ns_oc', 'ns_gsak', 'ns_ox', 'images', 'attrs', 'protection_areas', 'trackables', 'recommendations', 'my_notes', 'latest_logs', 'lpc', 'alt_wpts', 'mark_found', 'user_uuid', 'location_source', 'location_change_prefix'])
 * @method \Psr\Http\Message\ResponseInterface cachesGeocache(array $params = ['cache_code', 'langpref', 'fields', 'attribution_append', 'oc_team_annotation', 'owner_fields', 'lpc', 'log_fields', 'log_user_fields', 'user_logs_only', 'my_location', 'user_uuid', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesGeocaches(array $params = ['cache_codes', 'langpref', 'fields', 'attribution_append', 'oc_team_annotation', 'owner_fields', 'lpc', 'log_fields', 'log_user_fields', 'user_logs_only', 'my_location', 'user_uuid', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesMapTile(array $params = ['z', 'x', 'y', 'view_user_uuid', 'min_store', 'ref_max_age', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and'])
 * @method \Psr\Http\Message\ResponseInterface cachesMark(array $params = ['cache_code', 'watched', 'ignored', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesSavePersonalNotes(array $params = ['cache_code', 'new_value', 'old_value', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesSearchAll(array $params = ['type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesSearchBbox(array $params = ['bbox', 'location_source', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesSearchByUrls(array $params = ['urls', 'as_dict', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesSearchNearest(array $params = ['center', 'radius', 'location_source', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'limit', 'offset', 'order_by', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesSearchSave(array $params = ['min_store', 'ref_max_age', 'type', 'status', 'owner_uuid', 'name', 'terrain', 'difficulty', 'size', 'size2', 'rating', 'min_rcmds', 'min_founds', 'max_founds', 'modified_since', 'found_status', 'found_by', 'not_found_by', 'recommended_only', 'recommended_by', 'watched_only', 'exclude_ignored', 'ignored_status', 'exclude_my_own', 'with_trackables_only', 'ftf_hunter', 'powertrail_only', 'powertrail_ids', 'set_and', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface cachesShortcutsSearchAndRetrieve(array $params = ['search_method', 'search_params', 'retr_method', 'retr_params', 'wrap', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsCapabilities(array $params = ['cache_code', 'log_uuid', 'logtype', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsDelete(array $params = ['log_uuid', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsEdit(array $params = ['log_uuid', 'logtype', 'password', 'comment', 'comment_format', 'when', 'recommend', 'rating', 'langpref', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsEntries(array $params = ['log_uuids', 'fields', 'user_fields', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsEntry(array $params = ['log_uuid', 'fields', 'user_fields', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsImagesAdd(array $params = ['log_uuid', 'image', 'caption', 'is_spoiler', 'position', 'langpref', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsImagesDelete(array $params = ['image_uuid', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsImagesEdit(array $params = ['image_uuid', 'caption', 'is_spoiler', 'position', 'langpref', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsLogs(array $params = ['cache_code', 'fields', 'user_fields', 'offset', 'limit', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsSubmit(array $params = ['cache_code', 'logtype', 'comment', 'comment_format', 'when', 'password', 'langpref', 'on_duplicate', 'rating', 'recommend', 'needs_maintenance', 'needs_maintenance2', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface logsUserlogs(array $params = ['user_uuid', 'fields', 'limit', 'offset', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface replicateChangelog(array $params = ['since', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface replicateFulldump()
 * @method \Psr\Http\Message\ResponseInterface replicateInfo(array $params = ['format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface usersByInternalId(array $params = ['internal_id', 'fields', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface usersByInternalIds(array $params = ['internal_ids', 'fields', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface usersByUsername(array $params = ['username', 'fields', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface usersByUsernames(array $params = ['usernames', 'fields', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface usersUser(array $params = ['fields', 'user_uuid', 'format', 'callback'])
 * @method \Psr\Http\Message\ResponseInterface usersUsers(array $params = ['user_uuids', 'fields', 'format', 'callback'])
 */
class OpenCaching extends OAuth1Provider{

	protected string $requestTokenURL = 'https://www.opencaching.de/okapi/services/oauth/request_token';
	protected string $authURL         = 'https://www.opencaching.de/okapi/services/oauth/authorize';
	protected string $accessTokenURL  = 'https://www.opencaching.de/okapi/services/oauth/access_token';
	protected ?string $apiURL         = 'https://www.opencaching.de/okapi/services';
	protected ?string $userRevokeURL  = 'https://www.opencaching.de/okapi/apps/';
	protected ?string $endpointMap    = OpenCachingEndpoints::class;
	protected ?string $apiDocs        = 'https://www.opencaching.de/okapi/';
	protected ?string $applicationURL = 'https://www.opencaching.de/okapi/signup.html';

}
