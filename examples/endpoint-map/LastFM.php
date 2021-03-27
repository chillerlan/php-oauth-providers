<?php
/**
 * @created      23.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\LastFM\LastFM;
use chillerlan\PrototypeDOM\Document;

$ENVVAR = 'LASTFM';

require_once __DIR__.'/create-endpointmap-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$lastfm  = new LastFM($http, $storage, $options, $logger);
$url     = 'https://www.last.fm/api';
$root    = new Document(file_get_contents($url));
$urls    = $root->querySelectorAll('ul.sidebar-links:nth-child(1) > li:nth-child(3) a');
$content = [];

foreach($urls as $a){
	$param  = new stdClass;
	$params = [];
#	$str    = [];

	$href = $a->getHref();
	$path = str_replace('/api/show/', '' ,$href);

	if(in_array($path, ['auth.getMobileSession', 'auth.getSession', 'auth.getToken', 'track.scrobble'])){
		continue;
	}

	$link = 'https://www.last.fm'.$href;
	$page = (new Document(file_get_contents($link)));
	$name = lcfirst(implode('', array_map('ucfirst', explode('.', $path))));
	$desc = $page->select(['.theme-default-content h1'])[0]->next('p')->value();

	foreach($page->select(['.theme-default-content #params'])[0]->next('p')->childElements() as $node){

		if($node->tag() === 'strong'){
			$param->name = str_replace('[0|1]', '', $node->value());
		}
#		elseif($node->name() === '#text'){
#			$str[] = $node->value();
#		}
		elseif($node->tag() === 'br'){

			if(in_array($param->name, ['api_key', 'api_sig', 'sk'])){
				continue;
			}

#			[$required, $param->desc] = array_map('trim', explode(':', implode('', $str)));
#			$param->required = strpos($required, 'Required') !== false;
#			$str      = [];
			$params[] = $param;
			$param    = new stdClass;
		}
	}

	$method = strpos($page->select(['.theme-default-content #auth'])[0]->next('p')->value(), 'HTTP POST') !== false
		? 'POST' : 'GET';

	$param_names = array_column($params, 'name');

	sort($param_names);

	if($param_names === ['']){
		$param_names = null;
	}

	$content[] = '
	/**
	 * '.$desc.'
	 *
	 * @link '.$link.'
	 */
	protected array $'.$name.' = [
		\'path\'   => \''.$path.'\',
		\'method\' => \''.$method.'\',
		\'query\'  => '.($method === 'GET' && $param_names ? '[\''.implode('\', \'', $param_names).'\']' : 'null').',
		\'body\'   => '.($method === 'POST' && $param_names ? '[\''.implode('\', \'', $param_names).'\']' : 'null').',
	];';

	$logger->info($path . ' - '. $href);
}

// and replace the class
createEndpointMap($content, $url, $lastfm->endpoints);

exit;
