<?php
/**
 * @link         https://developers.soundcloud.com/docs/api/explorer/open-api
 * @link         https://developers.soundcloud.com/docs/api/explorer/swagger-ui-init.js (OpenAPI spec)
 *
 * @created      21.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

use chillerlan\OAuth\Providers\SoundCloud\SoundCloud;

$ENVVAR = 'SOUNDCLOUD';

require_once __DIR__.'/create-endpointmap-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$soundcloud = new SoundCloud($http, $storage, $options, $logger);
$url        = 'https://developers.soundcloud.com/docs/api/explorer/open-api';
$openapi    = json_decode(file_get_contents(__DIR__.'/soundcloud-openapi.json'));
$content    = [];

$fixtures = [
	'delete' => 'Delete',
	'get'    => '',
	'patch'  => 'Update',
	'post'   => 'Create',
	'put'    => 'Update', // doesn't seem there's a difference between PUT and PATCH here
];

foreach($openapi->paths as $path => $meta){

	if(in_array($path, ['/connect', '/oauth2/token'])){
		continue;
	}

	$baseName  = lcfirst(implode('', array_map('ucfirst', explode('-', str_replace(['{', '}', '/', '_'], '-', $path)))));
	$urlparams = [];

	$count = 0;
	$path  = preg_replace_callback('/(?:\{([^\}]+)\})/i', function(array $matches) use (&$count, &$urlparams):string{
		$urlparams[] = $matches[1];
		return '%'.++$count.'$s';
	}, $path);

	foreach($meta as $method => $info){
		$name    = $baseName.$fixtures[$method];
		$query   = [];
		$headers = [];
		$body    = [];
		if(isset($info->parameters)){
			foreach($info->parameters as $ref){
				$ref = getRef($ref->{'$ref'}, $openapi);

				if($ref->in === 'query'){
					$query[] = $ref->name;
				}
			}
		}

		if(isset($info->requestBody) && empty($headers)){
			$contentType = isset($info->requestBody->content->{'application/json'})
				? 'application/json'
				: 'multipart/x-www-form-urlencoded';

			$ref       = getRef($info->requestBody->content->{$contentType}->schema->{'$ref'}, $openapi);
			$body      = array_keys((array)$ref->properties);
			$headers[] = '\'Content-Type\' => \''.$contentType.'\'';
		}

		$content[$name] = '
	/**
	 * '.$info->summary.'
	 */
	protected array $'.$name.' = [
		\'method\'        => \''.strtoupper($method).'\',
		\'path\'          => \''.$path.'\',
		\'path_elements\' => '.(!empty($urlparams) ? '[\''.implode('\', \'', $urlparams).'\']' : 'null').',
		\'query\'         => '.(!empty($query) ? '[\''.implode('\', \'', $query).'\']' : 'null').',
		\'body\'          => '.(!empty($body) ? '[\''.implode('\', \'', $body).'\']' : 'null').',
		\'headers\'       => '.(!empty($headers) ? '['.implode(', ', $headers).']' : 'null').',
	];';

		$logger->info($name. ' - ' .$path);
	}

}

// and replace the class
createEndpointMap($content, $url, $soundcloud->endpoints);

exit;

function getRef(string $ref, object $target){
	$ref = explode('/', $ref);

	if(empty($ref) || array_shift($ref) !== '#'){
		throw new Exception('invalid $ref');
	}

	$segment = $target;

	foreach($ref as $r){
		if(isset($segment->{$r})){
			$segment = $segment->{$r};
		}
		else{
			throw new Exception('cannot find segment: '.$r);
		}
	}

	return $segment;
}
