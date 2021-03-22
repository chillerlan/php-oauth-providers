<?php
/**
 * Class Flickr
 *
 * @link https://www.flickr.com/services/api/auth.oauth.html
 * @link https://www.flickr.com/services/api/
 *
 * @created      20.10.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Flickr;

use chillerlan\OAuth\Core\OAuth1Provider;
use Psr\Http\Message\ResponseInterface;

use function array_merge;
use function chillerlan\HTTP\Psr7\merge_query;

/**
 * @method \Psr\Http\Message\ResponseInterface activityUserComments(array $params = ['per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface activityUserPhotos(array $params = ['timeframe', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface authCheckToken(array $params = ['auth_token'])
 * @method \Psr\Http\Message\ResponseInterface authGetFrob()
 * @method \Psr\Http\Message\ResponseInterface authGetFullToken(array $params = ['mini_token'])
 * @method \Psr\Http\Message\ResponseInterface authGetToken(array $params = ['frob'])
 * @method \Psr\Http\Message\ResponseInterface authOauthCheckToken(array $params = ['oauth_token'])
 * @method \Psr\Http\Message\ResponseInterface authOauthGetAccessToken()
 * @method \Psr\Http\Message\ResponseInterface blogsGetList(array $params = ['service'])
 * @method \Psr\Http\Message\ResponseInterface blogsGetServices()
 * @method \Psr\Http\Message\ResponseInterface blogsPostPhoto(array $params = ['blog_id', 'photo_id', 'title', 'description', 'blog_password', 'service'])
 * @method \Psr\Http\Message\ResponseInterface camerasGetBrandModels(array $params = ['brand'])
 * @method \Psr\Http\Message\ResponseInterface camerasGetBrands()
 * @method \Psr\Http\Message\ResponseInterface collectionsGetInfo(array $params = ['collection_id'])
 * @method \Psr\Http\Message\ResponseInterface collectionsGetTree(array $params = ['collection_id', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface commonsGetInstitutions()
 * @method \Psr\Http\Message\ResponseInterface contactsGetList(array $params = ['filter', 'page', 'per_page', 'sort'])
 * @method \Psr\Http\Message\ResponseInterface contactsGetListRecentlyUploaded(array $params = ['date_lastupload', 'filter'])
 * @method \Psr\Http\Message\ResponseInterface contactsGetPublicList(array $params = ['user_id', 'page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface contactsGetTaggingSuggestions(array $params = ['per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface favoritesAdd(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface favoritesGetContext(array $params = ['photo_id', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface favoritesGetList(array $params = ['user_id', 'min_fave_date', 'max_fave_date', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface favoritesGetPublicList(array $params = ['user_id', 'min_fave_date', 'max_fave_date', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface favoritesRemove(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface galleriesAddPhoto(array $params = ['gallery_id', 'photo_id', 'comment', 'full_response'])
 * @method \Psr\Http\Message\ResponseInterface galleriesCreate(array $params = ['title', 'description', 'primary_photo_id', 'full_result'])
 * @method \Psr\Http\Message\ResponseInterface galleriesEditMeta(array $params = ['gallery_id', 'title', 'description'])
 * @method \Psr\Http\Message\ResponseInterface galleriesEditPhoto(array $params = ['gallery_id', 'photo_id', 'comment'])
 * @method \Psr\Http\Message\ResponseInterface galleriesEditPhotos(array $params = ['gallery_id', 'primary_photo_id', 'photo_ids'])
 * @method \Psr\Http\Message\ResponseInterface galleriesGetInfo(array $params = ['gallery_id', 'primary_photo_size', 'cover_photos_size', 'limit', 'short_limit'])
 * @method \Psr\Http\Message\ResponseInterface galleriesGetList(array $params = ['user_id', 'per_page', 'page', 'primary_photo_extras', 'continuation', 'sort_groups', 'photo_ids', 'cover_photos', 'primary_photo_cover_size', 'cover_photos_size', 'limit', 'short_limit'])
 * @method \Psr\Http\Message\ResponseInterface galleriesGetListForPhoto(array $params = ['photo_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface galleriesGetPhotos(array $params = ['gallery_id', 'continuation', 'get_user_info', 'get_gallery_info', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface galleriesRemovePhoto(array $params = ['gallery_id', 'photo_id', 'full_response'])
 * @method \Psr\Http\Message\ResponseInterface groupsBrowse(array $params = ['cat_id'])
 * @method \Psr\Http\Message\ResponseInterface groupsDiscussRepliesAdd(array $params = ['group_id', 'topic_id', 'message'])
 * @method \Psr\Http\Message\ResponseInterface groupsDiscussRepliesDelete(array $params = ['group_id', 'topic_id', 'reply_id'])
 * @method \Psr\Http\Message\ResponseInterface groupsDiscussRepliesEdit(array $params = ['group_id', 'topic_id', 'reply_id', 'message'])
 * @method \Psr\Http\Message\ResponseInterface groupsDiscussRepliesGetInfo(array $params = ['group_id', 'topic_id', 'reply_id'])
 * @method \Psr\Http\Message\ResponseInterface groupsDiscussRepliesGetList(array $params = ['group_id', 'topic_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface groupsDiscussTopicsAdd(array $params = ['group_id', 'subject', 'message'])
 * @method \Psr\Http\Message\ResponseInterface groupsDiscussTopicsGetInfo(array $params = ['group_id', 'topic_id'])
 * @method \Psr\Http\Message\ResponseInterface groupsDiscussTopicsGetList(array $params = ['group_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface groupsGetInfo(array $params = ['group_id', 'group_path_alias', 'lang'])
 * @method \Psr\Http\Message\ResponseInterface groupsJoin(array $params = ['group_id', 'accept_rules'])
 * @method \Psr\Http\Message\ResponseInterface groupsJoinRequest(array $params = ['group_id', 'message', 'accept_rules'])
 * @method \Psr\Http\Message\ResponseInterface groupsLeave(array $params = ['group_id', 'delete_photos'])
 * @method \Psr\Http\Message\ResponseInterface groupsMembersGetList(array $params = ['group_id', 'membertypes', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface groupsPoolsAdd(array $params = ['photo_id', 'group_id'])
 * @method \Psr\Http\Message\ResponseInterface groupsPoolsGetContext(array $params = ['photo_id', 'group_id'])
 * @method \Psr\Http\Message\ResponseInterface groupsPoolsGetGroups(array $params = ['page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface groupsPoolsGetPhotos(array $params = ['group_id', 'tags', 'user_id', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface groupsPoolsRemove(array $params = ['photo_id', 'group_id'])
 * @method \Psr\Http\Message\ResponseInterface groupsSearch(array $params = ['text', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface interestingnessGetList(array $params = ['date', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface machinetagsGetNamespaces(array $params = ['predicate', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface machinetagsGetPairs(array $params = ['namespace', 'predicate', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface machinetagsGetPredicates(array $params = ['namespace', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface machinetagsGetRecentValues(array $params = ['namespace', 'predicate', 'added_since'])
 * @method \Psr\Http\Message\ResponseInterface machinetagsGetValues(array $params = ['namespace', 'predicate', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface pandaGetList()
 * @method \Psr\Http\Message\ResponseInterface pandaGetPhotos(array $params = ['panda_name', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface peopleFindByEmail(array $params = ['find_email'])
 * @method \Psr\Http\Message\ResponseInterface peopleFindByUsername(array $params = ['username'])
 * @method \Psr\Http\Message\ResponseInterface peopleGetGroups(array $params = ['user_id', 'extras'])
 * @method \Psr\Http\Message\ResponseInterface peopleGetInfo(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface peopleGetLimits()
 * @method \Psr\Http\Message\ResponseInterface peopleGetPhotos(array $params = ['user_id', 'safe_search', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date', 'content_type', 'privacy_filter', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface peopleGetPhotosOf(array $params = ['user_id', 'owner_id', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface peopleGetPublicGroups(array $params = ['user_id', 'invitation_only'])
 * @method \Psr\Http\Message\ResponseInterface peopleGetPublicPhotos(array $params = ['user_id', 'safe_search', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface peopleGetUploadStatus()
 * @method \Psr\Http\Message\ResponseInterface photosAddTags(array $params = ['photo_id', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface photosCommentsAddComment(array $params = ['photo_id', 'comment_text'])
 * @method \Psr\Http\Message\ResponseInterface photosCommentsDeleteComment(array $params = ['comment_id'])
 * @method \Psr\Http\Message\ResponseInterface photosCommentsEditComment(array $params = ['comment_id', 'comment_text'])
 * @method \Psr\Http\Message\ResponseInterface photosCommentsGetList(array $params = ['photo_id', 'min_comment_date', 'max_comment_date'])
 * @method \Psr\Http\Message\ResponseInterface photosCommentsGetRecentForContacts(array $params = ['date_lastcomment', 'contacts_filter', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosDelete(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoBatchCorrectLocation(array $params = ['lat', 'lon', 'accuracy', 'place_id', 'woe_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoCorrectLocation(array $params = ['photo_id', 'place_id', 'woe_id', 'foursquare_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoGetLocation(array $params = ['photo_id', 'extras'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoGetPerms(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoPhotosForLocation(array $params = ['lat', 'lon', 'accuracy', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoRemoveLocation(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoSetContext(array $params = ['photo_id', 'context'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoSetLocation(array $params = ['photo_id', 'lat', 'lon', 'accuracy', 'context'])
 * @method \Psr\Http\Message\ResponseInterface photosGeoSetPerms(array $params = ['is_public', 'is_contact', 'is_friend', 'is_family', 'photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGetAllContexts(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGetContactsPhotos(array $params = ['count', 'just_friends', 'single_photo', 'include_self', 'extras'])
 * @method \Psr\Http\Message\ResponseInterface photosGetContactsPublicPhotos(array $params = ['user_id', 'count', 'just_friends', 'single_photo', 'include_self', 'extras'])
 * @method \Psr\Http\Message\ResponseInterface photosGetContext(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGetCounts(array $params = ['dates', 'taken_dates'])
 * @method \Psr\Http\Message\ResponseInterface photosGetExif(array $params = ['photo_id', 'secret'])
 * @method \Psr\Http\Message\ResponseInterface photosGetFavorites(array $params = ['photo_id', 'page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface photosGetInfo(array $params = ['photo_id', 'secret'])
 * @method \Psr\Http\Message\ResponseInterface photosGetNotInSet(array $params = ['max_upload_date', 'min_taken_date', 'max_taken_date', 'privacy_filter', 'media', 'min_upload_date', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosGetPerms(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGetPopular(array $params = ['user_id', 'sort', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosGetRecent(array $params = ['extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosGetSizes(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosGetUntagged(array $params = ['min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date', 'privacy_filter', 'media', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosGetWithGeoData(array $params = ['min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date', 'privacy_filter', 'sort', 'media', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosGetWithoutGeoData(array $params = ['max_upload_date', 'min_taken_date', 'max_taken_date', 'privacy_filter', 'sort', 'media', 'min_upload_date', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosLicensesGetInfo()
 * @method \Psr\Http\Message\ResponseInterface photosLicensesSetLicense(array $params = ['photo_id', 'license_id'])
 * @method \Psr\Http\Message\ResponseInterface photosNotesAdd(array $params = ['photo_id', 'note_x', 'note_y', 'note_w', 'note_h', 'note_text'])
 * @method \Psr\Http\Message\ResponseInterface photosNotesDelete(array $params = ['note_id'])
 * @method \Psr\Http\Message\ResponseInterface photosNotesEdit(array $params = ['note_id', 'note_x', 'note_y', 'note_w', 'note_h', 'note_text'])
 * @method \Psr\Http\Message\ResponseInterface photosPeopleAdd(array $params = ['photo_id', 'user_id', 'person_x', 'person_y', 'person_w', 'person_h'])
 * @method \Psr\Http\Message\ResponseInterface photosPeopleDelete(array $params = ['photo_id', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface photosPeopleDeleteCoords(array $params = ['photo_id', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface photosPeopleEditCoords(array $params = ['photo_id', 'user_id', 'person_x', 'person_y', 'person_w', 'person_h'])
 * @method \Psr\Http\Message\ResponseInterface photosPeopleGetList(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosRecentlyUpdated(array $params = ['min_date', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosRemoveTag(array $params = ['tag_id'])
 * @method \Psr\Http\Message\ResponseInterface photosSearch(array $params = ['user_id', 'tags', 'tag_mode', 'text', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date', 'license', 'sort', 'privacy_filter', 'bbox', 'accuracy', 'safe_search', 'content_type', 'machine_tags', 'machine_tag_mode', 'group_id', 'contacts', 'woe_id', 'place_id', 'media', 'has_geo', 'geo_context', 'lat', 'lon', 'radius', 'radius_units', 'is_commons', 'in_gallery', 'is_getty', 'extras', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface photosSetContentType(array $params = ['photo_id', 'content_type'])
 * @method \Psr\Http\Message\ResponseInterface photosSetDates(array $params = ['photo_id', 'date_posted', 'date_taken', 'date_taken_granularity'])
 * @method \Psr\Http\Message\ResponseInterface photosSetMeta(array $params = ['photo_id', 'title', 'description'])
 * @method \Psr\Http\Message\ResponseInterface photosSetPerms(array $params = ['photo_id', 'is_public', 'is_friend', 'is_family', 'perm_comment', 'perm_addmeta'])
 * @method \Psr\Http\Message\ResponseInterface photosSetSafetyLevel(array $params = ['photo_id', 'safety_level', 'hidden'])
 * @method \Psr\Http\Message\ResponseInterface photosSetTags(array $params = ['photo_id', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface photosSuggestionsApproveSuggestion(array $params = ['suggestion_id'])
 * @method \Psr\Http\Message\ResponseInterface photosSuggestionsGetList(array $params = ['photo_id', 'status_id'])
 * @method \Psr\Http\Message\ResponseInterface photosSuggestionsRejectSuggestion(array $params = ['suggestion_id'])
 * @method \Psr\Http\Message\ResponseInterface photosSuggestionsRemoveSuggestion(array $params = ['suggestion_id'])
 * @method \Psr\Http\Message\ResponseInterface photosSuggestionsSuggestLocation(array $params = ['photo_id', 'lat', 'lon', 'accuracy', 'woe_id', 'place_id', 'note'])
 * @method \Psr\Http\Message\ResponseInterface photosTransformRotate(array $params = ['photo_id', 'degrees'])
 * @method \Psr\Http\Message\ResponseInterface photosUploadCheckTickets(array $params = ['tickets'])
 * @method \Psr\Http\Message\ResponseInterface photosetsAddPhoto(array $params = ['photoset_id', 'photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosetsCommentsAddComment(array $params = ['photoset_id', 'comment_text'])
 * @method \Psr\Http\Message\ResponseInterface photosetsCommentsDeleteComment(array $params = ['comment_id'])
 * @method \Psr\Http\Message\ResponseInterface photosetsCommentsEditComment(array $params = ['comment_id', 'comment_text'])
 * @method \Psr\Http\Message\ResponseInterface photosetsCommentsGetList(array $params = ['photoset_id'])
 * @method \Psr\Http\Message\ResponseInterface photosetsCreate(array $params = ['title', 'description', 'primary_photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosetsDelete(array $params = ['photoset_id'])
 * @method \Psr\Http\Message\ResponseInterface photosetsEditMeta(array $params = ['photoset_id', 'title', 'description'])
 * @method \Psr\Http\Message\ResponseInterface photosetsEditPhotos(array $params = ['photoset_id', 'primary_photo_id', 'photo_ids'])
 * @method \Psr\Http\Message\ResponseInterface photosetsGetContext(array $params = ['photo_id', 'photoset_id'])
 * @method \Psr\Http\Message\ResponseInterface photosetsGetInfo(array $params = ['photoset_id', 'user_id'])
 * @method \Psr\Http\Message\ResponseInterface photosetsGetList(array $params = ['user_id', 'page', 'per_page', 'primary_photo_extras', 'photo_ids', 'sort_groups'])
 * @method \Psr\Http\Message\ResponseInterface photosetsGetPhotos(array $params = ['photoset_id', 'user_id', 'extras', 'per_page', 'page', 'privacy_filter', 'media'])
 * @method \Psr\Http\Message\ResponseInterface photosetsOrderSets(array $params = ['photoset_ids'])
 * @method \Psr\Http\Message\ResponseInterface photosetsRemovePhoto(array $params = ['photoset_id', 'photo_id'])
 * @method \Psr\Http\Message\ResponseInterface photosetsRemovePhotos(array $params = ['photoset_id', 'photo_ids'])
 * @method \Psr\Http\Message\ResponseInterface photosetsReorderPhotos(array $params = ['photoset_id', 'photo_ids'])
 * @method \Psr\Http\Message\ResponseInterface photosetsSetPrimaryPhoto(array $params = ['photoset_id', 'photo_id'])
 * @method \Psr\Http\Message\ResponseInterface placesFind(array $params = ['query'])
 * @method \Psr\Http\Message\ResponseInterface placesFindByLatLon(array $params = ['lat', 'lon', 'accuracy'])
 * @method \Psr\Http\Message\ResponseInterface placesGetChildrenWithPhotosPublic(array $params = ['place_id', 'woe_id'])
 * @method \Psr\Http\Message\ResponseInterface placesGetInfo(array $params = ['place_id', 'woe_id'])
 * @method \Psr\Http\Message\ResponseInterface placesGetInfoByUrl(array $params = ['url'])
 * @method \Psr\Http\Message\ResponseInterface placesGetPlaceTypes()
 * @method \Psr\Http\Message\ResponseInterface placesGetShapeHistory(array $params = ['place_id', 'woe_id'])
 * @method \Psr\Http\Message\ResponseInterface placesGetTopPlacesList(array $params = ['place_type_id', 'date', 'woe_id', 'place_id'])
 * @method \Psr\Http\Message\ResponseInterface placesPlacesForBoundingBox(array $params = ['bbox', 'place_type', 'place_type_id'])
 * @method \Psr\Http\Message\ResponseInterface placesPlacesForContacts(array $params = ['place_type', 'place_type_id', 'woe_id', 'place_id', 'threshold', 'contacts', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date'])
 * @method \Psr\Http\Message\ResponseInterface placesPlacesForTags(array $params = ['place_type_id', 'woe_id', 'place_id', 'threshold', 'tags', 'tag_mode', 'machine_tags', 'machine_tag_mode', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date'])
 * @method \Psr\Http\Message\ResponseInterface placesPlacesForUser(array $params = ['place_type_id', 'place_type', 'woe_id', 'place_id', 'threshold', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date'])
 * @method \Psr\Http\Message\ResponseInterface placesResolvePlaceId(array $params = ['place_id'])
 * @method \Psr\Http\Message\ResponseInterface placesResolvePlaceURL(array $params = ['url'])
 * @method \Psr\Http\Message\ResponseInterface placesTagsForPlace(array $params = ['woe_id', 'place_id', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date'])
 * @method \Psr\Http\Message\ResponseInterface prefsGetContentType()
 * @method \Psr\Http\Message\ResponseInterface prefsGetGeoPerms()
 * @method \Psr\Http\Message\ResponseInterface prefsGetHidden()
 * @method \Psr\Http\Message\ResponseInterface prefsGetPrivacy()
 * @method \Psr\Http\Message\ResponseInterface prefsGetSafetyLevel()
 * @method \Psr\Http\Message\ResponseInterface profileGetProfile(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface pushGetSubscriptions()
 * @method \Psr\Http\Message\ResponseInterface pushGetTopics()
 * @method \Psr\Http\Message\ResponseInterface pushSubscribe(array $params = ['topic', 'callback', 'verify', 'verify_token', 'lease_seconds', 'woe_ids', 'place_ids', 'lat', 'lon', 'radius', 'radius_units', 'accuracy', 'nsids', 'tags'])
 * @method \Psr\Http\Message\ResponseInterface pushUnsubscribe(array $params = ['topic', 'callback', 'verify', 'verify_token'])
 * @method \Psr\Http\Message\ResponseInterface reflectionGetMethodInfo(array $params = ['method_name'])
 * @method \Psr\Http\Message\ResponseInterface reflectionGetMethods()
 * @method \Psr\Http\Message\ResponseInterface statsGetCSVFiles()
 * @method \Psr\Http\Message\ResponseInterface statsGetCollectionDomains(array $params = ['date', 'collection_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetCollectionReferrers(array $params = ['date', 'domain', 'collection_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetCollectionStats(array $params = ['date', 'collection_id'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotoDomains(array $params = ['date', 'photo_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotoReferrers(array $params = ['date', 'domain', 'photo_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotoStats(array $params = ['date', 'photo_id'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotosetDomains(array $params = ['date', 'photoset_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotosetReferrers(array $params = ['date', 'domain', 'photoset_id', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotosetStats(array $params = ['date', 'photoset_id'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotostreamDomains(array $params = ['date', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotostreamReferrers(array $params = ['date', 'domain', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPhotostreamStats(array $params = ['date'])
 * @method \Psr\Http\Message\ResponseInterface statsGetPopularPhotos(array $params = ['date', 'sort', 'per_page', 'page'])
 * @method \Psr\Http\Message\ResponseInterface statsGetTotalViews(array $params = ['date'])
 * @method \Psr\Http\Message\ResponseInterface tagsGetClusterPhotos(array $params = ['tag', 'cluster_id'])
 * @method \Psr\Http\Message\ResponseInterface tagsGetClusters(array $params = ['tag'])
 * @method \Psr\Http\Message\ResponseInterface tagsGetHotList(array $params = ['period', 'count'])
 * @method \Psr\Http\Message\ResponseInterface tagsGetListPhoto(array $params = ['photo_id'])
 * @method \Psr\Http\Message\ResponseInterface tagsGetListUser(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface tagsGetListUserPopular(array $params = ['user_id', 'count'])
 * @method \Psr\Http\Message\ResponseInterface tagsGetListUserRaw(array $params = ['tag'])
 * @method \Psr\Http\Message\ResponseInterface tagsGetMostFrequentlyUsed()
 * @method \Psr\Http\Message\ResponseInterface tagsGetRelated(array $params = ['tag'])
 * @method \Psr\Http\Message\ResponseInterface testEcho()
 * @method \Psr\Http\Message\ResponseInterface testLogin()
 * @method \Psr\Http\Message\ResponseInterface testNull()
 * @method \Psr\Http\Message\ResponseInterface testimonialsAddTestimonial(array $params = ['user_id', 'testimonial_text'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsApproveTestimonial(array $params = ['testimonial_id'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsDeleteTestimonial(array $params = ['testimonial_id'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsEditTestimonial(array $params = ['user_id', 'testimonial_id', 'testimonial_text'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetAllTestimonialsAbout(array $params = ['page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetAllTestimonialsAboutBy(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetAllTestimonialsBy(array $params = ['page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetPendingTestimonialsAbout(array $params = ['page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetPendingTestimonialsAboutBy(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetPendingTestimonialsBy(array $params = ['page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetTestimonialsAbout(array $params = ['user_id', 'page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetTestimonialsAboutBy(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface testimonialsGetTestimonialsBy(array $params = ['user_id', 'page', 'per_page'])
 * @method \Psr\Http\Message\ResponseInterface urlsGetGroup(array $params = ['group_id'])
 * @method \Psr\Http\Message\ResponseInterface urlsGetUserPhotos(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface urlsGetUserProfile(array $params = ['user_id'])
 * @method \Psr\Http\Message\ResponseInterface urlsLookupGallery(array $params = ['url'])
 * @method \Psr\Http\Message\ResponseInterface urlsLookupGroup(array $params = ['url'])
 * @method \Psr\Http\Message\ResponseInterface urlsLookupUser(array $params = ['url'])
 */
