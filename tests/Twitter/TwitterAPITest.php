<?php
/**
 * Class TwitterAPITest
 *
 * @created      11.07.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Twitter;

use chillerlan\OAuth\Providers\Twitter\Twitter;
use chillerlan\OAuthTest\Providers\OAuth1APITest;

/**
 * twitter API tests & examples
 *
 * @link https://developer.twitter.com/en/docs/api-reference-index
 *
 * @property \chillerlan\OAuth\Providers\Twitter\Twitter $provider
 */
class TwitterAPITest extends OAuth1APITest{

	protected string $FQN = Twitter::class;
	protected string $ENV = 'TWITTER';

	protected string $screen_name;
	protected int $user_id;

	protected function setUp():void{
		parent::setUp();

		$token             = $this->storage->getAccessToken($this->provider->serviceName);
		$this->screen_name = $token->extraParams['screen_name'];
		$this->user_id     = (int)$token->extraParams['user_id'];
	}

	// the following 3 are pretty much fail-safe, good for testing your config

	public function testGeoReverseGeocode():void{
		$r = $this->provider->geoReverseGeocode(['lat' => 37.781157, 'long' => -122.400612831116, 'accuracy' => '3m', 'granularity' => 'city', 'max_results' => 3]);
		$this::assertSame('5a110d312052166f', $this->responseJson($r)->result->places[0]->id);
	}

	public function testGeoSearch():void{
		$r = $this->provider->geoSearch(['query' => 'Toronto', 'max_results' => 3]);
		$this::assertSame('3797791ff9c0e4c6', $this->responseJson($r)->result->places[0]->id);
	}

	public function testLanguages():void{
		$r = $this->provider->helpLanguages();
		$this::assertContains('de', array_column($this->responseJson($r), 'code'));
	}
	/**
	 * @dataProvider endpointDataProvider
	 *
	 * @param string $method
	 * @param array  $arguments
	 * @param string $field
	 * @param mixed  $expected
	 * @param bool   $headers
	 */
	public function testEndpoints(string $method, array $arguments, string $field, $expected, bool $headers):void{

		/** @var \Psr\Http\Message\ResponseInterface $r */
		$r = $this->provider->{$method}(...$arguments);
		$j = $this->responseJson($r);


		if($headers){
			$this::assertTrue($r->hasHeader($field));
		}
		elseif(is_array($j)){
			is_null($expected)
				? $this::assertTrue(isset($j[0]->{$field}))
				: $this::assertSame($expected, $j[0]->{$field});
		}
		else{
			is_null($expected)
				? $this::assertTrue(isset($j->{$field}))
				: $this::assertSame($expected, $j->{$field});
		}

	}

