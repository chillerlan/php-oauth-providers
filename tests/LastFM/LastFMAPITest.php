<?php
/**
 * Class LastFMAPITest
 *
 * @filesource   LastFMAPITest.php
 * @created      10.07.2017
 * @package      chillerlan\OAuthTest\Providers\LastFM
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\LastFM;

use chillerlan\OAuth\Providers\LastFM\LastFM;
use chillerlan\OAuthTest\API\APITestAbstract;

/**
 * last.fm API test & examples
 *
 * @link https://www.last.fm/api/intro
 *
 * @property \chillerlan\OAuth\Providers\LastFM\LastFM $provider
 */
class LastFMAPITest extends APITestAbstract{

	protected $CFG = __DIR__.'/../../config';
	protected $FQN = LastFM::class;
	protected $ENV = 'LASTFM';

	protected $testuser;

	protected function setUp():void{
		parent::setUp();

		$token = $this->storage->getAccessToken($this->provider->serviceName);

		$this->testuser = $token->extraParams['session']['name'];
	}

	/**
	 * @dataProvider tagDataProvider
	 *
	 * @param string $method
	 * @param array  $params
	 */
	public function testTagging(string $method, array $params){
		/** @var \Psr\Http\Message\ResponseInterface $r */
		$r = $this->provider->{$method}($params);
		$this->assertSame(200, $r->getStatusCode());
	}

	public function tagDataProvider(){
		return [
			'trackAddTags'    => ['trackAddTags', ['artist' => 'St. Vincent', 'track' => 'Pills', 'tags' => 'test']],
			'trackRemoveTag'  => ['trackRemoveTag', ['artist' => 'St. Vincent', 'track' => 'Pills', 'tag' => 'test']],
			'artistAddTags'   => ['artistAddTags', ['mbid' => '5334edc0-5faf-4ca5-b1df-000de3e1f752', 'tags' => 'test']],
			'artistRemoveTag' => ['artistRemoveTag', ['mbid' => '5334edc0-5faf-4ca5-b1df-000de3e1f752', 'tag' => 'test']],
			'albumAddTags'    => ['albumAddTags', ['artist' => 'St. Vincent', 'album' => 'Masseduction', 'tags' => 'test']],
			'albumRemoveTag'  => ['albumRemoveTag', ['artist' => 'St. Vincent', 'album' => 'Masseduction', 'tag' => 'test']],
			'trackUnlove'     => ['trackUnlove', ['artist' => 'St. Vincent', 'track' => 'Pills']],
			'trackLove'       => ['trackLove', ['artist' => 'St. Vincent', 'track' => 'Pills']],
		];
	}

	/**
	 * @dataProvider getMethodDataProvider
	 *
	 * @param string $method
	 * @param string $return
	 * @param array  $params
	*/
	public function testGetMethods(string $method, string $return, array $params){

		if(isset($params['user']) && $params['user'] === '{TESTUSER}'){
			$params['user'] = $this->testuser;
		}

		$r = $this->provider->{$method}($params);

		$this->assertTrue(property_exists($this->responseJson($r), $return));
	}


