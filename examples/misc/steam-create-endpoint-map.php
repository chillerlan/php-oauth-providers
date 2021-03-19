<?php
/**
 *
 * @created      15.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\misc;

use chillerlan\OAuth\Providers\Steam\SteamOpenID;
use ReflectionClass;
use function chillerlan\HTTP\Psr7\get_json;
use function date, file_put_contents, implode, in_array, lcfirst, print_r, str_pad, substr;
use const PHP_EOL, STR_PAD_LEFT;

$ENVVAR = 'STEAM';

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$steam     = new SteamOpenID($http, $storage, $options, $logger);
$epr       = new ReflectionClass($steam->endpoints);
$classfile = $epr->getFileName();

// fetch a list of available methods
$r = $steam->request('/ISteamWebAPIUtil/GetSupportedAPIList/v0001');
$interfaces = get_json($r)->apilist->interfaces;

$typeTranslation = [
	'uint64'    => 'int',
	'uint32'    => 'int',
	'int32'     => 'int',
	'rawbinary' => 'string',
	'{message}' => 'array',
	'{enum}'    => 'array',
];

$str = [];

$allInterfaces = [];

$includeInterfaces = [
	'ISteamApps',
	'ISteamNews',
	'ISteamUser',
	'ISteamUserStats',
	'ISteamWebAPIUtil',
	'IPlayerService',
	'IStoreService',
];

foreach($interfaces as $interface){
	$allInterfaces[] = $interface->name;

	if(!in_array($interface->name, $includeInterfaces)){
		continue;
	}

	$str[] = '
	/* 
	 * '.$interface->name.'
	 */';

	foreach($interface->methods as $method){

		if($method->httpmethod === 'POST'){
			continue;
		}

		$args = [];

		foreach($method->parameters as $parameter){
			if($parameter->name !== 'key'){
				$args[] = $parameter->name;
			}
		}

		$methodName = lcfirst(substr($interface->name, 1).$method->name);
		$version    = str_pad($method->version, 1, '0', STR_PAD_LEFT);

		$str[$methodName] = '
	/**
	 * '.$interface->name.'/'.$method->name.'
	 */
	protected array $'.$methodName.' = [
		\'path\'   => \'/'.$interface->name.'/'.$method->name.'/v'.$version.'\',
		\'method\' => \''.$method->httpmethod.'\',
		\'query\'  => ['.(!empty($args) ? '\''.implode('\', \'', $args).'\'' : '').'],
	];';


	}

}

print_r($allInterfaces);

// and replace the class
$content = '<?php
/**
 * Class '.$epr->getShortName().' (auto created)
 *
 * @link http://api.steampowered.com/ISteamWebAPIUtil/GetSupportedAPIList/v0001/
 *
 * @created '.date('d.m.Y').'
 * @license MIT
 */

namespace '.$epr->getNamespaceName().';

use chillerlan\\OAuth\\MagicAPI\\EndpointMap;

class '.$epr->getShortName().' extends EndpointMap{
'.implode(PHP_EOL, $str).'

}
';

file_put_contents($classfile, $content);

exit;
