<?php
/**
 * Class DiscogsAPITest
 *
 * @filesource   DiscogsAPITest.php
 * @created      10.07.2017
 * @package      chillerlan\OAuthTest\Providers\Discogs
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Discogs;

use chillerlan\OAuth\Providers\Discogs\Discogs;
use chillerlan\OAuthTest\API\OAuth1APITestAbstract;

/**
 * Discogs API test & usage examples
 *
 * @todo
 *
 * marketplaceCreateListing
 * marketplaceListing
 * marketplaceOrder
 * marketplaceOrderAddMessage
 * marketplaceOrderMessages
 * marketplaceOrders
 * marketplaceRemoveListing
 * marketplaceUpdateListing
 * marketplaceUpdateOrder
 *
 *
 * @property \chillerlan\OAuth\Providers\Discogs\Discogs $provider
 */
class DiscogsAPITest extends OAuth1APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = Discogs::class;
	protected $ENV = 'DISCOGS';

	protected $testuser;

	protected function setUp():void{
		parent::setUp();

		$this->testuser = $this->dotEnv->DISCOGS_TESTUSER;
	}

	public function testIdentity(){
		$r = $this->provider->identity();
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

	public function testProfile(){
		$r = $this->provider->profile($this->testuser);
		$this->assertSame($this->testuser, $this->responseJson($r)->username);
	}

	/**
	 * @return array
	 */
	public function paginatedEndpointDataProvider(){
		return [
			'artistReleases'    => ['artistReleases', ['198669'], 'releases'],
			'collectionRelease' => ['collectionRelease', ['{TESTUSER}', '10149101'], 'releases'],
			'contributions'     => ['contributions', ['{TESTUSER}', ['sort' => 'artist', 'sort_order' => 'desc']], 'contributions',],
			'inventory'         => ['inventory', ['{TESTUSER}', ['sort' => 'artist', 'sort_order' => 'desc']], 'listings'],
			'labelReleases'     => ['labelReleases', ['800623', ['page' => 1, 'per_page' => 10]], 'releases'],
			'lists'             => ['lists', ['{TESTUSER}'], 'lists'],
			'masterVersions'    => ['masterVersions', ['152693'], 'versions'],
			'submissions'       => ['submissions', ['{TESTUSER}'], 'submissions'],
		];
	}

	/**
	 * @dataProvider paginatedEndpointDataProvider
	 *
	 * @param $method
	 * @param $params
	 * @param $field
	 */
	public function testPaginatedEndpoint($method, $params, $field){
		$params = array_map(function($p){
			return str_replace('{TESTUSER}', $this->testuser, $p);
		}, $params);

		$r = $this->provider->{$method}(...$params);
		$this->assertTrue(isset($this->responseJson($r)->{$field}));
	}

	public function endpointDataProvider(){
		return [
			'artist'                 => ['artist', ['198669'], 'id'],
			'collectionFields'       => ['collectionFields', ['{TESTUSER}'], 'fields'],
			'collectionFolders'      => ['collectionFolders', ['{TESTUSER}'], 'folders'],
			'collectionValue'        => ['collectionValue', ['{TESTUSER}'], 'median'],
			'label'                  => ['label', ['800623'], 'id'],
			'list'                   => ['list', ['198961'], 'items'],
			'marketplaceFee'         => ['marketplaceFee', ['10.00'], 'currency'],
			'marketplaceFeeCurrency' => ['marketplaceFeeCurrency', ['10.00', 'EUR'], 'currency'],
			'master'                 => ['master', ['152693'], 'id'],
			'releasePriceSuggestion' => ['releasePriceSuggestion', ['2039886'], 'Mint (M)'],
			'releaseRating'          => ['releaseRating', ['10149101'], 'release_id'],
			'releaseUserRating'      => ['releaseUserRating', ['10149101', '{TESTUSER}'], 'release_id'],
		];
	}

	/**
	 * @dataProvider endpointDataProvider
	 *
	 * @param $method
	 * @param $params
	 * @param $field
	 */
	public function testEndpoints($method, $params, $field){
		$params = array_map(function($p){
			return str_replace('{TESTUSER}', $this->testuser, $p);
		}, $params);

		$r = $this->provider->{$method}(...$params);
		$this->assertTrue(isset($this->responseJson($r)->{$field}));
	}

	public function testCollection(){
		$name       = 'test_'.md5(microtime(true));
		$release_id = 10149101; // Helium - The Dirt Of Luck RM

		$r = $this->provider->collectionCreateFolder($this->testuser, ['name' => $name]);
		$j = $this->responseJson($r);
		$folder_id = $j->id;
		$this->assertSame($name, $j->name);

		$r = $this->provider->collectionUpdateFolder($this->testuser, $folder_id, ['name' => 'testy'.$name]);
		$this->assertSame('testy'.$name, $this->responseJson($r)->name);

		$r = $this->provider->collectionFolder($this->testuser, $folder_id);
		$j = $this->responseJson($r);
		$this->assertSame(0, $j->count);
		$this->assertSame($folder_id, $j->id);

		$r = $this->provider->collectionFolderAddRelease($this->testuser, $folder_id, $release_id);
		$this->assertSame(201, $r->getStatusCode());
		$instance_id = $this->responseJson($r)->instance_id;

		$r = $this->provider->collectionFolderRateRelease($this->testuser, $folder_id, $release_id, $instance_id, ['rating' => 5]);
		$this->assertSame(204, $r->getStatusCode());

		$r = $this->provider->collectionFolderReleases($this->testuser, $folder_id);
		$release_item = $this->responseJson($r)->releases[0];
		$this->assertSame($instance_id, $release_item->instance_id);
		$this->assertSame($folder_id, $release_item->folder_id);
		$this->assertSame($release_id, $release_item->id);
		$this->assertSame(5, $release_item->rating);

		$this->response = $this->provider->collectionFolderUpdateReleaseField($this->testuser, $folder_id, $release_id, $instance_id, '3', ['value' => 'test']);
		$this->assertSame(200, $r->getStatusCode()); // 204???

		$this->response = $this->provider->collectionFolderRemoveRelease($this->testuser, $folder_id, $release_id, $instance_id);
		$this->assertSame(200, $r->getStatusCode()); // 204???

		$this->response =$this->provider->collectionDeleteFolder($this->testuser, $folder_id);
		$this->assertSame(200, $r->getStatusCode()); // 204???
	}


	public function testWantlist(){
		$params = ['page' => 1, 'per_page' => 1, 'sort' => 'added', 'sort_order' => 'desc'];

		// fetch the most recently added wantlist item
		$r  = $this->provider->wantlist($this->testuser, $params);
		$id = $this->responseJson($r)->wants[0]->id;

		// remove it
		$r = $this->provider->wantlistRemove($this->testuser, $id);
		$this->assertSame(204, $r->getStatusCode());

		// re-add
		$r = $this->provider->wantlistAdd($this->testuser, $id, ['notes' => 'test', 'rating' => 3]);
		$this->assertSame('test', $this->responseJson($r)->notes);

		// verify
		$r = $this->provider->wantlist($this->testuser, $params);
		$this->assertSame($id, $this->responseJson($r)->wants[0]->id);

		// edit
		$r = $this->provider->wantlistUpdate($this->testuser, $id, ['notes' => 'testytest', 'rating' => 5]);
		$j = $this->responseJson($r);
		$this->assertSame('testytest', $j->notes);
		$this->assertSame(5, $j->rating);
	}

	public function testRelease(){
		$release_id = 10298211; // Helium - The Magic City RM

		$r = $this->provider->release($release_id);
		$j = $this->responseJson($r);
		$this->assertSame(2017, $j->year);
		$this->assertSame($release_id, $j->id);

		$r = $this->provider->releaseRemoveUserRating($release_id, $this->testuser);
		$this->assertSame(204, $r->getStatusCode());

		$r = $this->provider->releaseUpdateUserRating($release_id, $this->testuser, ['rating' => 5]);
		$this->assertSame(201, $r->getStatusCode());
		$this->assertSame($release_id, $this->responseJson($r)->release_id);

		$r = $this->provider->releaseUserRating($release_id, $this->testuser);
		$this->assertSame(5, $this->responseJson($r)->rating);
	}

}
