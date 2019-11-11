<?php
/**
 * @filesource   opencaching-create-endpoint-map.php
 * @created      05.03.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\misc;

use chillerlan\OAuth\Providers\OpenCaching\OpenCaching;
use ReflectionClass;

use function chillerlan\HTTP\Psr7\get_json;
use function array_column, date, explode, file_put_contents, implode, lcfirst, str_replace, strpos, ucfirst;

use const PHP_EOL;

$ENVVAR = 'OKAPI';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$okapi     = new OpenCaching($http, $storage, $options, $logger);
$epr       = new ReflectionClass($okapi->endpoints);
$classfile = $epr->getFileName();

// fetch a list of available methods
$r       = $okapi->request('/apiref/method_index', [], 'GET');
$methods = array_column(get_json($r), 'name');

// now walk through the array and get the method info
$str = [];

foreach($methods as $methodname){

	// skip auth endpoints
	if(strpos($methodname, 'services/oauth/') === 0){
		continue;
	}

	$methodInfo = $okapi->request('/apiref/method', ['name' => $methodname], 'GET');
	$m          = get_json($methodInfo);
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
 * Class '.$epr->getShortName().' (auto created)
 *
 * @link https://www.opencaching.de/okapi/introduction.html
 *
 * @filesource   '.$epr->getShortName().'.php
 * @created      '.date('d.m.Y').'
 * @package      '.$epr->getNamespaceName().'
 * @license      MIT
 */

namespace '.$epr->getNamespaceName().';

use chillerlan\\HTTP\\MagicAPI\\EndpointMap;

class '.$epr->getShortName().' extends EndpointMap{
'.implode(PHP_EOL, $str).'

}
';

file_put_contents($classfile, $content);

exit;
