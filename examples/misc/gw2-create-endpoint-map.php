<?php
/**
 * @filesource   gw2-create-endpoint-map.php
 * @created      28.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\misc;

use chillerlan\OAuth\Providers\GuildWars2\GuildWars2;

use function array_merge, count, date, explode, file_get_contents, file_put_contents,
	implode, json_decode, lcfirst, strpos, substr, trim, ucfirst, uksort;

use const PHP_EOL;

require_once __DIR__.'/../provider-example-common.php';

/**
 * @var \Psr\Http\Client\ClientInterface $http
 * @var \chillerlan\OAuth\Storage\OAuthStorageInterface $storage
 * @var \chillerlan\Settings\SettingsContainerInterface $options
 * @var \Psr\Log\LoggerInterface $logger
 *
 * @var \chillerlan\DotEnv\DotEnv $env
 */

$gw2       = new GuildWars2($http, $storage, $options, $logger);
$epr       = new \ReflectionClass($gw2->endpoints);
$classfile = $epr->getFileName();

$gw2->storeGW2Token($env->GW2_TOKEN);

#$api = explode("\r\n", explode("\r\n\r\n", explode("API:\r\n",  file_get_contents('https://api.guildwars2.com/v2'), 2)[1])[0]);
$api = json_decode(file_get_contents('https://api.guildwars2.com/v2.json'), true)['routes'];

// add missing endpoints
$api[] = ['path' => '/v2/achievements/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/achievements/categories/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/achievements/groups/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/backstory/answers/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/backstory/questions/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/cats/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/characters/:id', 'lang' => false, 'auth' => true, 'active' => true];
$api[] = ['path' => '/v2/colors/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/exchange/gems?quantity', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/exchange/coins?quantity', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/listings/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/prices/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/transactions/current', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/transactions/current/buys', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/transactions/current/sells', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/transactions/history', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/transactions/history/buys', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/commerce/transactions/history/sells', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/continents/:continent_id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/continents/:continent_id/floors', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/continents/:continent_id/floors/:floor_id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/continents/:continent_id/floors/:floor_id/regions', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/continents/:continent_id/floors/:floor_id/regions/:region_id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/continents/:continent_id/floors/:floor_id/regions/:region_id/maps', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/continents/:continent_id/floors/:floor_id/regions/:region_id/maps/:map_id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/currencies/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/dungeons/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/emblem/backgrounds', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/emblem/backgrounds/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/emblem/foregrounds', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/emblem/foregrounds/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/files/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/finishers/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/gliders/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/guild/permissions/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/guild/upgrades/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/items/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/itemstats/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/legends/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/mailcarriers/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/maps/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/masteries/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/materials/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/minis/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/nodes/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/outfits/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/pets/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/professions/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/pvp/amulets/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/pvp/heroes/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/pvp/ranks/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/pvp/seasons/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/pvp/races/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/quaggans/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/raids/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/recipes/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/skills/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/skins/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/specializations/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/stories/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/stories/seasons/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/titles/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/traits/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/worlds/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/wvw/abilities/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/wvw/matches/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/wvw/matches/overview/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/wvw/matches/scores/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/wvw/matches/stats/:id', 'lang' => false, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/wvw/objectives/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/wvw/ranks/:id', 'lang' => true, 'auth' => false, 'active' => true];
$api[] = ['path' => '/v2/wvw/upgrades/:id', 'lang' => true, 'auth' => false, 'active' => true];

foreach($api as $endpoint){
	$query         = [];
	$path_elements = [];
	$path          = explode('/', trim($endpoint['path'], '/v2 '));
	$name          = $path;

	$i = 1;
	foreach($path as $k => $el){
		$name[$k] = ucfirst($el);

		$x = explode('?', $el);

		if(count($x) === 2){
			$query = array_merge($query, explode('&', $x[1]));
		}

		if(strpos($el, ':') === 0){
			$pe              = substr($el, 1);
			$path_elements[] = substr($el, 1);
			$path[$k]        = '%'.$i.'$s';
			$name[$k]        = ($pe !== 'id' ? ucfirst(explode('_', $pe)[0]) : '').'Id';
			$i++;
		}
	}

	if((bool)$endpoint['lang']){
		$query[] = 'lang';
	}

	if((bool)$endpoint['auth']){
		$query[] = 'access_token';
	}

	if(!(bool)$endpoint['active']){
		continue;
	}

	$apiMethods[lcfirst(implode('', $name))] = [
		'path'          => '/'.implode('/', $path),
		'query'         => $query,
		'path_elements' => $path_elements,
	];
}

uksort($apiMethods, 'strcmp');

$str = [];

foreach($apiMethods as $method => $args){
	// create a docblock
	// @todo
	$str[] = '
	protected $'.explode('?', $method)[0].' = [
		\'path\'          => \''.$args['path'].'\',
		\'query\'         => ['.(!empty($args['query']) ? '\''.implode('\', \'', $args['query']).'\'' : '').'],
		\'path_elements\' => ['.(!empty($args['path_elements']) ? '\''.implode('\', \'', $args['path_elements']).'\'' : '').'],
	];';

	$logger->info($method);
}

// and replace the class
$content = '<?php
/**
 * Class '.$epr->getShortName().' (auto created)
 *
 * @link https://wiki.guildwars2.com/wiki/API:Main
 * @link https://api.guildwars2.com/v2.json
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