	public function endpointDataProvider():array{

		$endpointData = [
#			'accountRemoveProfileBanner'  => ['accountRemoveProfileBanner', [], 'statuscode', 200, true],
#			'statusesRetweets'            => ['statusesRetweets', [['id' => '20', 'trim_user' => true, 'include_my_retweet' => false, 'include_entities' => true, 'skip_status' => false]], 'id', null, false],
#			'statusesShow'                => ['statusesShow', [['id' => '20', 'trim_user' => true, 'include_my_retweet' => false, 'include_entities' => false, 'include_ext_alt_text' => false]], 'id', 20, false],
			'accountSettings'             => ['accountSettings', [], 'time_zone', null, false],
#			'accountUpdateProfile'        => ['accountUpdateProfile', [[]], 'screen_name', $this->screen_name, false],
#			'accountUpdateSettings'       => ['accountUpdateSettings', [[]], 'screen_name', $this->screen_name, false],
			'blocksList'                  => ['blocksList', [['include_entities' => false, 'skip_status' => true]], 'users', null, false],
			'collectionsEntries'          => ['collectionsEntries', [['id' => 'custom-875208674678931456']], 'objects', null, false],
			'collectionsList'             => ['collectionsList', [['screen_name' => 'Twitter']], 'objects', null, false],
			'collectionsShow'             => ['collectionsShow', [['id' => 'custom-875208674678931456']], 'objects', null, false],
			'favoritesList'               => ['favoritesList', [['screen_name' => 'twitter', 'skip_status' => true, 'include_entities' => false]], 'id', null, false],
			'followersIds'                => ['followersIds', [], 'ids', null, false],
			'followersList'               => ['followersList', [], 'users', null, false],
			'friendsIds'                  => ['friendsIds', [], 'ids', null, false],
			'friendsList'                 => ['friendsList', [], 'users', null, false],
			'friendshipsIncoming'         => ['friendshipsIncoming', [['stringify_ids' => true]], 'ids', null, false],
#			'friendshipsLookup'           => ['friendshipsLookup', [['screen_name' => implode(',', [$this->screen_name, 'Twitter'])]], 'screen_name', 'Twitter', false],
			'friendshipsOutgoing'         => ['friendshipsOutgoing', [['stringify_ids' => true]], 'ids', null, false],
#			'friendshipsShow'             => ['friendshipsShow', [['source_screen_name' => $this->screen_name, 'target_screen_name' => 'TwitterAPI']], 'relationship', null, false],
			'geoPlace'                    => ['geoPlace', ['df51dec6f4ee2b2c'], 'id', 'df51dec6f4ee2b2c', false],
			'helpConfiguration'           => ['helpConfiguration', [], 'dm_text_character_limit', 10000, false],
#			'helpPrivacy'                 => ['helpPrivacy', [], 'privacy', null, false],
#			'helpTos'                     => ['helpTos', [], 'tos', null, false],
			'homeTimeline'                => ['homeTimeline', [['exclude_replies'  => true, 'trim_user' => true, 'count' => 5, 'skip_status' => true, 'include_entities' => false,]], 'id', null, false],
			'lists'                       => ['lists', [['screen_name' => 'Twitter', 'reverse' => false]], 'id', null, false],
			'listsMembersShow'            => ['listsMembersShow', [['slug' => 'official-twitter-accounts', 'screen_name' => 'TwitterSF', 'owner_screen_name' => 'Twitter', 'include_entities' => false, 'skip_status' => true]], 'screen_name', 'TwitterSF', false],
			'listsMemberships'            => ['listsMemberships', [['screen_name' => 'Twitter', 'filter_to_owned_lists' => false]], 'lists', null, false],
			'listsOwnerships'             => ['listsOwnerships', [['screen_name' => 'Twitter']], 'lists', null, false],
			'listsShow'                   => ['listsShow', [['slug' => 'official-twitter-accounts', 'owner_screen_name' => 'Twitter']], 'name', 'Official Twitter Accounts', false],
			'listsStatuses'               => ['listsStatuses', [['slug' => 'official-twitter-accounts', 'owner_screen_name' => 'Twitter', 'trim_user' => true, 'include_rts' => false, 'include_entities' => false]], 'id', null, false],
			'mentionsTimeline'            => ['mentionsTimeline', [['trim_user' => true, 'skip_status' => true, 'include_entities' => false]], 'id', null, false],
			'mutesUsersIds'               => ['mutesUsersIds', [], 'ids', null, false],
			'rateLimitStatus'             => ['rateLimitStatus', [], 'rate_limit_context', null, false],
			'searchTweets'                => ['searchTweets', [['q' => '#freebandnames', 'result_type' => 'mixed', 'count' => 5, 'skip_status' => true, 'include_entities' => false]], 'statuses', null, false],
			'statusesLookup'              => ['statusesLookup', [['id' => '20', 'trim_user' => true, 'map' => 5, 'include_ext_alt_text' => true, 'skip_status' => true, 'include_entities' => false]], 'id', 20, false],
			'statusesRetweetersIds'       => ['statusesRetweetersIds', [['id' => '20', 'stringify_ids' => true]], 'ids', null, false],
			'statusesRetweetsOfMe'        => ['statusesRetweetsOfMe', [['trim_user' => true, 'skip_status' => true, 'include_entities' => false, 'include_user_entities' => false]], 'id', null, false],
			'trendsAvailable'             => ['trendsAvailable', [], 'name', null, false],
			'trendsClosest'               => ['trendsClosest', [['lat' => 37.781157, 'long' => -122.400612831116]], 'name', null, false],
			'trendsPlace'                 => ['trendsPlace', [['id' => 1, 'exclude' => 'hashtags']], 'trends', null, false],
			'usersLookup'                 => ['usersLookup', [['screen_name' => 'twitter', 'include_entities' => false, 'skip_status'      => true]], 'screen_name', null, false],
			'usersProfileBanner'          => ['usersProfileBanner', [['screen_name' => 'twitter']], 'sizes', null, false],
			'usersSearch'                 => ['usersSearch', [['q' => 'twitter', 'include_entities' => false, 'skip_status' => true]], 'screen_name', null, false],
			'usersShow'                   => ['usersShow', [['screen_name' => 'twitter', 'include_entities' => false, 'skip_status' => true]], 'screen_name', 'Twitter', false],
#			'usersSuggestions'            => ['usersSuggestions', [], 'slug', null, false],
#			'usersSuggestionsSlug'        => ['usersSuggestionsSlug', ['music', ['lang' => 'en']], 'users', null, false],
#			'usersSuggestionsSlugMembers' => ['usersSuggestionsSlugMembers', ['music', ['lang' => 'en']], 'id', null, false],
			'userTimeline'                => ['userTimeline', [['trim_user' => true, 'exclude_replies' => true, 'include_rts' => false, 'include_entities' => false]], 'id', null, false],
			'verifyCredentials'           => ['verifyCredentials', [['include_entities' => false, 'skip_status' => true]], 'screen_name', null, false],
		];

		ksort($endpointData);

		return $endpointData;
	}


