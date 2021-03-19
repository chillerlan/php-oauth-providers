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

use chillerlan\OAuth\MagicAPI\EndpointMap;

class MusicBrainzEndpoints extends EndpointMap{

	/**
	 * oauth2
	 */

	/** does this endpoint do anything? i don't even get a response from it */
	protected array $user = [
		'path'          => '/user',
		'method'        => 'GET',
		'query'         => ['name'],
		'path_elements' => [],
	];

	/**
	 * core entities
	 */

	protected array $area = [
		'path'          => '/area',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'collection'],
		'path_elements' => [],
	];

	protected array $areaId = [
		'path'          => '/area/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $artist = [
		'path'          => '/artist',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'area', 'collection', 'recording', 'release', 'release-group', 'work'],
		'path_elements' => [],
	];

	protected array $artistId = [
		'path'          => '/artist/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $event = [
		'path'          => '/event',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'area', 'artist', 'collection', 'place'],
		'path_elements' => [],
	];

	protected array $eventId = [
		'path'          => '/event/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $instrument = [
		'path'          => '/instrument',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset'],
		'path_elements' => [],
	];

	protected array $instrumentId = [
		'path'          => '/instrument/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $label = [
		'path'          => '/label',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'area', 'collection', 'release'],
		'path_elements' => [],
	];

	protected array $labelId = [
		'path'          => '/label/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $place = [
		'path'          => '/place',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'area', 'collection'],
		'path_elements' => [],
	];

	protected array $placeId = [
		'path'          => '/place/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $recording = [
		'path'          => '/recording',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'artist', 'collection', 'release'],
		'path_elements' => [],
	];

	protected array $recordingId = [
		'path'          => '/recording/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $release = [
		'path'          => '/release',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'type', 'status', 'area', 'artist', 'collection', 'label', 'track', 'track_artist', 'recording', 'release-group'],
		'path_elements' => [],
	];

	protected array $releaseId = [
		'path'          => '/release/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $releaseGroup = [
		'path'          => '/release-group',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'type', 'artist', 'collection', 'release'],
		'path_elements' => [],
	];

	protected array $releaseGroupId = [
		'path'          => '/release-group/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $series = [
		'path'          => '/series',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'collection'],
		'path_elements' => [],
	];

	protected array $seriesId = [
		'path'          => '/series/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $work = [
		'path'          => '/work',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'artist', 'collection'],
		'path_elements' => [],
	];

	protected array $workId = [
		'path'          => '/work/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];

	protected array $url = [
		'path'          => '/url',
		'method'        => 'GET',
		'query'         => ['inc', 'query', 'limit', 'offset', 'resource'],
		'path_elements' => [],
	];

	protected array $urlId = [
		'path'          => '/url/%1$s',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => ['id'],
	];


	/**
	 * non-core resources
	 */

	protected array $rating = [
		'path'          => '/rating',
		'method'        => 'GET',
		'query'         => ['query', 'limit', 'offset'],
		'path_elements' => [],
	];

	protected array $ratingSubmit = [
		'path'          => '/rating',
		'method'        => 'POST',
		'query'         => ['client'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => ['Content-Type' => 'application/xml'],
	];

	protected array $ratingId = [
		'path'          => '/rating/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $tag = [
		'path'          => '/tag',
		'method'        => 'GET',
		'query'         => ['query', 'limit', 'offset'],
		'path_elements' => [],
	];

	protected array $tagId = [
		'path'          => '/tag/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['id'],
	];

	protected array $tagVote = [
		'path'          => '/tag',
		'method'        => 'POST',
		'query'         => ['client'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => ['Content-Type' => 'application/xml'],
	];

	protected array $collection = [
		'path'          => '/collection',
		'method'        => 'GET',
		'query'         => ['query', 'limit', 'offset', 'area', 'artist', 'editor', 'event', 'label', 'place', 'recording', 'release', 'release-group', 'work'],
		'path_elements' => [],
	];

	protected array $collectionAdd = [
		'path'          => '/collection/%1$s/releases/%2$s',
		'method'        => 'PUT',
		'query'         => ['client'],
		'path_elements' => ['collectionID', 'releaseIDs'],
		'body'          => null,
		'headers'       => ['Content-Type' => 'application/xml'],
	];

	protected array $collectionRemove = [
		'path'          => '/collection/%1$s/releases/%2$s',
		'method'        => 'DELETE',
		'query'         => ['client'],
		'path_elements' => ['collectionID', 'releaseIDs'],
		'body'          => null,
		'headers'       => ['Content-Type' => 'application/xml'],
	];

	protected array $collectionId = [
		'path'          => '/collection/%1$s',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => ['id'],
	];

	/**
	 * lookup resources
	 */

	protected array $discid = [
		'path'          => '/discid',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => [],
	];

	protected array $isrc = [
		'path'          => '/isrc',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => [],
	];

	protected array $iswc = [
		'path'          => '/iswc',
		'method'        => 'GET',
		'query'         => ['inc'],
		'path_elements' => [],
	];

}
