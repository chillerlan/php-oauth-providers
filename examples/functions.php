<?php
/**
 * @filesource   functions.php
 * @created      31.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples;

use chillerlan\OAuth\Core\OAuthInterface;
use FilesystemIterator, RecursiveDirectoryIterator, RecursiveIteratorIterator, ReflectionClass;

function getProviders():array{
	$SRCDIR    = __DIR__.'/../src';
	$providers = [];

	/** @var \SplFileInfo $e */
	foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($SRCDIR, FilesystemIterator::SKIP_DOTS)) as $e){

		if($e->getExtension() !== 'php'){
			continue;
		}

		$class = 'chillerlan\\OAuth\\Providers'.str_replace('/', '\\', substr($e->getPathname(), strlen($SRCDIR), -4));
		$r     = new ReflectionClass($class);

		if(!$r->implementsInterface(OAuthInterface::class) || $r->isAbstract()){
			continue;
		}

		$providers[hash('crc32b', $r->getShortName())] = [$r->getShortName(), $class];
	}

	return $providers;
}


