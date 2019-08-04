<?php
/**
 * @filesource   functions.php
 * @created      31.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers;

use chillerlan\OAuth\Core\OAuthInterface;
use FilesystemIterator, RecursiveDirectoryIterator, RecursiveIteratorIterator, ReflectionClass;

use function function_exists, hash, realpath, str_replace, strlen, substr;

if(!function_exists(__NAMESPACE__.'\\getProviders')){

	function getProviders():array{
		$providers = [];

		/** @var \SplFileInfo $e */
		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__, FilesystemIterator::SKIP_DOTS)) as $e){

			if($e->getExtension() !== 'php' || realpath($e->getPath()) === __DIR__){
				continue;
			}

			$class = __NAMESPACE__.str_replace('/', '\\', substr($e->getPathname(), strlen(__DIR__), -4));
			$r     = new ReflectionClass($class);

			if(!$r->implementsInterface(OAuthInterface::class) || $r->isAbstract()){
				continue;
			}

			$providers[hash('crc32b', $r->getShortName())] = ['name' => $r->getShortName(), 'fqcn' => $class];
		}

		return $providers;
	}

}
