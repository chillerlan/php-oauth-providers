<?php
/**
 * Here be dragons. Do not try this at home.
 *
 * - run this script
 * - run create-docblock
 *
 * @created      21.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 *
 * @phan-file-suppress PhanTypeMismatchArgumentNullableInternal, PhanTypeArraySuspicious
 */

use chillerlan\OAuth\Providers\Spotify\Spotify;
use chillerlan\PrototypeDOM\Document;
use chillerlan\PrototypeDOM\Node\PrototypeHTMLElement;

$ENVVAR = 'SPOTIFY';

require_once __DIR__.'/create-endpointmap-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$spotify   = new Spotify($http, $storage, $options, $logger);

$url  = 'https://developer.spotify.com/documentation/web-api/reference/';
$html = file_get_contents($url);

$document = new Document($html);

// fix the DOM by adding another clearfix after the endpoint list
$clearfix = $document->createElement('div');
$clearfix->setAttribute('class', 'clearfix');
$el = $document->getElementById('objects-index');
$el->parentNode->insertBefore($clearfix, $el);

$nodes = $document->getElementsByClassName('post-content')[0]->childElements();

$endpoint  = new stdClass;
$endpoints = [];
$content   = [];

foreach($nodes as $node){

	if(!$node instanceof PrototypeHTMLElement){
		continue;
	}

	if($node->nodeName === 'h2'){
		$endpoint->desc = $node->value();
		$endpoint->link = $url.'#'.$node->identify();
	}
	elseif($node->getClassName() === 'hidden-xs'){
		[$endpoint->method, $endpoint->url] = explode(' ', $node->down(1)->value());
	}
	elseif($node->nodeName === 'table'){

		$params = $node->down(0)->next()->childElements()->map(function(PrototypeHTMLElement $tr){
			$p       = new stdClass;
			$td      = $tr->childElements();
			$p->name = str_replace(['&lbrace;', '&rbrace;'], '', $td[0]->down()->value());
			$p->type = $td[1]->nodeValue;

			if(isset($td[0]->childElements()[2])){
				$p->desc = $td[0]->childElements()[2]->value();
			}

			if($td[2] instanceof PrototypeHTMLElement){
				$p->required = $td[2]->childElements()[0]->value() === 'Required';
			}

			return $p;
		});

		$type = $node->down(2)->value();

		if($type === 'Header'){
			$endpoint->headers = $params;
		}
		elseif($type === 'Path Parameter'){
			$endpoint->path = $params;
		}
		elseif($type === 'Query Parameter'){
			$endpoint->query = $params;
		}
		elseif($type === 'JSON Body Parameter'){
			$endpoint->body = $params;
		}
	}
	elseif($node->getClassName() === 'clearfix'){
		$endpoints[] = $endpoint;
		$endpoint    = new stdClass;
	}

}

array_shift($endpoints);

$nameFixtures = [
	'PUT playlistsPlaylistIdFollowers'    => 'playlistsPlaylistIdFollow',
	'DELETE playlistsPlaylistIdFollowers' => 'playlistsPlaylistIdUnfollow',
	'PUT meFollowing'                     => 'meFollow',
	'DELETE meFollowing'                  => 'meUnfollow',
	'PUT meAlbums'                        => 'meAlbumSave',
	'DELETE meAlbums'                     => 'meAlbumRemove',
	'PUT meTracks'                        => 'meTrackSave',
	'DELETE meTracks'                     => 'meTrackRemove',
	'PUT meEpisodes'                      => 'meEpisodeSave',
	'DELETE meEpisodes'                   => 'meEpisodeRemove',
	'PUT meShows'                         => 'meShowSave',
	'DELETE meShows'                      => 'meShowRemove',
	'PUT mePlayer'                        => 'mePlayerTransferPlayback',
	'POST usersUserIdPlaylists'           => 'usersUserPlaylistCreate',
	'PUT playlistsPlaylistId'             => 'playlistsPlaylistIdChangeDetails',
	'POST playlistsPlaylistIdTracks'      => 'playlistsPlaylistIdTracksAdd',
	'PUT playlistsPlaylistIdTracks'       => 'playlistsPlaylistIdTracksReplace',
	'DELETE playlistsPlaylistIdTracks'    => 'playlistsPlaylistIdTracksRemove',
	'PUT playlistsPlaylistIdImages'       => 'playlistsPlaylistIdImageUpload',
];

foreach($endpoints as $endpoint){

	$path      = str_replace('https://api.spotify.com/v1', '', $endpoint->url);
	$name      = lcfirst(implode('', array_map('ucfirst', explode('-', str_replace(['{', '}', '/', '_'], '-', $path)))));
	$query     = isset($endpoint->query) ? array_column($endpoint->query, 'name') : [];
	$body      = isset($endpoint->body) ? array_column($endpoint->body, 'name') : [];
	$urlparams = [];
	$headers   = [];
	$fixture   = $endpoint->method.' '.$name;

	if(isset($nameFixtures[$fixture])){
		$name = $nameFixtures[$fixture];
	}

	if(isset($endpoint->path)){
		$count = 0;
		$path  = preg_replace_callback('/(?:\{([^\}]+)\})/i', function(array $matches) use (&$count, &$urlparams):string{
			$urlparams[] = $matches[1];
			return '%'.++$count.'$s';
		}, $path);
	}

	if(isset($endpoint->headers)){
		foreach($endpoint->headers as $header){
			if($header->name === 'Authorization'){
				continue;
			}
			elseif($header->name === 'Content-Type'){
				$headers[] = '\'Content-Type\' => \''.trim(substr($header->desc, strrpos($header->desc, ':') + 1), ' .').'\'';
			}
		}

		// for some reason sometimes the body param list is missing in the docs
		if(!empty($headers) && empty($body)){
			$body = ['body'];
		}
	}

	$content[$name] = '
	/**
	 * '.$endpoint->desc.'
	 *
	 * @link '.$endpoint->link.'
	 */
	protected array $'.$name.' = [
		\'method\'        => \''.$endpoint->method.'\',
		\'path\'          => \''.$path.'\',
		\'path_elements\' => '.(!empty($urlparams) ? '[\''.implode('\', \'', $urlparams).'\']' : 'null').',
		\'query\'         => '.(!empty($query) ? '[\''.implode('\', \'', $query).'\']' : 'null').',
		\'body\'          => '.(!empty($body) ? '[\''.implode('\', \'', $body).'\']' : 'null').',
		\'headers\'       => '.(!empty($headers) ? '['.implode(', ', $headers).']' : 'null').',
	];';

	$logger->info($path);
}

ksort($content);

// and replace the class
createEndpointMap($content, 'https://developer.spotify.com/documentation/web-api/reference/', $spotify->endpoints, '/v1');

exit;
