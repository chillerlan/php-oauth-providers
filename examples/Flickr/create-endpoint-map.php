<?php
/**
 * @filesource   create-endpoint-map.php
 * @created      11.04.2018
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Flickr;

use chillerlan\HTTP\Psr7;
use chillerlan\OAuth\Providers\Flickr\FlickrEndpoints;

/** @var \chillerlan\OAuth\Providers\Flickr\Flickr $flickr */
$flickr      = null;
/** @var \Psr\Log\LoggerInterface $logger */
$logger      = null;
$servicename = null;

require_once __DIR__.'/flickr-common.php';

$reflection = new \ReflectionClass(FlickrEndpoints::class);
$classfile  = $reflection->getFileName();

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
 * Class FlickrEndpoints (auto created)
 *
 * @link https://www.flickr.com/services/api/
 *
 * @filesource   FlickrEndpoints.php
 * @created      '.\date('d.m.Y').'
 * @package      chillerlan\\OAuth\\Providers\\Flickr
 * @license      MIT
 */

namespace chillerlan\\OAuth\\Providers\\Flickr;

use chillerlan\\HTTP\\MagicAPI\\EndpointMap;

class FlickrEndpoints extends EndpointMap{
'.\implode(PHP_EOL, $str).'

}
';

\file_put_contents($classfile, $content);

exit;