	public function getMethodDataProvider(){
		return [
			'albumGetInfo' => ['albumGetInfo', 'album', [
				'mbid'        => null, // ???
				'album'       => 'the magic city',
				'artist'      => 'helium',
				'username'    => null,
				'lang'        => null,
				'autocorrect' => true,
			]],
			'albumGetTags' => ['albumGetTags', 'tags', [
				'mbid'        => null, // ???
				'album'       => 'the magic city',
				'artist'      => 'helium',
				'user'        => null,
				'autocorrect' => true,
			]],
			'albumGetTopTags' => ['albumGetTopTags', 'toptags', [
				'mbid'        => null, // ???
				'album'       => 'the magic city',
				'artist'      => 'helium',
				'autocorrect' => true,
			]],
			'albumSearch' => ['albumSearch', 'results', [
				'album'  => 'the magic city',
				'limit'  => null,
				'page'   => null,
			]],
			'artistGetCorrection' => ['artistGetCorrection', 'corrections', [
				'artist'  => 'sleater kinney',
			]],
			'artistGetInfo' => ['artistGetInfo', 'artist', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'username'  => null,
				'lang'  => 'en',
				'autocorrect'  => true,
			]],
			'artistGetSimilar' => ['artistGetSimilar', 'similarartists', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'limit'  => 5,
				'autocorrect'  => true,
			]],
			'artistGetTags' => ['artistGetTags', 'tags', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'user'  => null,
				'autocorrect'  => true,
			]],
			'artistGetTopAlbums' => ['artistGetTopAlbums', 'topalbums', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'autocorrect'  => true,
				'page'  => null,
				'limit'  => null,
			]],
			'artistGetTopTags' => ['artistGetTopTags', 'toptags', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'autocorrect'  => true,
			]],
			'artistGetTopTracks' => ['artistGetTopTracks', 'toptracks', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'autocorrect'  => true,
				'page'  => null,
				'limit'  => null,
			]],
			'artistSearch' => ['artistSearch', 'results', [
				'artist'  => 'sleater kinney',
				'page'  => null,
				'limit'  => null,
			]],
			'chartGetTopArtists' => ['chartGetTopArtists', 'artists', [
				'page'  => null,
				'limit'  => 10,
			]],
			'chartGetTopTags' => ['chartGetTopTags', 'tags', [
				'page'  => null,
				'limit'  => 10,
			]],
			'chartGetTopTracks' => ['chartGetTopTracks', 'tracks', [
				'page'  => null,
				'limit'  => 10,
			]],
			'geoGetTopArtists' => ['geoGetTopArtists', 'topartists', [
				'country'  => 'germany',
				'location'  => 'berlin',
				'page'  => null,
				'limit'  => 10,
			]],
			'geoGetTopTracks' => ['geoGetTopTracks', 'tracks', [
				'country'  => 'germany',
				'location'  => 'berlin',
				'page'  => null,
				'limit'  => 10,
			]],
			'libraryGetArtists' => ['libraryGetArtists', 'artists', [
				'user'  => '{TESTUSER}',
				'page'  => null,
				'limit'  => 10,
			]],
			'tagGetInfo' => ['tagGetInfo', 'tag', [
				'tag'  => 'Disco',
				'lang'  => 'en',
			]],
			'tagGetSimilar' => ['tagGetSimilar', 'similartags', [
				'tag'  => 'Disco',
			]],
			'tagGetTopAlbums' => ['tagGetTopAlbums', 'albums', [
				'tag'  => 'Disco',
				'limit'  => 5,
				'page'  => null,
			]],
			'tagGetTopArtists' => ['tagGetTopArtists', 'topartists', [
				'tag'  => 'Disco',
				'limit'  => 5,
				'page'  => null,
			]],
			'tagGetTopTags' => ['tagGetTopTags', 'toptags', []],
			'tagGetTopTracks' => ['tagGetTopTracks', 'tracks', [
				'tag'  => 'Disco',
				'limit'  => 5,
				'page'  => null,
			]],
			'tagGetWeeklyChartList' => ['tagGetWeeklyChartList', 'weeklychartlist', [
				'tag'  => 'Disco',
			]],
			'trackGetCorrection' => ['trackGetCorrection', 'corrections', [
				'artist'  => 'sleater kinney',
				'track'  => 'oh',
			]],
			'trackGetInfo' => ['trackGetInfo', 'track', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'track'  => 'oh',
				'username'  => null,
				'autocorrect'  => true,
			]],
			'trackGetSimilar' => ['trackGetSimilar', 'similartracks', [
				'mbid'  => '9ef0e5a6-fd45-462e-83c0-f59b8c2d102f',
				'artist'  => null,
				'track'  => null,
				'limit'  => null,
				'autocorrect'  => true,
			]],
			'trackGetTags' => ['trackGetTags', 'tags', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'track'  => 'jumpers',
				'user'  => null,
				'autocorrect'  => true,
			]],
			'trackGetTopTags' => ['trackGetTopTags', 'toptags', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'track'  => 'jumpers',
				'autocorrect'  => true,
			]],
			'trackSearch' => ['trackSearch', 'results', [
				'artist'  => 'sleater kinney',
				'track'  => 'jumpers',
				'page'  => null,
				'limit'  => 10,
			]],
			'trackUpdateNowPlaying' => ['trackUpdateNowPlaying', 'nowplaying', [
				'mbid'  => null,
				'artist'  => 'sleater kinney',
				'track'  => 'jumpers',
				'album'  => 'the woods',
				'trackNumber'  => null,
				'context'  => null,
				'duration'  => null,
				'albumArtist'  => null,
			]],
			'userGetArtistTracks' => ['userGetArtistTracks', 'artisttracks', [
				'user'  => '{TESTUSER}',
				'artist'  => 'Helium',
				'limit'  => 5,
				'page'  => null,
				'startTimestamp'  => null,
				'endTimestamp'  => null,
			]],
			'userGetFriends' => ['userGetFriends', 'friends', [
				'user'  => '{TESTUSER}',
				'limit'  => 5,
				'page'  => null,
				'recenttracks'  => true,
			]],
			'userGetInfo' => ['userGetInfo', 'user', [
				'user'  => '{TESTUSER}',
			]],
			'userGetLovedTracks' => ['userGetLovedTracks', 'lovedtracks', [
				'user'  => '{TESTUSER}',
				'limit'  => 5,
				'page'  => null,
			]],
			'userGetPersonalTags' => ['userGetPersonalTags', 'taggings', [
				'user'  => '{TESTUSER}',
				'limit'  => 5,
				'page'  => null,
				'tag'  => '<3',
				'taggingtype'  => 'album',
			]],
			'userGetRecentTracks' => ['userGetRecentTracks', 'recenttracks', [
				'user'  => '{TESTUSER}',
				'limit'  => 5,
				'page'  => null,
				'from'  => null,
				'to'  => null,
				'extended'  => true,
			]],
			'userGetTopAlbums' => ['userGetTopAlbums', 'topalbums', [
				'user'  => '{TESTUSER}',
				'limit'  => 5,
				'page'  => null,
				'period'  => LastFM::PERIOD_7DAY,
			]],
			'userGetTopArtists' => ['userGetTopArtists', 'topartists', [
				'user'  => '{TESTUSER}',
				'limit'  => 5,
				'page'  => null,
				'period'  => LastFM::PERIOD_7DAY,
			]],
			'userGetTopTags' => ['userGetTopTags', 'toptags', [
				'user'  => '{TESTUSER}',
				'limit'  => 5,
				'page'  => null,
			]],
			'userGetWeeklyAlbumChart' => ['userGetWeeklyAlbumChart', 'weeklyalbumchart', [
				'user'  => '{TESTUSER}',
				'from'  => null,
				'to'  => null,
			]],
			'userGetWeeklyArtistChart' => ['userGetWeeklyArtistChart', 'weeklyartistchart', [
				'user'  => '{TESTUSER}',
				'from'  => null,
				'to'  => null,
			]],
			'userGetWeeklyTrackChart' => ['userGetWeeklyTrackChart', 'weeklytrackchart', [
				'user'  => '{TESTUSER}',
				'from'  => null,
				'to'  => null,
			]],
		];
	}

}
