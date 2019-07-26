<?php
/**
 * Class MusicBrainzEndpoints
 *
 * @link https://musicbrainz.org/doc/Development/XML_Web_Service/Version_2
 * @link https://musicbrainz.org/doc/Development/JSON_Web_Service
 *
 * @filesource   MusicBrainzEndpoints.php
 * @created      31.07.2018
 * @package      chillerlan\OAuth\Providers\MusicBrainz
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\MusicBrainz;

use chillerlan\HTTP\MagicAPI\EndpointMap;

class MusicBrainzEndpoints extends EndpointMap{

	/**
	 * oauth2
	 */

	/** does this endpoint do anything? i don't even get a response from it */
	protected $user = [
		'path'          => '/user',
		'method'        => 'GET',
		'query'         => ['name'],
		'path_elements' => [],
	];

	/**
	 * core entities
	 */

	protected $area = [
		'path'          => '/area',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'collection'],
		'path_elements' => [],
	];

	protected $areaId = [
		'path'          => '/area/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $artist = [
		'path'          => '/artist',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'area', 'collection', 'recording', 'release', 'release-group', 'work'],
		'path_elements' => [],
	];

	protected $artistId = [
		'path'          => '/artist/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $event = [
		'path'          => '/event',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'area', 'artist', 'collection', 'place'],
		'path_elements' => [],
	];

	protected $eventId = [
		'path'          => '/event/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $instrument = [
		'path'          => '/instrument',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset'],
		'path_elements' => [],
	];

	protected $instrumentId = [
		'path'          => '/instrument/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $label = [
		'path'          => '/label',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'area', 'collection', 'release'],
		'path_elements' => [],
	];

	protected $labelId = [
		'path'          => '/label/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $place = [
		'path'          => '/place',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'area', 'collection'],
		'path_elements' => [],
	];

	protected $placeId = [
		'path'          => '/place/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $recording = [
		'path'          => '/recording',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'artist', 'collection', 'release'],
		'path_elements' => [],
	];

	protected $recordingId = [
		'path'          => '/recording/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $release = [
		'path'          => '/release',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'type', 'status', 'area', 'artist', 'collection', 'label', 'track', 'track_artist', 'recording', 'release-group'],
		'path_elements' => [],
	];

	protected $releaseId = [
		'path'          => '/release/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $releaseGroup = [
		'path'          => '/release-group',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'type', 'artist', 'collection', 'release'],
		'path_elements' => [],
	];

	protected $releaseGroupId = [
		'path'          => '/release-group/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $series = [
		'path'          => '/series',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'collection'],
		'path_elements' => [],
	];

	protected $seriesId = [
		'path'          => '/series/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $work = [
		'path'          => '/work',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'artist', 'collection'],
		'path_elements' => [],
	];

	protected $workId = [
		'path'          => '/work/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected $url = [
		'path'          => '/url',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'resource'],
		'path_elements' => [],
	];

	protected $urlId = [
		'path'          => '/url/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];


	/**
	 * non-core resources
	 */

	protected $rating = [
		'path'          => '/rating',
		'method'        => 'GET',
		'query'         => ['query', 'limit', 'offset'],
		'path_elements' => [],
	];

	protected $ratingSubmit = [
		'path'          => '/rating',
		'method'        => 'POST',
		'query'         => ['client'],
		'path_elements' => [],
		'body'          => [],
		'headers'       => ['Content-Type' => 'application/xml'],
	];

	protected $ratingId = [
		'path'          => '/rating/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected $tag = [
		'path'          => '/tag',
		'method'        => 'GET',
		'query'         => ['query', 'limit', 'offset'],
		'path_elements' => [],
	];

	protected $tagId = [
		'path'          => '/tag/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected $tagVote = [
		'path'          => '/tag',
		'method'        => 'POST',
		'query'         => ['client'],
		'path_elements' => [],
		'body'          => [],
		'headers'       => ['Content-Type' => 'application/xml'],
	];

	protected $collection = [
		'path'          => '/collection',
		'method'        => 'GET',
		'query'         => ['query', 'limit', 'offset', 'area', 'artist', 'editor', 'event', 'label', 'place', 'recording', 'release', 'release-group', 'work'],
		'path_elements' => [],
	];

	protected $collectionAdd = [
		'path'          => '/collection/%1$s/releases/%2$s',
		'method'        => 'PUT',
		'query'         => ['client'],
		'path_elements' => ['collectionID', 'releaseIDs'],
		'body'          => [],
		'headers'       => ['Content-Type' => 'application/xml'],
	];

	protected $collectionRemove = [
		'path'          => '/collection/%1$s/releases/%2$s',
		'method'        => 'DELETE',
		'query'         => ['client'],
		'path_elements' => ['collectionID', 'releaseIDs'],
		'body'          => [],
		'headers'       => ['Content-Type' => 'application/xml'],
	];

	protected $collectionId = [
		'path'          => '/collection/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['id'],
	];

	/**
	 * lookup resources
	 */

	protected $discid = [
		'path'          => '/discid',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => [],
	];

	protected $isrc = [
		'path'          => '/isrc',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => [],
	];

	protected $iswc = [
		'path'          => '/iswc',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => [],
	];

}
