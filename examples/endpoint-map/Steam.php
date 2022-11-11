<?php
/**
 * @created      15.03.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

use chillerlan\HTTP\Utils\MessageUtil;
use chillerlan\OAuth\Providers\Steam\SteamOpenID;

$ENVVAR = 'STEAMOPENID';

require_once __DIR__.'/create-endpointmap-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 */

$steam         = new SteamOpenID($http, $storage, $options, $logger);
// fetch a list of available methods
$r             = $steam->request('/ISteamWebAPIUtil/GetSupportedAPIList/v0001');
$interfaces    = MessageUtil::decodeJSON($r)->apilist->interfaces;
$content       = [];
$allInterfaces = [];
/*
$typeTranslation = [
	'uint64'    => 'int',
	'uint32'    => 'int',
	'int32'     => 'int',
	'rawbinary' => 'string',
	'{message}' => 'array',
	'{enum}'    => 'array',
];
*/
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

	$logger->info($interface->name);

	$content[] = '
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

		$content[$methodName] = '
	/**
	 * '.$interface->name.'/'.$method->name.'
	 */
	protected array $'.$methodName.' = [
		\'path\'   => \'/'.$interface->name.'/'.$method->name.'/v'.str_pad($method->version, 1, '0', STR_PAD_LEFT).'\',
		\'method\' => \''.$method->httpmethod.'\',
		\'query\'  => ['.(!empty($args) ? '\''.implode('\', \'', $args).'\'' : '').'],
	];';

		$logger->info('- '.$method->name);
	}

}

#print_r($allInterfaces);

// and replace the class
createEndpointMap($content, 'http://api.steampowered.com/ISteamWebAPIUtil/GetSupportedAPIList/v0001/', $steam->endpoints);

exit;
