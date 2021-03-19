<?php
/**
 * Class FunctionTest
 *
 * @filesource   FunctionTest.php
 * @created      02.08.2019
 * @package      chillerlan\OAuthTest\Providers
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers;

use chillerlan\OAuth\Core\OAuthInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

use function chillerlan\OAuth\Providers\getProviders;

class FunctionTest extends TestCase{

	public function testGetProviders(){

		foreach(getProviders() as $p){
			$this::assertTrue((new ReflectionClass($p['fqcn']))->implementsInterface(OAuthInterface::class));
		}

	}

}
