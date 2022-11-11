<?php
/**
 * @created      05.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\OpenCaching\OpenCaching;

$ENVVAR = 'OKAPI';

require_once __DIR__.'/create-endpointmap-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$okapi   = new OpenCaching($http, $storage, $options, $logger);
$list    = $okapi->request('/services/apiref/method_index', [], 'GET');
$methods = array_column(MessageUtil::decodeJSON($list), 'name');
$content = [];

// now walk through the array and get the method info
foreach($methods as $methodname){

	// skip auth endpoints
	if(str_starts_with($methodname, 'services/oauth/')){
		continue;
	}

	$methodInfo = $okapi->request('/services/apiref/method', ['name' => $methodname], 'GET');
	$method     = MessageUtil::decodeJSON($methodInfo);
	$path       = str_replace('services/', '/', $method->name);
	$name       = implode('', array_map('ucfirst', explode('-', str_replace(['/', '_'], '-', $path))));
	$args       = isset($method->arguments) ? array_column($method->arguments, 'name') : [];

	// create a docblock
	$content[$name] = '
	/**
	 * '.$method->brief_description.'
	 *
	 * @link https://www.opencaching.de/okapi/'.$method->name.'.html
	 */
	protected array $'.lcfirst($name).' = [
		\'path\'  => \''.$path.'\',
		\'query\' => ['.(!empty($args) ? '\''.implode('\', \'', $args).'\'' : '').'],
	];';

	$logger->info($method->name);
}

ksort($content);

// and replace the class
createEndpointMap($content, 'https://www.opencaching.de/okapi/introduction.html', $okapi->endpoints, '/services');

exit;
