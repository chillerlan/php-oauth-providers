<?php
/**
 * Trait APITestTrait
 *
 * @created      12.04.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\DotEnv\DotEnv;
use chillerlan\OAuth\OAuthOptions;
use chillerlan\Settings\SettingsContainerInterface;
use Exception;
use function constant, defined, realpath;

trait APITestTrait{

	protected DotEnv $dotEnv;
	protected string $ENV;

	protected function setUp():void{

		foreach(['TEST_CFGDIR', 'TEST_ENVFILE'] as $constant){
			if(!defined($constant)){
				throw new Exception($constant.' not set -> see phpunit.xml');
			}
		}

		// get the .env config
		$this->CFG      = realpath(__DIR__.'/../'.constant('TEST_CFGDIR'));
		$this->dotEnv   = (new DotEnv($this->CFG, constant('TEST_ENVFILE')))->load();
		$this->testuser = (string)$this->dotEnv->get($this->ENV.'_TESTUSER');

		parent::setUp();
	}

	protected function initOptions():SettingsContainerInterface{
		return new OAuthOptions([
			'key'              => $this->dotEnv->get($this->ENV.'_KEY'),
			'secret'           => $this->dotEnv->get($this->ENV.'_SECRET'),
			'tokenAutoRefresh' => true,
		]);
	}

}