	public function testFavorite():void{
		$this->markTestSkipped('nope');

		// fetch the latest dril tweet
		$r = $this->provider->usersShow(['screen_name' => 'dril', 'skip_status' => false, 'include_entities' => false]);
		$j = $this->responseJson($r);

		$params     = ['id' => $j->status->id_str, 'include_entities' => false];
		$favorited1 = $j->status->favorited;

		// fave it if it isn't already, otherwise unfave
		$r = $favorited1
			? $this->provider->unfavorite($params)
			: $this->provider->favorite($params);

		$favorited2 = $this->responseJson($r)->favorited;

		$this::assertSame(!$favorited1, $favorited2);

		$r = $favorited2
			? $this->provider->unfavorite($params)
			: $this->provider->favorite($params);

		$this::assertSame(!$favorited2, $this->responseJson($r)->favorited);
	}

	public function testFollow():void{
		$this->markTestSkipped('nope');

		$r         = $this->provider->usersShow(['screen_name' => 'Twitter']);
		$params    = ['screen_name' => 'Twitter'];
		$following = $this->responseJson($r)->following;

		if($following){
			$r = $this->provider->unfollow($params);
#			$this::assertFalse($this->responseJson($r)->following); // ??? twitter
		}

		$r = $this->provider->follow($params);
#		$this::assertTrue($this->responseJson($r)->following);  // ??? twitter
	}

	public function testBlocks():void{
		$this->markTestSkipped('nope');

		// nothing can go wrong here (except... gone!)
		$r = $this->provider->block(['user_id' => '402181258']);

		// make sure it's gone
		$this::assertSame(402181258, $this->responseJson($r)->id);

		// plonk!
		$r = $this->provider->blocksIds();
		$this::assertTrue(in_array(402181258, $this->responseJson($r)->ids));

		$r = $this->provider->unblock(['screen_name' => 'Twitter']);
		$this::assertSame('Twitter', $this->responseJson($r)->screen_name);
	}

	public function testUsersMute():void{
		$this->markTestSkipped('nope');

		$params = ['screen_name' => 'Twitter', 'include_entities' => false, 'skip_status' => true];
		$r = $this->provider->mute($params);
		$this::assertSame('Twitter', $this->responseJson($r)->screen_name);

		$r = $this->provider->mutesUsersList(['include_entities' => false, 'skip_status' => true]);
		$this->assertTrue(in_array('Twitter', array_column($this->responseJson($r)->users, 'screen_name')));

		$r = $this->provider->unmute($params);
		$this->assertSame('Twitter', $this->responseJson($r)->screen_name);
	}

	public function testSavedSearches():void{
		$this->markTestSkipped('nope');

		$r = $this->provider->savedSearchesCreate(['query' => '@'.$this->screen_name]);

		$id = $this->responseJson($r)->id_str;
		$this->assertRegExp('/[\d]+/', $id);

		$r = $this->provider->savedSearchesList();
		$this->assertTrue(in_array($id, array_column((array)$this->responseJson($r), 'id_str')));

		$r = $this->provider->savedSearchesShow($id);
		$this->assertSame('@'.$this->screen_name, $this->responseJson($r)->query);

		$r = $this->provider->savedSearchesDestroy($id);
		$this->assertSame($id, $this->responseJson($r)->id_str);

		$r = $this->provider->savedSearchesList();
		$this->assertFalse(in_array($id, array_column((array)$this->responseJson($r), 'id_str')));
	}

