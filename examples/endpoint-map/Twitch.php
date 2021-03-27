<?php
/**
 * Here be dragons. Do not try this at home.
 *
 * - run this script
 * - run create-docblock
 *
 * @created      22.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 *
 * @phan-file-suppress PhanTypeMismatchArgumentNullableInternal
 */

use chillerlan\OAuth\Providers\Twitch\Twitch;
use chillerlan\PrototypeDOM\Document;
use chillerlan\PrototypeDOM\Node\PrototypeHTMLElement;

$ENVVAR = 'TWITCH';

require_once __DIR__.'/create-endpointmap-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$twitch    = new Twitch($http, $storage, $options, $logger);

$url  = 'https://dev.twitch.tv/docs/api/reference';
$html = file_get_contents($url);

$document = new Document($html);

$nodes = $document->getElementsByClassName('main')[0]->childElements();

$endpoints       = [];
$content         = [];
$endpointMethods = [];
$headerPattern   = '/((((Required|Optional)\s)?(Body|Query)\s(Parameter|Value))|(Response\s(Field|Body))|(Return Value))s?/i';

$fixtures = [
	'DELETE' => 'Delete',
	'PATCH'  => 'Update',
	'POST'   => 'Create',
	'PUT'    => 'Update', // doesn't seem there's a difference between PUT and PATCH here
];

foreach($nodes as $node){

	if(!$node instanceof PrototypeHTMLElement || $node->childElements()->count() !== 2){
		continue;
	}

	$headers  = $node->select(['h2', 'h3']);
	$endpoint = new stdClass;

	foreach($headers as $header){

		if($header->tag() === 'h2'){
			$endpoint->desc = $header->value();
			$endpoint->link = $url.'#'.$header->identify();
		}
		elseif($header->tag() === 'h3'){

			if(strpos($header->value(), 'URL') !== false){
				$v = explode(' ', $header->next()->value());
				$l = count($v) >= 2;

				$endpoint->method = $l ? $v[0] : 'GET';
				$endpoint->url    = preg_replace('/^\s+|\s+$|[^\S ]/u', '', ($l ? explode('?', $v[1])[0] : $v[0]));

				$endpointMethods[str_replace(['https://api.twitch.tv/', 'helix'], '', $endpoint->url)][] = $endpoint->method;
			}
			elseif(preg_match($headerPattern, $header->value())){

				$table = $header->next('table');

				// no table follows that header - no params
				if(!$table || $table->previous('h3')->value() !== $header->value()){
					continue;
				}

				$h    = explode(' ', $header->value());
				$type = strtolower(count($h) === 3 ? $h[1] : $h[0]);

				if($type === 'return'){
					$type = 'response';
				}

				foreach($table->select(['tr']) as $tr){
					$params = new stdClass;
					$tds    = $tr->select(['td']);

					if(!$tds || $tds->count() < 3){
						continue;
					}

					$keys = $tds->count() === 3 ? ['name', 'type', 'desc'] : ['name', 'required', 'type', 'desc'];

					foreach($tds as $i => $td){
						$params->{$keys[$i]} = $td->value();
					}

					if($type !== 'response'){
						$params->required = !isset($params->required) ? $h[0] === 'Required' : $params->required === 'yes';
					}

					if(in_array($params->name, ['Name', 'Field', 'Parameter']) && $params->type === 'Type'){
						continue;
					}

					$endpoint->{$type}[] = $params;
				}
			}
		}
	}

	$endpoints[] = $endpoint;
}


// now create the method blocks
foreach($endpoints as $endpoint){

	$path  = str_replace(['https://api.twitch.tv/', 'helix'], '', $endpoint->url);
	$name  = lcfirst(implode('', array_map('ucfirst', explode('-', str_replace(['/', '_'], '-', $path)))));
	$query = isset($endpoint->query) ? array_column($endpoint->query, 'name') : [];
	$body  = isset($endpoint->body) ? array_column($endpoint->body, 'name') : [];

	if(count($endpointMethods[$path]) > 1 && $endpoint->method !== 'GET'){
		$name .= $fixtures[$endpoint->method];
	}

	$content[$name] = '
	/**
	 * '.$endpoint->desc.'
	 *
	 * @link '.$endpoint->link.'
	 */
	protected array $'.$name.' = [
		\'method\'  => \''.$endpoint->method.'\',
		\'path\'    => \''.$path.'\',
		\'query\'   => '.(!empty($query) ? '[\''.implode('\', \'', $query).'\']' : 'null').',
		\'body\'    => '.(!empty($body) ? '[\''.implode('\', \'', $body).'\']' : 'null').',
		\'headers\' => '.(
			in_array($endpoint->method, ['PATCH', 'POST', 'PUT']) && !empty($endpoint->body)
				? '[\'Content-Type\' => \'application/json\']'
				: 'null'
		).',
	];';

	$logger->info($path);
}

ksort($content);

// and replace the class
createEndpointMap($content, 'https://dev.twitch.tv/docs/api/reference', $twitch->endpoints, '/helix');

exit;