class Flickr extends OAuth1Provider{

	public const PERM_READ   = 'read';
	public const PERM_WRITE  = 'write';
	public const PERM_DELETE = 'delete';

	protected string $requestTokenURL = 'https://www.flickr.com/services/oauth/request_token';
	protected string $authURL         = 'https://www.flickr.com/services/oauth/authorize';
	protected string $accessTokenURL  = 'https://www.flickr.com/services/oauth/access_token';
	protected ?string $apiURL          = 'https://api.flickr.com/services/rest';
	protected ?string $userRevokeURL   = 'https://www.flickr.com/services/auth/list.gne';
	protected ?string $endpointMap     = FlickrEndpoints::class;
	protected ?string $apiDocs         = 'https://www.flickr.com/services/api/';
	protected ?string $applicationURL  = 'https://www.flickr.com/services/apps/create/';

	/**
	 * @inheritDoc
	 */
	public function request(
		string $path,
		array $params = null,
		string $method = null,
		$body = null,
		array $headers = null
	):ResponseInterface{

		$params = array_merge($params ?? [], [
			'method'         => $path,
			'format'         => 'json',
			'nojsoncallback' => true,
		]);

		$request = $this->getRequestAuthorization(
			/** @phan-suppress-next-line PhanTypeMismatchArgumentNullable */
			$this->requestFactory->createRequest($method ?? 'POST', merge_query($this->apiURL, $params)),
			$this->storage->getAccessToken($this->serviceName)
		);

		return $this->http->sendRequest($request);
	}

}
