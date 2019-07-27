<?php
/**
 * Class FlickrEndpoints (auto created)
 *
 * @link https://www.flickr.com/services/api/
 *
 * @filesource   FlickrEndpoints.php
 * @created      27.07.2019
 * @package      chillerlan\OAuth\Providers\Flickr
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Flickr;

use chillerlan\HTTP\MagicAPI\EndpointMap;

class FlickrEndpoints extends EndpointMap{

	/**
	 * @link https://www.flickr.com/services/api/flickr.activity.userComments.html
	 */
	protected $activityUserComments = [
		'path'  => 'flickr.activity.userComments',
		'query' => ['per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.activity.userPhotos.html
	 */
	protected $activityUserPhotos = [
		'path'  => 'flickr.activity.userPhotos',
		'query' => ['timeframe', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.auth.checkToken.html
	 */
	protected $authCheckToken = [
		'path'  => 'flickr.auth.checkToken',
		'query' => ['auth_token'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.auth.getFrob.html
	 */
	protected $authGetFrob = [
		'path'  => 'flickr.auth.getFrob',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.auth.getFullToken.html
	 */
	protected $authGetFullToken = [
		'path'  => 'flickr.auth.getFullToken',
		'query' => ['mini_token'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.auth.getToken.html
	 */
	protected $authGetToken = [
		'path'  => 'flickr.auth.getToken',
		'query' => ['frob'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.auth.oauth.checkToken.html
	 */
	protected $authOauthCheckToken = [
		'path'  => 'flickr.auth.oauth.checkToken',
		'query' => ['oauth_token'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.auth.oauth.getAccessToken.html
	 */
	protected $authOauthGetAccessToken = [
		'path'  => 'flickr.auth.oauth.getAccessToken',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.blogs.getList.html
	 */
	protected $blogsGetList = [
		'path'  => 'flickr.blogs.getList',
		'query' => ['service'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.blogs.getServices.html
	 */
	protected $blogsGetServices = [
		'path'  => 'flickr.blogs.getServices',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.blogs.postPhoto.html
	 */
	protected $blogsPostPhoto = [
		'path'  => 'flickr.blogs.postPhoto',
		'query' => ['blog_id', 'photo_id', 'title', 'description', 'blog_password', 'service'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.cameras.getBrandModels.html
	 */
	protected $camerasGetBrandModels = [
		'path'  => 'flickr.cameras.getBrandModels',
		'query' => ['brand'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.cameras.getBrands.html
	 */
	protected $camerasGetBrands = [
		'path'  => 'flickr.cameras.getBrands',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.collections.getInfo.html
	 */
	protected $collectionsGetInfo = [
		'path'  => 'flickr.collections.getInfo',
		'query' => ['collection_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.collections.getTree.html
	 */
	protected $collectionsGetTree = [
		'path'  => 'flickr.collections.getTree',
		'query' => ['collection_id', 'user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.commons.getInstitutions.html
	 */
	protected $commonsGetInstitutions = [
		'path'  => 'flickr.commons.getInstitutions',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.contacts.getList.html
	 */
	protected $contactsGetList = [
		'path'  => 'flickr.contacts.getList',
		'query' => ['filter', 'page', 'per_page', 'sort'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.contacts.getListRecentlyUploaded.html
	 */
	protected $contactsGetListRecentlyUploaded = [
		'path'  => 'flickr.contacts.getListRecentlyUploaded',
		'query' => ['date_lastupload', 'filter'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.contacts.getPublicList.html
	 */
	protected $contactsGetPublicList = [
		'path'  => 'flickr.contacts.getPublicList',
		'query' => ['user_id', 'page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.contacts.getTaggingSuggestions.html
	 */
	protected $contactsGetTaggingSuggestions = [
		'path'  => 'flickr.contacts.getTaggingSuggestions',
		'query' => ['per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.favorites.add.html
	 */
	protected $favoritesAdd = [
		'path'  => 'flickr.favorites.add',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.favorites.getContext.html
	 */
	protected $favoritesGetContext = [
		'path'  => 'flickr.favorites.getContext',
		'query' => ['photo_id', 'user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.favorites.getList.html
	 */
	protected $favoritesGetList = [
		'path'  => 'flickr.favorites.getList',
		'query' => ['user_id', 'min_fave_date', 'max_fave_date', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.favorites.getPublicList.html
	 */
	protected $favoritesGetPublicList = [
		'path'  => 'flickr.favorites.getPublicList',
		'query' => ['user_id', 'min_fave_date', 'max_fave_date', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.favorites.remove.html
	 */
	protected $favoritesRemove = [
		'path'  => 'flickr.favorites.remove',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.addPhoto.html
	 */
	protected $galleriesAddPhoto = [
		'path'  => 'flickr.galleries.addPhoto',
		'query' => ['gallery_id', 'photo_id', 'comment', 'full_response'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.create.html
	 */
	protected $galleriesCreate = [
		'path'  => 'flickr.galleries.create',
		'query' => ['title', 'description', 'primary_photo_id', 'full_result'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.editMeta.html
	 */
	protected $galleriesEditMeta = [
		'path'  => 'flickr.galleries.editMeta',
		'query' => ['gallery_id', 'title', 'description'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.editPhoto.html
	 */
	protected $galleriesEditPhoto = [
		'path'  => 'flickr.galleries.editPhoto',
		'query' => ['gallery_id', 'photo_id', 'comment'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.editPhotos.html
	 */
	protected $galleriesEditPhotos = [
		'path'  => 'flickr.galleries.editPhotos',
		'query' => ['gallery_id', 'primary_photo_id', 'photo_ids'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.getInfo.html
	 */
	protected $galleriesGetInfo = [
		'path'  => 'flickr.galleries.getInfo',
		'query' => ['gallery_id', 'primary_photo_size', 'cover_photos_size', 'limit', 'short_limit'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.getList.html
	 */
	protected $galleriesGetList = [
		'path'  => 'flickr.galleries.getList',
		'query' => ['user_id', 'per_page', 'page', 'primary_photo_extras', 'continuation', 'sort_groups', 'photo_ids', 'cover_photos', 'primary_photo_cover_size', 'cover_photos_size', 'limit', 'short_limit'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.getListForPhoto.html
	 */
	protected $galleriesGetListForPhoto = [
		'path'  => 'flickr.galleries.getListForPhoto',
		'query' => ['photo_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.getPhotos.html
	 */
	protected $galleriesGetPhotos = [
		'path'  => 'flickr.galleries.getPhotos',
		'query' => ['gallery_id', 'continuation', 'per_page', 'get_user_info', 'get_gallery_info', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.galleries.removePhoto.html
	 */
	protected $galleriesRemovePhoto = [
		'path'  => 'flickr.galleries.removePhoto',
		'query' => ['gallery_id', 'photo_id', 'full_response'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.browse.html
	 */
	protected $groupsBrowse = [
		'path'  => 'flickr.groups.browse',
		'query' => ['cat_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.discuss.replies.add.html
	 */
	protected $groupsDiscussRepliesAdd = [
		'path'  => 'flickr.groups.discuss.replies.add',
		'query' => ['group_id', 'topic_id', 'message'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.discuss.replies.delete.html
	 */
	protected $groupsDiscussRepliesDelete = [
		'path'  => 'flickr.groups.discuss.replies.delete',
		'query' => ['group_id', 'topic_id', 'reply_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.discuss.replies.edit.html
	 */
	protected $groupsDiscussRepliesEdit = [
		'path'  => 'flickr.groups.discuss.replies.edit',
		'query' => ['group_id', 'topic_id', 'reply_id', 'message'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.discuss.replies.getInfo.html
	 */
	protected $groupsDiscussRepliesGetInfo = [
		'path'  => 'flickr.groups.discuss.replies.getInfo',
		'query' => ['group_id', 'topic_id', 'reply_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.discuss.replies.getList.html
	 */
	protected $groupsDiscussRepliesGetList = [
		'path'  => 'flickr.groups.discuss.replies.getList',
		'query' => ['group_id', 'topic_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.discuss.topics.add.html
	 */
	protected $groupsDiscussTopicsAdd = [
		'path'  => 'flickr.groups.discuss.topics.add',
		'query' => ['group_id', 'subject', 'message'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.discuss.topics.getInfo.html
	 */
	protected $groupsDiscussTopicsGetInfo = [
		'path'  => 'flickr.groups.discuss.topics.getInfo',
		'query' => ['group_id', 'topic_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.discuss.topics.getList.html
	 */
	protected $groupsDiscussTopicsGetList = [
		'path'  => 'flickr.groups.discuss.topics.getList',
		'query' => ['group_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.getInfo.html
	 */
	protected $groupsGetInfo = [
		'path'  => 'flickr.groups.getInfo',
		'query' => ['group_id', 'group_path_alias', 'lang'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.join.html
	 */
	protected $groupsJoin = [
		'path'  => 'flickr.groups.join',
		'query' => ['group_id', 'accept_rules'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.joinRequest.html
	 */
	protected $groupsJoinRequest = [
		'path'  => 'flickr.groups.joinRequest',
		'query' => ['group_id', 'message', 'accept_rules'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.leave.html
	 */
	protected $groupsLeave = [
		'path'  => 'flickr.groups.leave',
		'query' => ['group_id', 'delete_photos'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.members.getList.html
	 */
	protected $groupsMembersGetList = [
		'path'  => 'flickr.groups.members.getList',
		'query' => ['group_id', 'membertypes', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.pools.add.html
	 */
	protected $groupsPoolsAdd = [
		'path'  => 'flickr.groups.pools.add',
		'query' => ['photo_id', 'group_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.pools.getContext.html
	 */
	protected $groupsPoolsGetContext = [
		'path'  => 'flickr.groups.pools.getContext',
		'query' => ['photo_id', 'group_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.pools.getGroups.html
	 */
	protected $groupsPoolsGetGroups = [
		'path'  => 'flickr.groups.pools.getGroups',
		'query' => ['page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.pools.getPhotos.html
	 */
	protected $groupsPoolsGetPhotos = [
		'path'  => 'flickr.groups.pools.getPhotos',
		'query' => ['group_id', 'tags', 'user_id', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.pools.remove.html
	 */
	protected $groupsPoolsRemove = [
		'path'  => 'flickr.groups.pools.remove',
		'query' => ['photo_id', 'group_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.groups.search.html
	 */
	protected $groupsSearch = [
		'path'  => 'flickr.groups.search',
		'query' => ['text', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.interestingness.getList.html
	 */
	protected $interestingnessGetList = [
		'path'  => 'flickr.interestingness.getList',
		'query' => ['date', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.machinetags.getNamespaces.html
	 */
	protected $machinetagsGetNamespaces = [
		'path'  => 'flickr.machinetags.getNamespaces',
		'query' => ['predicate', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.machinetags.getPairs.html
	 */
	protected $machinetagsGetPairs = [
		'path'  => 'flickr.machinetags.getPairs',
		'query' => ['namespace', 'predicate', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.machinetags.getPredicates.html
	 */
	protected $machinetagsGetPredicates = [
		'path'  => 'flickr.machinetags.getPredicates',
		'query' => ['namespace', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.machinetags.getRecentValues.html
	 */
	protected $machinetagsGetRecentValues = [
		'path'  => 'flickr.machinetags.getRecentValues',
		'query' => ['namespace', 'predicate', 'added_since'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.machinetags.getValues.html
	 */
	protected $machinetagsGetValues = [
		'path'  => 'flickr.machinetags.getValues',
		'query' => ['namespace', 'predicate', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.panda.getList.html
	 */
	protected $pandaGetList = [
		'path'  => 'flickr.panda.getList',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.panda.getPhotos.html
	 */
	protected $pandaGetPhotos = [
		'path'  => 'flickr.panda.getPhotos',
		'query' => ['panda_name', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.findByEmail.html
	 */
	protected $peopleFindByEmail = [
		'path'  => 'flickr.people.findByEmail',
		'query' => ['find_email'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.findByUsername.html
	 */
	protected $peopleFindByUsername = [
		'path'  => 'flickr.people.findByUsername',
		'query' => ['username'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.getGroups.html
	 */
	protected $peopleGetGroups = [
		'path'  => 'flickr.people.getGroups',
		'query' => ['user_id', 'extras'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.getInfo.html
	 */
	protected $peopleGetInfo = [
		'path'  => 'flickr.people.getInfo',
		'query' => ['user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.getLimits.html
	 */
	protected $peopleGetLimits = [
		'path'  => 'flickr.people.getLimits',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.getPhotos.html
	 */
	protected $peopleGetPhotos = [
		'path'  => 'flickr.people.getPhotos',
		'query' => ['user_id', 'safe_search', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date', 'content_type', 'privacy_filter', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.getPhotosOf.html
	 */
	protected $peopleGetPhotosOf = [
		'path'  => 'flickr.people.getPhotosOf',
		'query' => ['user_id', 'owner_id', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.getPublicGroups.html
	 */
	protected $peopleGetPublicGroups = [
		'path'  => 'flickr.people.getPublicGroups',
		'query' => ['user_id', 'invitation_only'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.getPublicPhotos.html
	 */
	protected $peopleGetPublicPhotos = [
		'path'  => 'flickr.people.getPublicPhotos',
		'query' => ['user_id', 'safe_search', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.people.getUploadStatus.html
	 */
	protected $peopleGetUploadStatus = [
		'path'  => 'flickr.people.getUploadStatus',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.addTags.html
	 */
	protected $photosAddTags = [
		'path'  => 'flickr.photos.addTags',
		'query' => ['photo_id', 'tags'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.comments.addComment.html
	 */
	protected $photosCommentsAddComment = [
		'path'  => 'flickr.photos.comments.addComment',
		'query' => ['photo_id', 'comment_text'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.comments.deleteComment.html
	 */
	protected $photosCommentsDeleteComment = [
		'path'  => 'flickr.photos.comments.deleteComment',
		'query' => ['comment_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.comments.editComment.html
	 */
	protected $photosCommentsEditComment = [
		'path'  => 'flickr.photos.comments.editComment',
		'query' => ['comment_id', 'comment_text'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.comments.getList.html
	 */
	protected $photosCommentsGetList = [
		'path'  => 'flickr.photos.comments.getList',
		'query' => ['photo_id', 'min_comment_date', 'max_comment_date'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.comments.getRecentForContacts.html
	 */
	protected $photosCommentsGetRecentForContacts = [
		'path'  => 'flickr.photos.comments.getRecentForContacts',
		'query' => ['date_lastcomment', 'contacts_filter', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.delete.html
	 */
	protected $photosDelete = [
		'path'  => 'flickr.photos.delete',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.batchCorrectLocation.html
	 */
	protected $photosGeoBatchCorrectLocation = [
		'path'  => 'flickr.photos.geo.batchCorrectLocation',
		'query' => ['lat', 'lon', 'accuracy', 'place_id', 'woe_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.correctLocation.html
	 */
	protected $photosGeoCorrectLocation = [
		'path'  => 'flickr.photos.geo.correctLocation',
		'query' => ['photo_id', 'place_id', 'woe_id', 'foursquare_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.getLocation.html
	 */
	protected $photosGeoGetLocation = [
		'path'  => 'flickr.photos.geo.getLocation',
		'query' => ['photo_id', 'extras'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.getPerms.html
	 */
	protected $photosGeoGetPerms = [
		'path'  => 'flickr.photos.geo.getPerms',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.photosForLocation.html
	 */
	protected $photosGeoPhotosForLocation = [
		'path'  => 'flickr.photos.geo.photosForLocation',
		'query' => ['lat', 'lon', 'accuracy', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.removeLocation.html
	 */
	protected $photosGeoRemoveLocation = [
		'path'  => 'flickr.photos.geo.removeLocation',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.setContext.html
	 */
	protected $photosGeoSetContext = [
		'path'  => 'flickr.photos.geo.setContext',
		'query' => ['photo_id', 'context'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.setLocation.html
	 */
	protected $photosGeoSetLocation = [
		'path'  => 'flickr.photos.geo.setLocation',
		'query' => ['photo_id', 'lat', 'lon', 'accuracy', 'context'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.geo.setPerms.html
	 */
	protected $photosGeoSetPerms = [
		'path'  => 'flickr.photos.geo.setPerms',
		'query' => ['is_public', 'is_contact', 'is_friend', 'is_family', 'photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getAllContexts.html
	 */
	protected $photosGetAllContexts = [
		'path'  => 'flickr.photos.getAllContexts',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getContactsPhotos.html
	 */
	protected $photosGetContactsPhotos = [
		'path'  => 'flickr.photos.getContactsPhotos',
		'query' => ['count', 'just_friends', 'single_photo', 'include_self', 'extras'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getContactsPublicPhotos.html
	 */
	protected $photosGetContactsPublicPhotos = [
		'path'  => 'flickr.photos.getContactsPublicPhotos',
		'query' => ['user_id', 'count', 'just_friends', 'single_photo', 'include_self', 'extras'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getContext.html
	 */
	protected $photosGetContext = [
		'path'  => 'flickr.photos.getContext',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getCounts.html
	 */
	protected $photosGetCounts = [
		'path'  => 'flickr.photos.getCounts',
		'query' => ['dates', 'taken_dates'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getExif.html
	 */
	protected $photosGetExif = [
		'path'  => 'flickr.photos.getExif',
		'query' => ['photo_id', 'secret'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getFavorites.html
	 */
	protected $photosGetFavorites = [
		'path'  => 'flickr.photos.getFavorites',
		'query' => ['photo_id', 'page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getInfo.html
	 */
	protected $photosGetInfo = [
		'path'  => 'flickr.photos.getInfo',
		'query' => ['photo_id', 'secret'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getNotInSet.html
	 */
	protected $photosGetNotInSet = [
		'path'  => 'flickr.photos.getNotInSet',
		'query' => ['max_upload_date', 'min_taken_date', 'max_taken_date', 'privacy_filter', 'media', 'min_upload_date', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getPerms.html
	 */
	protected $photosGetPerms = [
		'path'  => 'flickr.photos.getPerms',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getPopular.html
	 */
	protected $photosGetPopular = [
		'path'  => 'flickr.photos.getPopular',
		'query' => ['user_id', 'sort', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getRecent.html
	 */
	protected $photosGetRecent = [
		'path'  => 'flickr.photos.getRecent',
		'query' => ['extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getSizes.html
	 */
	protected $photosGetSizes = [
		'path'  => 'flickr.photos.getSizes',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getUntagged.html
	 */
	protected $photosGetUntagged = [
		'path'  => 'flickr.photos.getUntagged',
		'query' => ['min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date', 'privacy_filter', 'media', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getWithGeoData.html
	 */
	protected $photosGetWithGeoData = [
		'path'  => 'flickr.photos.getWithGeoData',
		'query' => ['min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date', 'privacy_filter', 'sort', 'media', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.getWithoutGeoData.html
	 */
	protected $photosGetWithoutGeoData = [
		'path'  => 'flickr.photos.getWithoutGeoData',
		'query' => ['max_upload_date', 'min_taken_date', 'max_taken_date', 'privacy_filter', 'sort', 'media', 'min_upload_date', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.licenses.getInfo.html
	 */
	protected $photosLicensesGetInfo = [
		'path'  => 'flickr.photos.licenses.getInfo',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.licenses.setLicense.html
	 */
	protected $photosLicensesSetLicense = [
		'path'  => 'flickr.photos.licenses.setLicense',
		'query' => ['photo_id', 'license_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.notes.add.html
	 */
	protected $photosNotesAdd = [
		'path'  => 'flickr.photos.notes.add',
		'query' => ['photo_id', 'note_x', 'note_y', 'note_w', 'note_h', 'note_text'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.notes.delete.html
	 */
	protected $photosNotesDelete = [
		'path'  => 'flickr.photos.notes.delete',
		'query' => ['note_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.notes.edit.html
	 */
	protected $photosNotesEdit = [
		'path'  => 'flickr.photos.notes.edit',
		'query' => ['note_id', 'note_x', 'note_y', 'note_w', 'note_h', 'note_text'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.people.add.html
	 */
	protected $photosPeopleAdd = [
		'path'  => 'flickr.photos.people.add',
		'query' => ['photo_id', 'user_id', 'person_x', 'person_y', 'person_w', 'person_h'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.people.delete.html
	 */
	protected $photosPeopleDelete = [
		'path'  => 'flickr.photos.people.delete',
		'query' => ['photo_id', 'user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.people.deleteCoords.html
	 */
	protected $photosPeopleDeleteCoords = [
		'path'  => 'flickr.photos.people.deleteCoords',
		'query' => ['photo_id', 'user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.people.editCoords.html
	 */
	protected $photosPeopleEditCoords = [
		'path'  => 'flickr.photos.people.editCoords',
		'query' => ['photo_id', 'user_id', 'person_x', 'person_y', 'person_w', 'person_h'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.people.getList.html
	 */
	protected $photosPeopleGetList = [
		'path'  => 'flickr.photos.people.getList',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.recentlyUpdated.html
	 */
	protected $photosRecentlyUpdated = [
		'path'  => 'flickr.photos.recentlyUpdated',
		'query' => ['min_date', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.removeTag.html
	 */
	protected $photosRemoveTag = [
		'path'  => 'flickr.photos.removeTag',
		'query' => ['tag_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.search.html
	 */
	protected $photosSearch = [
		'path'  => 'flickr.photos.search',
		'query' => ['user_id', 'tags', 'tag_mode', 'text', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date', 'license', 'sort', 'privacy_filter', 'bbox', 'accuracy', 'safe_search', 'content_type', 'machine_tags', 'machine_tag_mode', 'group_id', 'contacts', 'woe_id', 'place_id', 'media', 'has_geo', 'geo_context', 'lat', 'lon', 'radius', 'radius_units', 'is_commons', 'in_gallery', 'is_getty', 'extras', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.setContentType.html
	 */
	protected $photosSetContentType = [
		'path'  => 'flickr.photos.setContentType',
		'query' => ['photo_id', 'content_type'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.setDates.html
	 */
	protected $photosSetDates = [
		'path'  => 'flickr.photos.setDates',
		'query' => ['photo_id', 'date_posted', 'date_taken', 'date_taken_granularity'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.setMeta.html
	 */
	protected $photosSetMeta = [
		'path'  => 'flickr.photos.setMeta',
		'query' => ['photo_id', 'title', 'description'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.setPerms.html
	 */
	protected $photosSetPerms = [
		'path'  => 'flickr.photos.setPerms',
		'query' => ['photo_id', 'is_public', 'is_friend', 'is_family', 'perm_comment', 'perm_addmeta'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.setSafetyLevel.html
	 */
	protected $photosSetSafetyLevel = [
		'path'  => 'flickr.photos.setSafetyLevel',
		'query' => ['photo_id', 'safety_level', 'hidden'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.setTags.html
	 */
	protected $photosSetTags = [
		'path'  => 'flickr.photos.setTags',
		'query' => ['photo_id', 'tags'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.suggestions.approveSuggestion.html
	 */
	protected $photosSuggestionsApproveSuggestion = [
		'path'  => 'flickr.photos.suggestions.approveSuggestion',
		'query' => ['suggestion_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.suggestions.getList.html
	 */
	protected $photosSuggestionsGetList = [
		'path'  => 'flickr.photos.suggestions.getList',
		'query' => ['photo_id', 'status_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.suggestions.rejectSuggestion.html
	 */
	protected $photosSuggestionsRejectSuggestion = [
		'path'  => 'flickr.photos.suggestions.rejectSuggestion',
		'query' => ['suggestion_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.suggestions.removeSuggestion.html
	 */
	protected $photosSuggestionsRemoveSuggestion = [
		'path'  => 'flickr.photos.suggestions.removeSuggestion',
		'query' => ['suggestion_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.suggestions.suggestLocation.html
	 */
	protected $photosSuggestionsSuggestLocation = [
		'path'  => 'flickr.photos.suggestions.suggestLocation',
		'query' => ['photo_id', 'lat', 'lon', 'accuracy', 'woe_id', 'place_id', 'note'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.transform.rotate.html
	 */
	protected $photosTransformRotate = [
		'path'  => 'flickr.photos.transform.rotate',
		'query' => ['photo_id', 'degrees'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photos.upload.checkTickets.html
	 */
	protected $photosUploadCheckTickets = [
		'path'  => 'flickr.photos.upload.checkTickets',
		'query' => ['tickets'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.addPhoto.html
	 */
	protected $photosetsAddPhoto = [
		'path'  => 'flickr.photosets.addPhoto',
		'query' => ['photoset_id', 'photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.comments.addComment.html
	 */
	protected $photosetsCommentsAddComment = [
		'path'  => 'flickr.photosets.comments.addComment',
		'query' => ['photoset_id', 'comment_text'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.comments.deleteComment.html
	 */
	protected $photosetsCommentsDeleteComment = [
		'path'  => 'flickr.photosets.comments.deleteComment',
		'query' => ['comment_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.comments.editComment.html
	 */
	protected $photosetsCommentsEditComment = [
		'path'  => 'flickr.photosets.comments.editComment',
		'query' => ['comment_id', 'comment_text'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.comments.getList.html
	 */
	protected $photosetsCommentsGetList = [
		'path'  => 'flickr.photosets.comments.getList',
		'query' => ['photoset_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.create.html
	 */
	protected $photosetsCreate = [
		'path'  => 'flickr.photosets.create',
		'query' => ['title', 'description', 'primary_photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.delete.html
	 */
	protected $photosetsDelete = [
		'path'  => 'flickr.photosets.delete',
		'query' => ['photoset_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.editMeta.html
	 */
	protected $photosetsEditMeta = [
		'path'  => 'flickr.photosets.editMeta',
		'query' => ['photoset_id', 'title', 'description'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.editPhotos.html
	 */
	protected $photosetsEditPhotos = [
		'path'  => 'flickr.photosets.editPhotos',
		'query' => ['photoset_id', 'primary_photo_id', 'photo_ids'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.getContext.html
	 */
	protected $photosetsGetContext = [
		'path'  => 'flickr.photosets.getContext',
		'query' => ['photo_id', 'photoset_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.getInfo.html
	 */
	protected $photosetsGetInfo = [
		'path'  => 'flickr.photosets.getInfo',
		'query' => ['photoset_id', 'user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.getList.html
	 */
	protected $photosetsGetList = [
		'path'  => 'flickr.photosets.getList',
		'query' => ['user_id', 'page', 'per_page', 'primary_photo_extras', 'photo_ids'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.getPhotos.html
	 */
	protected $photosetsGetPhotos = [
		'path'  => 'flickr.photosets.getPhotos',
		'query' => ['photoset_id', 'user_id', 'extras', 'per_page', 'page', 'privacy_filter', 'media'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.orderSets.html
	 */
	protected $photosetsOrderSets = [
		'path'  => 'flickr.photosets.orderSets',
		'query' => ['photoset_ids'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.removePhoto.html
	 */
	protected $photosetsRemovePhoto = [
		'path'  => 'flickr.photosets.removePhoto',
		'query' => ['photoset_id', 'photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.removePhotos.html
	 */
	protected $photosetsRemovePhotos = [
		'path'  => 'flickr.photosets.removePhotos',
		'query' => ['photoset_id', 'photo_ids'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.reorderPhotos.html
	 */
	protected $photosetsReorderPhotos = [
		'path'  => 'flickr.photosets.reorderPhotos',
		'query' => ['photoset_id', 'photo_ids'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.photosets.setPrimaryPhoto.html
	 */
	protected $photosetsSetPrimaryPhoto = [
		'path'  => 'flickr.photosets.setPrimaryPhoto',
		'query' => ['photoset_id', 'photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.find.html
	 */
	protected $placesFind = [
		'path'  => 'flickr.places.find',
		'query' => ['query'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.findByLatLon.html
	 */
	protected $placesFindByLatLon = [
		'path'  => 'flickr.places.findByLatLon',
		'query' => ['lat', 'lon', 'accuracy'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.getChildrenWithPhotosPublic.html
	 */
	protected $placesGetChildrenWithPhotosPublic = [
		'path'  => 'flickr.places.getChildrenWithPhotosPublic',
		'query' => ['place_id', 'woe_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.getInfo.html
	 */
	protected $placesGetInfo = [
		'path'  => 'flickr.places.getInfo',
		'query' => ['place_id', 'woe_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.getInfoByUrl.html
	 */
	protected $placesGetInfoByUrl = [
		'path'  => 'flickr.places.getInfoByUrl',
		'query' => ['url'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.getPlaceTypes.html
	 */
	protected $placesGetPlaceTypes = [
		'path'  => 'flickr.places.getPlaceTypes',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.getShapeHistory.html
	 */
	protected $placesGetShapeHistory = [
		'path'  => 'flickr.places.getShapeHistory',
		'query' => ['place_id', 'woe_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.getTopPlacesList.html
	 */
	protected $placesGetTopPlacesList = [
		'path'  => 'flickr.places.getTopPlacesList',
		'query' => ['place_type_id', 'date', 'woe_id', 'place_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.placesForBoundingBox.html
	 */
	protected $placesPlacesForBoundingBox = [
		'path'  => 'flickr.places.placesForBoundingBox',
		'query' => ['bbox', 'place_type', 'place_type_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.placesForContacts.html
	 */
	protected $placesPlacesForContacts = [
		'path'  => 'flickr.places.placesForContacts',
		'query' => ['place_type', 'place_type_id', 'woe_id', 'place_id', 'threshold', 'contacts', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.placesForTags.html
	 */
	protected $placesPlacesForTags = [
		'path'  => 'flickr.places.placesForTags',
		'query' => ['place_type_id', 'woe_id', 'place_id', 'threshold', 'tags', 'tag_mode', 'machine_tags', 'machine_tag_mode', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.placesForUser.html
	 */
	protected $placesPlacesForUser = [
		'path'  => 'flickr.places.placesForUser',
		'query' => ['place_type_id', 'place_type', 'woe_id', 'place_id', 'threshold', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.resolvePlaceId.html
	 */
	protected $placesResolvePlaceId = [
		'path'  => 'flickr.places.resolvePlaceId',
		'query' => ['place_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.resolvePlaceURL.html
	 */
	protected $placesResolvePlaceURL = [
		'path'  => 'flickr.places.resolvePlaceURL',
		'query' => ['url'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.places.tagsForPlace.html
	 */
	protected $placesTagsForPlace = [
		'path'  => 'flickr.places.tagsForPlace',
		'query' => ['woe_id', 'place_id', 'min_upload_date', 'max_upload_date', 'min_taken_date', 'max_taken_date'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.prefs.getContentType.html
	 */
	protected $prefsGetContentType = [
		'path'  => 'flickr.prefs.getContentType',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.prefs.getGeoPerms.html
	 */
	protected $prefsGetGeoPerms = [
		'path'  => 'flickr.prefs.getGeoPerms',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.prefs.getHidden.html
	 */
	protected $prefsGetHidden = [
		'path'  => 'flickr.prefs.getHidden',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.prefs.getPrivacy.html
	 */
	protected $prefsGetPrivacy = [
		'path'  => 'flickr.prefs.getPrivacy',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.prefs.getSafetyLevel.html
	 */
	protected $prefsGetSafetyLevel = [
		'path'  => 'flickr.prefs.getSafetyLevel',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.profile.getProfile.html
	 */
	protected $profileGetProfile = [
		'path'  => 'flickr.profile.getProfile',
		'query' => ['user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.push.getSubscriptions.html
	 */
	protected $pushGetSubscriptions = [
		'path'  => 'flickr.push.getSubscriptions',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.push.getTopics.html
	 */
	protected $pushGetTopics = [
		'path'  => 'flickr.push.getTopics',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.push.subscribe.html
	 */
	protected $pushSubscribe = [
		'path'  => 'flickr.push.subscribe',
		'query' => ['topic', 'callback', 'verify', 'verify_token', 'lease_seconds', 'woe_ids', 'place_ids', 'lat', 'lon', 'radius', 'radius_units', 'accuracy', 'nsids', 'tags'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.push.unsubscribe.html
	 */
	protected $pushUnsubscribe = [
		'path'  => 'flickr.push.unsubscribe',
		'query' => ['topic', 'callback', 'verify', 'verify_token'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.reflection.getMethodInfo.html
	 */
	protected $reflectionGetMethodInfo = [
		'path'  => 'flickr.reflection.getMethodInfo',
		'query' => ['method_name'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.reflection.getMethods.html
	 */
	protected $reflectionGetMethods = [
		'path'  => 'flickr.reflection.getMethods',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getCollectionDomains.html
	 */
	protected $statsGetCollectionDomains = [
		'path'  => 'flickr.stats.getCollectionDomains',
		'query' => ['date', 'collection_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getCollectionReferrers.html
	 */
	protected $statsGetCollectionReferrers = [
		'path'  => 'flickr.stats.getCollectionReferrers',
		'query' => ['date', 'domain', 'collection_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getCollectionStats.html
	 */
	protected $statsGetCollectionStats = [
		'path'  => 'flickr.stats.getCollectionStats',
		'query' => ['date', 'collection_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getCSVFiles.html
	 */
	protected $statsGetCSVFiles = [
		'path'  => 'flickr.stats.getCSVFiles',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotoDomains.html
	 */
	protected $statsGetPhotoDomains = [
		'path'  => 'flickr.stats.getPhotoDomains',
		'query' => ['date', 'photo_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotoReferrers.html
	 */
	protected $statsGetPhotoReferrers = [
		'path'  => 'flickr.stats.getPhotoReferrers',
		'query' => ['date', 'domain', 'photo_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotosetDomains.html
	 */
	protected $statsGetPhotosetDomains = [
		'path'  => 'flickr.stats.getPhotosetDomains',
		'query' => ['date', 'photoset_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotosetReferrers.html
	 */
	protected $statsGetPhotosetReferrers = [
		'path'  => 'flickr.stats.getPhotosetReferrers',
		'query' => ['date', 'domain', 'photoset_id', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotosetStats.html
	 */
	protected $statsGetPhotosetStats = [
		'path'  => 'flickr.stats.getPhotosetStats',
		'query' => ['date', 'photoset_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotoStats.html
	 */
	protected $statsGetPhotoStats = [
		'path'  => 'flickr.stats.getPhotoStats',
		'query' => ['date', 'photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotostreamDomains.html
	 */
	protected $statsGetPhotostreamDomains = [
		'path'  => 'flickr.stats.getPhotostreamDomains',
		'query' => ['date', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotostreamReferrers.html
	 */
	protected $statsGetPhotostreamReferrers = [
		'path'  => 'flickr.stats.getPhotostreamReferrers',
		'query' => ['date', 'domain', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPhotostreamStats.html
	 */
	protected $statsGetPhotostreamStats = [
		'path'  => 'flickr.stats.getPhotostreamStats',
		'query' => ['date'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getPopularPhotos.html
	 */
	protected $statsGetPopularPhotos = [
		'path'  => 'flickr.stats.getPopularPhotos',
		'query' => ['date', 'sort', 'per_page', 'page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.stats.getTotalViews.html
	 */
	protected $statsGetTotalViews = [
		'path'  => 'flickr.stats.getTotalViews',
		'query' => ['date'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getClusterPhotos.html
	 */
	protected $tagsGetClusterPhotos = [
		'path'  => 'flickr.tags.getClusterPhotos',
		'query' => ['tag', 'cluster_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getClusters.html
	 */
	protected $tagsGetClusters = [
		'path'  => 'flickr.tags.getClusters',
		'query' => ['tag'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getHotList.html
	 */
	protected $tagsGetHotList = [
		'path'  => 'flickr.tags.getHotList',
		'query' => ['period', 'count'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getListPhoto.html
	 */
	protected $tagsGetListPhoto = [
		'path'  => 'flickr.tags.getListPhoto',
		'query' => ['photo_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getListUser.html
	 */
	protected $tagsGetListUser = [
		'path'  => 'flickr.tags.getListUser',
		'query' => ['user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getListUserPopular.html
	 */
	protected $tagsGetListUserPopular = [
		'path'  => 'flickr.tags.getListUserPopular',
		'query' => ['user_id', 'count'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getListUserRaw.html
	 */
	protected $tagsGetListUserRaw = [
		'path'  => 'flickr.tags.getListUserRaw',
		'query' => ['tag'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getMostFrequentlyUsed.html
	 */
	protected $tagsGetMostFrequentlyUsed = [
		'path'  => 'flickr.tags.getMostFrequentlyUsed',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.tags.getRelated.html
	 */
	protected $tagsGetRelated = [
		'path'  => 'flickr.tags.getRelated',
		'query' => ['tag'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.test.echo.html
	 */
	protected $testEcho = [
		'path'  => 'flickr.test.echo',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.test.login.html
	 */
	protected $testLogin = [
		'path'  => 'flickr.test.login',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.test.null.html
	 */
	protected $testNull = [
		'path'  => 'flickr.test.null',
		'query' => [],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.addTestimonial.html
	 */
	protected $testimonialsAddTestimonial = [
		'path'  => 'flickr.testimonials.addTestimonial',
		'query' => ['user_id', 'testimonial_text'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.approveTestimonial.html
	 */
	protected $testimonialsApproveTestimonial = [
		'path'  => 'flickr.testimonials.approveTestimonial',
		'query' => ['testimonial_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.deleteTestimonial.html
	 */
	protected $testimonialsDeleteTestimonial = [
		'path'  => 'flickr.testimonials.deleteTestimonial',
		'query' => ['testimonial_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.editTestimonial.html
	 */
	protected $testimonialsEditTestimonial = [
		'path'  => 'flickr.testimonials.editTestimonial',
		'query' => ['user_id', 'testimonial_id', 'testimonial_text'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getAllTestimonialsAbout.html
	 */
	protected $testimonialsGetAllTestimonialsAbout = [
		'path'  => 'flickr.testimonials.getAllTestimonialsAbout',
		'query' => ['page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getAllTestimonialsAboutBy.html
	 */
	protected $testimonialsGetAllTestimonialsAboutBy = [
		'path'  => 'flickr.testimonials.getAllTestimonialsAboutBy',
		'query' => ['user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getAllTestimonialsBy.html
	 */
	protected $testimonialsGetAllTestimonialsBy = [
		'path'  => 'flickr.testimonials.getAllTestimonialsBy',
		'query' => ['page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getPendingTestimonialsAbout.html
	 */
	protected $testimonialsGetPendingTestimonialsAbout = [
		'path'  => 'flickr.testimonials.getPendingTestimonialsAbout',
		'query' => ['page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getPendingTestimonialsAboutBy.html
	 */
	protected $testimonialsGetPendingTestimonialsAboutBy = [
		'path'  => 'flickr.testimonials.getPendingTestimonialsAboutBy',
		'query' => ['user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getPendingTestimonialsBy.html
	 */
	protected $testimonialsGetPendingTestimonialsBy = [
		'path'  => 'flickr.testimonials.getPendingTestimonialsBy',
		'query' => ['page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getTestimonialsAbout.html
	 */
	protected $testimonialsGetTestimonialsAbout = [
		'path'  => 'flickr.testimonials.getTestimonialsAbout',
		'query' => ['user_id', 'page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getTestimonialsAboutBy.html
	 */
	protected $testimonialsGetTestimonialsAboutBy = [
		'path'  => 'flickr.testimonials.getTestimonialsAboutBy',
		'query' => ['user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.testimonials.getTestimonialsBy.html
	 */
	protected $testimonialsGetTestimonialsBy = [
		'path'  => 'flickr.testimonials.getTestimonialsBy',
		'query' => ['user_id', 'page', 'per_page'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.urls.getGroup.html
	 */
	protected $urlsGetGroup = [
		'path'  => 'flickr.urls.getGroup',
		'query' => ['group_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.urls.getUserPhotos.html
	 */
	protected $urlsGetUserPhotos = [
		'path'  => 'flickr.urls.getUserPhotos',
		'query' => ['user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.urls.getUserProfile.html
	 */
	protected $urlsGetUserProfile = [
		'path'  => 'flickr.urls.getUserProfile',
		'query' => ['user_id'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.urls.lookupGallery.html
	 */
	protected $urlsLookupGallery = [
		'path'  => 'flickr.urls.lookupGallery',
		'query' => ['url'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.urls.lookupGroup.html
	 */
	protected $urlsLookupGroup = [
		'path'  => 'flickr.urls.lookupGroup',
		'query' => ['url'],
	];

	/**
	 * @link https://www.flickr.com/services/api/flickr.urls.lookupUser.html
	 */
	protected $urlsLookupUser = [
		'path'  => 'flickr.urls.lookupUser',
		'query' => ['url'],
	];

}
