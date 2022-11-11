<?php
/**
 * @created      11.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\Flickr\Flickr;


$ENVVAR = 'FLICKR';

require_once __DIR__.'/create-endpointmap-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$flickr  = new Flickr($http, $storage, $options, $logger);
$list    = $flickr->request('flickr.reflection.getMethods', [], 'GET');
$methods = array_column(MessageUtil::decodeJSON($list)->methods->method, '_content');
$content = [];

// now walk through the array and get the method info
foreach($methods as $methodname){
	$methodInfo = $flickr->request('flickr.reflection.getMethodInfo', ['method_name' => $methodname], 'GET');
	$endpoint   = MessageUtil::decodeJSON($methodInfo);

	if(!$endpoint || !isset($endpoint->method)){
		$logger->debug($methodname);

		continue;
	}

	$args = [];
	if(isset($endpoint->arguments)){
		foreach($endpoint->arguments->argument as $a){
			if($a->name !== 'api_key'){
				$args[] = $a->name;
			}
		}
	}

	// convert from dot.notation to camelCase
	$name = explode('.', $endpoint->method->name);
	array_shift($name); // remove the "flickr"
	$name = lcfirst(implode('', array_map('ucfirst', $name)));

	// create a docblock
	$content[] = '
	/**
	 * @link https://www.flickr.com/services/api/'.$endpoint->method->name.'.html
	 */
	protected array $'.$name.' = [
		\'path\'  => \''.$endpoint->method->name.'\',
		\'query\' => ['.(!empty($args) ? '\''.implode('\', \'', $args).'\'' : '').'],
	];';

	$logger->info($endpoint->method->name);
}

// and replace the class
createEndpointMap($content, 'https://www.flickr.com/services/api/', $flickr->endpoints);

exit;
