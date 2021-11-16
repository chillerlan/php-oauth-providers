<?php
/**
 * @created      21.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

use chillerlan\HTTP\Psr18\CurlClient;
use chillerlan\OAuth\MagicAPI\EndpointMapInterface;
use chillerlan\OAuthExamples\OAuthExampleSessionStorage;

/**
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 * @var \Psr\Http\Client\ClientInterface $http
 *
 * @var string $ENVFILE
 * @var string $ENVVAR
 * @var string $CFGDIR
 * @var string $LOGLEVEL
 */

require_once __DIR__.'/../provider-example-common.php';

$storage = new OAuthExampleSessionStorage($options, $CFGDIR);
$http    = new CurlClient($options);

function createEndpointMap(array $content, string $link, EndpointMapInterface $endpoints, string $base = null):void{
	$reflection = new ReflectionClass($endpoints);
	$API_BASE   = '';

	if(!empty($base)){
		$API_BASE = PHP_EOL."\t".'protected string $API_BASE = \''.$base.'\';'.PHP_EOL;
	}

	$fileContent = '<?php
/**
 * Class '.$reflection->getShortName().' (auto created)
 *
 * @link    '.$link.'
 * @created '.date('d.m.Y').'
 * @license MIT
 */

namespace '.$reflection->getNamespaceName().';

use chillerlan\\OAuth\\MagicAPI\\EndpointMap;

class '.$reflection->getShortName().' extends EndpointMap{
'.$API_BASE.implode(PHP_EOL, $content).'

}
';

	file_put_contents($reflection->getFileName(), $fileContent);
}
