<?php
/**
 * @filesource   flickr-create-endpoint-map.php
 * @created      11.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Flickr\Flickr;

$ENVVAR = 'FLICKR';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$flickr    = new Flickr($http, $storage, $options, $logger);
$epr       = new \ReflectionClass($flickr->endpoints);
$classfile = $epr->getFileName();

// fetch a list of available methods
$r       = $flickr->request('flickr.reflection.getMethods', [], 'GET');
$methods = \array_column(Psr7\get_json($r)->methods->method, '_content');

// now walk through the array and get the method info
$str = [];
foreach($methods as $methodname){
	$methodInfo = $flickr->request('flickr.reflection.getMethodInfo', ['method_name' => $methodname], 'GET');
	$m          = Psr7\get_json($methodInfo);

	if(!$m || !isset($m->method)){
		$logger->debug($methodname, (array)$methodInfo->headers);

		continue;
	}

	$args = [];
	if(isset($m->arguments)){
		foreach($m->arguments->argument as $a){

			if($a->name !== 'api_key'){
				$args[] = $a->name;
			}
		}
	}

	// convert from dot.notation to camelCase
	$name = \explode('.', $m->method->name);

	\array_shift($name); // remove the "flickr"

	foreach($name as $k => $parts){
		$name[$k] = \ucfirst($parts);
	}

	// create a docblock
	// @todo
	$str[] = '
	/**
	 * @link https://www.flickr.com/services/api/'.$m->method->name.'.html
	 */
	protected $'.\lcfirst(\implode('', $name)).' = [
		\'path\'  => \''.$m->method->name.'\',
		\'query\' => ['.(!empty($args) ? '\''.\implode('\', \'', $args).'\'' : '').'],
	];';

	$logger->info($m->method->name);
}

// and replace the class
$content = '<?php
/**
 * Class '.$epr->getShortName().' (auto created)
 *
 * @link https://www.flickr.com/services/api/
 *
 * @filesource   '.$epr->getShortName().'.php
 * @created      '.\date('d.m.Y').'
 * @package      '.$epr->getNamespaceName().'
 * @license      MIT
 */

namespace '.$epr->getNamespaceName().';

use chillerlan\\HTTP\\MagicAPI\\EndpointMap;

class '.$epr->getShortName().' extends EndpointMap{
'.\implode(PHP_EOL, $str).'

}
';

\file_put_contents($classfile, $content);

exit;
