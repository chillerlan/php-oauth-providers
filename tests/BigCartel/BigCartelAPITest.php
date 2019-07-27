<?php
/**
 * Class BigCartelAPITest
 *
 * @filesource   BigCartelAPITest.php
 * @created      10.04.2018
 * @package      chillerlan\OAuthTest\Providers\BigCartel
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\BigCartel;

use chillerlan\OAuth\Providers\BigCartel\BigCartel;
use chillerlan\OAuthTest\API\OAuth2APITestAbstract;

/**
 * @property \chillerlan\OAuth\Providers\BigCartel\BigCartel $provider
 */
class BigCartelAPITest extends OAuth2APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = BigCartel::class;
	protected $ENV = 'BIGCARTEL';

	/**
	 * @var int
	 */
	protected $account_id;

	protected function setUp():void{
		parent::setUp();

		$this->account_id = $this->storage->getAccessToken($this->provider->serviceName)->extraParams['account_id'];
	}

	public function testAccount(){
		$r = $this->provider->account();
		$this->assertSame($this->account_id, (int)$this->responseJson($r)->data[0]->id);
	}

	public function testGetAccount(){
		$r = $this->provider->getAccount($this->account_id);
		$this->assertSame($this->account_id, (int)$this->responseJson($r)->data->id);
	}

	public function testArtists(){
		$r = $this->provider->getArtists($this->account_id);
		$this->assertSame('account.artists-disabled', $this->responseJson($r)->errors[0]->code);
	}

	public function testCategories(){
		// undocumented -> https://developers.bigcartel.com/api/v1#status-codes
		// HTTP/409 Conflict - the supplied body doesn't match the expected format

		// create category
		$body           = ['data' => ['type' => 'categories', 'attributes' => ['name' => 'test']]];
		$r = $this->provider->createCategory($this->account_id, $body);
		$this->assertSame(201, $r->getStatusCode());

		// categories list
		$r      = $this->provider->getCategories($this->account_id);
		$j      = $this->responseJson($r);
		$cat_id = $j->data[0]->id;
		$this->assertSame('test', $j->data[0]->attributes->name);

		// category item
		$r = $this->provider->getCategory($this->account_id, $cat_id);
		$j = $this->responseJson($r);
		$this->assertSame($cat_id, $j->data->id);
		$this->assertSame('test', $j->data->attributes->name);

		//update
		$body           = ['data' => ['id' => $cat_id, 'type' => 'categories', 'attributes' => ['name' => 'updatetest']]];
		$r = $this->provider->updateCategory($this->account_id, $cat_id, $body);
		$this->assertSame(200, $r->getStatusCode());

		// verify the update
		$r = $this->provider->getCategory($this->account_id, $cat_id);
		$this->assertSame('updatetest', $this->responseJson($r)->data->attributes->name);

		//delete
		$r = $this->provider->deleteCategory($this->account_id, $cat_id);
		$this->assertSame(204, $r->getStatusCode());
	}

	public function testCountries(){
		$r = $this->provider->countries();

		// yup, it exists!
		$this->assertGreaterThan(200, $this->responseJson($r)->meta->count);
	}

	public function testDiscounts(){
		$this->markTestSkipped();
	}

	public function testOrders(){
		$this->markTestSkipped();
	}

	public function testProducts(){
		// requires a product named "test"

		//products list
		$r          = $this->provider->getProducts($this->account_id);
		$j          = $this->responseJson($r);
		$product_id = $j->data[0]->id;
		$this->assertSame('test', $j->data[0]->attributes->name);

		// product item
		$r = $this->provider->getProduct($this->account_id, $product_id);
		$j = $this->responseJson($r);
		$this->assertSame($product_id, $j->data->id);
		$this->assertSame('test', $j->data->attributes->name);
	}

}
