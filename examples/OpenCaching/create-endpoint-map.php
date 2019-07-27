<?php
/**
 * @filesource   create-endpoint-map.php
 * @created      05.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\OpenCaching;

use chillerlan\HTTP\Psr7;

/** @var \chillerlan\OAuth\Providers\OpenCaching\OpenCaching $okapi */
$okapi  = null;
/** @var \Psr\Log\LoggerInterface $logger */
$logger = null;

require_once __DIR__.'/opencaching-common.php';

$reflection = new \ReflectionClass($okapi->endpoints);
$classfile  = $reflection->getFileName();

// fetch a list of available methods
$r       = $okapi->request('/apiref/method_index', [], 'GET');
$methods = array_column(Psr7\get_json($r), 'name');

// now walk through the array and get the method info
$str = [];

foreach($methods as $methodname){

	// skip auth endpoints
	if(strpos($methodname, 'services/oauth/') === 0){
		continue;
	}

	$methodInfo = $okapi->request('/apiref/method', ['name' => $methodname], 'GET');
	$m          = Psr7\get_json($methodInfo);
	$p          = str_replace('services/', '/', $m->name);

	$args = [];
	if(isset($m->arguments)){
		foreach($m->arguments as $a){
			$args[] = $a->name;
		}
	}

	// camelize path
	$name = explode('/', $p);

	foreach($name as $k => $part){

		// camelize underscored part
		$np = explode('_', $part);

		foreach($np as $j => $pp){
			$np[$j] = ucfirst($pp);
		}

		$name[$k] = ucfirst(implode('', $np));
	}

	// create a docblock
	// @todo
	$str[] = '
	/**
	 * @link https://www.opencaching.de/okapi/'.$m->name.'.html
	 */
	protected $'.lcfirst(implode('', $name)).' = [
		\'path\'  => \''.$p.'\',
		\'query\' => ['.(!empty($args) ? '\''.implode('\', \'', $args).'\'' : '').'],
	];';

	$logger->info($m->name);
}

// and replace the class
$content = '<?php
/**
 * Class OpenCachingEndpoints (auto created)
 *
 * @link https://www.opencaching.de/okapi/introduction.html
 *
 * @filesource   OpenCachingEndpoints.php
 * @created      '.date('d.m.Y').'
 * @package      '.$reflection->getNamespaceName().'
 * @license      MIT
 */

namespace '.$reflection->getNamespaceName().';

use chillerlan\\HTTP\\MagicAPI\\EndpointMap;

class OpenCachingEndpoints extends EndpointMap{
'.implode(PHP_EOL, $str).'

}
';

file_put_contents($classfile, $content);

exit;