	public function testLists():void{
		$this->markTestSkipped('nope');

		$name = 'test_'.crc32(microtime(true));

		$r = $this->provider->listsCreate(['name' => $name, 'mode' => 'private', 'description' => 'test']);
		$list_id = $this->responseJson($r)->id_str;

		$r = $this->provider->listsMembersCreate(['list_id' => $list_id, 'screen_name' => 'dril']);
		$this->assertSame($list_id, $this->responseJson($r)->id_str);

		$r = $this->provider->listsMembersCreateAll(['list_id' => $list_id, 'screen_name' => 'EveryoneIsDril,parliawint']);
		$this->assertSame($list_id, $this->responseJson($r)->id_str);

		$r = $this->provider->listsMembers(['list_id' => $list_id, 'include_entities' => false, 'skip_status' => true]);
		$this->assertSame(['parliawint', 'EveryoneIsDril', 'dril'], array_column($this->responseJson($r)->users, 'screen_name'));

		$r = $this->provider->listsMembersDestroy(['list_id' => $list_id, 'screen_name' => 'parliawint']);
		$this->assertSame($list_id, $this->responseJson($r)->id_str);

		$r = $this->provider->listsMembers(['list_id' => $list_id, 'include_entities' => false, 'skip_status' => true]);
		$this->assertSame(['EveryoneIsDril', 'dril'], array_column($this->responseJson($r)->users, 'screen_name'));

		$r = $this->provider->listsMembersDestroyAll(['list_id' =>$list_id, 'screen_name' => 'EveryoneIsDril,dril']);
		$this->assertSame($list_id, $this->responseJson($r)->id_str);

		$r = $this->provider->listsMembers(['list_id' => $list_id]);
		$this->assertSame([], $this->responseJson($r)->users);

		$r = $this->provider->listsUpdate(['list_id' => $list_id, 'description' => 'testytest']);
		$this->assertSame('testytest', $this->responseJson($r)->description);

		$r = $this->provider->listsDestroy(['list_id' => $list_id]);
		$this->assertSame($list_id, $this->responseJson($r)->id_str);
	}

	public function testListSubscriptions():void{
		$this->markTestSkipped('nope');

		$r = $this->provider->listsSubscribersCreate(['owner_screen_name' => 'Twitter', 'slug' => 'moments']);
		$this->assertSame('moments', $this->responseJson($r)->slug);

		$r = $this->provider->listsSubscriptions();
		$this->assertSame('moments', $this->responseJson($r)->lists[0]->slug);

		$r = $this->provider->listsSubscribers(['owner_screen_name' => 'Twitter', 'slug' => 'moments']);
		$this->assertSame($this->screen_name, $this->responseJson($r)->users[0]->screen_name);

		$r = $this->provider->listsSubscribersShow(['owner_screen_name' => 'Twitter', 'slug' => 'moments', 'screen_name' => $this->screen_name, 'include_entities' => false, 'skip_status' => true]);
		$this->assertSame($this->screen_name, $this->responseJson($r)->screen_name);

		$r = $this->provider->listsSubscribersDestroy(['owner_screen_name' => 'Twitter', 'slug' => 'moments']);
		$this->assertSame('moments', $this->responseJson($r)->slug);
	}

	public function testCollections():void{
		$this->markTestSkipped('nope');

		$name           = 'test_'.crc32(microtime(true));
		$r = $this->provider->collectionsCreate(['name' => $name, 'description' => 'test', 'timeline_order' => 'added']);
		$timeline_id    = $this->responseJson($r)->response->timeline_id;

		$r = $this->provider->collectionsEntries(['id' => $timeline_id]);
		$this->assertSame($name, $this->responseJson($r)->objects->timelines->{$timeline_id}->name);

		$r = $this->provider->collectionsShow(['id' => $timeline_id]);
		$this->assertSame($name, $this->responseJson($r)->objects->timelines->{$timeline_id}->name);

		$r = $this->provider->collectionsEntriesCurate(json_encode(['id' => $timeline_id, 'changes' => [['op' => 'add', 'tweet_id' => '507816092'], ['op' => 'add', 'tweet_id' => '922321981']]]));
		$this->assertEmpty($this->responseJson($r)->response->errors);

		$r = $this->provider->collectionsEntriesAdd(['id' => $timeline_id, 'tweet_id' => '913288599629688832', 'above' => true]);
		$this->assertEmpty($this->responseJson($r)->response->errors);

		$r = $this->provider->collectionsEntriesMove(['id' => $timeline_id, 'tweet_id' => '507816092', 'relative_to' => '922321981', 'above' => true]);
		$this->assertEmpty($this->responseJson($r)->response->errors);

		$r = $this->provider->collectionsEntriesRemove(['id' => $timeline_id, 'tweet_id' => '507816092']);
		$this->assertEmpty($this->responseJson($r)->response->errors);

		$r = $this->provider->collectionsUpdate(['id' => $timeline_id, 'name' => $name, 'description' => 'testytest']);
		$this->assertSame('testytest', $this->responseJson($r)->objects->timelines->{$timeline_id}->description);

		$r = $this->provider->collectionsDestroy(['id' => $timeline_id]);
		$this->assertTrue($this->responseJson($r)->destroyed);

		// any leftovers?
		$r = $this->provider->collectionsList(['screen_name' => $this->screen_name]);
		$j = $this->responseJson($r);

		if(isset($j->response->results) && is_array($j->response->results)){
			$timelines = array_column($j->response->results, 'timeline_id');

			if(is_array($timelines) && !empty($timelines)){

				foreach($timelines as $tl){
					$rr = $this->provider->collectionsDestroy(['id' => $tl]);
					$this->assertTrue($this->responseJson($rr)->destroyed);
				}

			}
		}

	}

}
