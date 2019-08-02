<?php
/**
 * Class SpotifyAPITest
 *
 * @filesource   SpotifyAPITest.php
 * @created      06.04.2018
 * @package      chillerlan\OAuthTest\Providers\Spotify
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Spotify;

use chillerlan\OAuth\Providers\Spotify\Spotify;
use chillerlan\OAuthTest\Providers\OAuth2APITest;

/**
 * Spotify API usage tests/examples
 *
 * @link https://developer.spotify.com/web-api/endpoint-reference/
 *
 * @property \chillerlan\OAuth\Providers\Spotify\Spotify $provider
 */
class SpotifyAPITest extends OAuth2APITest{

	protected $FQN = Spotify::class;
	protected $ENV = 'SPOTIFY';

	public function testAlbum(){
		$r = $this->provider->album('4KJaUvkYQ93TH4MxnJfpPh', ['market' => 'de']);
		$this->assertSame('The Dirt of Luck', $this->responseJson($r)->name);
	}

	public function testAlbumTracks(){
		$r = $this->provider->albumTracks('4KJaUvkYQ93TH4MxnJfpPh', ['market' => 'de']);
		$this->assertCount(12, $this->responseJson($r)->items);
	}

	public function testAlbums(){
		$r = $this->provider->albums(['ids' => '4KJaUvkYQ93TH4MxnJfpPh,3TVrfbEBIQTimq6UtUe3vv,5ZcpjhmeKnRTsVyGKtHGP0', 'market' => 'de']);
		$this->assertSame(['The Dirt of Luck', 'Pirate Prude', 'The Magic City'], array_column($this->responseJson($r)->albums, 'name'));
	}

	public function testArtistAlbums(){
		$r = $this->provider->artistAlbums('7mefbdlQXxJVKgEbfAeKjL', ['album_type' => 'album', 'market' => 'de']);
		$this->assertSame(['3It5ZloS0KnWomY5Jv4Isu','5ZcpjhmeKnRTsVyGKtHGP0','4KJaUvkYQ93TH4MxnJfpPh','3TVrfbEBIQTimq6UtUe3vv'], array_column($this->responseJson($r)->items, 'id'));
	}

	public function testArtistRelatedArtists(){
		$r = $this->provider->artistRelatedArtists('7mefbdlQXxJVKgEbfAeKjL');
		$this->assertContains('Mary Timony', array_column($this->responseJson($r)->artists, 'name'));
	}

	public function testArtistToptracks(){
		$r = $this->provider->artistTopTracks('7mefbdlQXxJVKgEbfAeKjL', ['country' => 'de']);
		$this->assertSame('Helium', $this->responseJson($r)->tracks[0]->artists[0]->name);
	}

	public function testArtists(){
		$ids      = ['7mefbdlQXxJVKgEbfAeKjL', '1FFaHFtnhdnHuY0xGZcnD1', '4wLIbcoqmqI4WZHDiBxeCB','4G3PykZuN4ts87LgYKI9Zu'];
		$expected = ['Helium', 'Mary Timony', 'Sleater-Kinney', 'WILD FLAG'];

		$r = $this->responseJson($this->provider->artists(['ids' => implode(',', $ids)]));

		if(isset($r->artists)){
			foreach($r->artists as $k => $artist){
				$this->assertSame($expected[$k], $artist->name);
			}
		}

	}

	public function testAudioAnalysis(){
		$r = $this->provider->audioAnalysis('10ghIZM3y03CSwjTu1mVin');
		$this->assertSame(7271502, $this->responseJson($r)->track->num_samples);
	}

	public function testAudioFeatures(){
		$r = $this->provider->audioFeatures('10ghIZM3y03CSwjTu1mVin');
		$this->assertSame(329773, $this->responseJson($r)->duration_ms);
	}

	public function testAudioFeaturesAll(){
		$r = $this->provider->audioFeaturesAll(['ids' => '4wKwANW5UUn5K9WJJWIllV,10ghIZM3y03CSwjTu1mVin']);
		$this->assertSame([190627, 329773], array_column($this->responseJson($r)->audio_features, 'duration_ms'));
	}

	public function testCategories(){
		$r = $this->provider->categories();
		$this->assertSame('https://api.spotify.com/v1/browse/categories?offset=0&limit=20', $this->responseJson($r)->categories->href);
	}

	public function testCategory(){
		$r = $this->provider->category('toplists',  ['locale' => 'de']);
		$this->assertSame('Top-Listen', $this->responseJson($r)->name);
	}

	public function testCategoryPlaylists(){
		$r = $this->responseJson($this->provider->categoryPlaylists('toplists'));
		$this->assertTrue(isset($r->playlists));
	}

	public function testFeaturedPlaylists(){
		$r = $this->responseJson($this->provider->featuredPlaylists(['country' => 'DE', 'locale' => 'de']));
		$this->assertTrue(isset($r->playlists));
	}

	public function testMe(){
		$r = $this->provider->me();
		$this->assertSame($this->testuser, $this->responseJson($r)->id);
	}

	public function testMePlaylists(){
		$r = $this->provider->mePlaylists(['limit' => 10]);
		$this->assertCount(10, $this->responseJson($r)->items);
	}

	public function testMeTop(){
		$r = $this->provider->meTop('artists', ['limit' => 10]);
		$this->assertCount(10, $this->responseJson($r)->items);
	}

	public function testNewReleases(){
		$r = $this->provider->newReleases(['country' => 'DE', 'locale' => 'de']);
		$this->assertSame('https://api.spotify.com/v1/browse/new-releases?country=DE&locale=de&offset=0&limit=20', $this->responseJson($r)->albums->href);
	}

	public function testRecentlyPlayed(){
		$r = $this->provider->recentlyPlayed();
		$this->assertSame('https://api.spotify.com/v1/me/player/recently-played', $this->responseJson($r)->href);
	}

	public function testRecommendations(){
		$r = $this->provider->recommendations(['seed_artists' => '4wLIbcoqmqI4WZHDiBxeCB']);
		$this->assertSame('4wLIbcoqmqI4WZHDiBxeCB', $this->responseJson($r)->seeds[0]->id);
	}

	public function searchDataProvider():array {
		return  [
			[['q' => 'sleater-kinney', 'type' => 'artist'], 'artists', '4wLIbcoqmqI4WZHDiBxeCB'],
			[['q' => 'wild flag', 'type' => 'artist'], 'artists', '4G3PykZuN4ts87LgYKI9Zu'],
			[['q' => 'album:the woods artist:sleater-kinney', 'type' => 'album'], 'albums', '0U6Z6EVDwVMqwmr2zEcH4L'],
			[['q' => 'track:one beat artist:sleater-kinney', 'type' => 'track'], 'tracks', '3IAFRGBtVWIDGlHL9jIEXe'],
		];
	}

	/**
	 * @dataProvider searchDataProvider
	 *
	 * @param array  $params
	 * @param string $field
	 * @param string $expected
	 */
	public function testSearch(array $params, string $field, string $expected){
		$r = $this->provider->search($params);
		$this->assertSame($expected, $this->responseJson($r)->{$field}->items[0]->id);
	}

	public function testTrack(){
		$r = $this->provider->track('4wKwANW5UUn5K9WJJWIllV', ['market' => 'de']);
		$this->assertSame('Medusa', $this->responseJson($r)->name);
	}

	public function testTracks(){
		$r = $this->provider->tracks(['ids' => '4wKwANW5UUn5K9WJJWIllV,10ghIZM3y03CSwjTu1mVin', 'market' => 'de']);
		$this->assertSame(['Medusa', 'Oh The Wind And Rain'], array_column($this->responseJson($r)->tracks, 'name'));
	}

	public function testUser(){
		$r = $this->provider->user('spotify');
		$this->assertSame('spotify', $this->responseJson($r)->id);
	}

	public function testUserPlaylists(){
		$r = $this->provider->userPlaylists($this->testuser, ['limit' => 10]);
		$this->assertSame('https://api.spotify.com/v1/users/'.$this->testuser.'/playlists?offset=0&limit=10', $this->responseJson($r)->href);
	}

	/**
	 * follow
	 * followPlaylist
	 * meFollowing
	 * meFollowingContains
	 * unfollow
	 * unfollowPlaylist
	 * userPlaylistFollowersContains
	 */
	public function testFollow(){
		// unfollow
		$r = $this->provider->unfollow(['type' => 'user'], ['ids' => ['spotify']]);
		$this->assertSame(204, $r->getStatusCode());

		// verify unfollow
		$r = $this->provider->meFollowingContains(['type' => 'user', 'ids' => 'spotify']);
		$this->assertFalse($this->responseJson($r)[0]);

		// follow again
		// @todo: OAuthProvider::__call()
		$r = $this->provider->follow(['type' => 'user'], ['ids' => ['spotify']]);
		$this->assertSame(204, $r->getStatusCode());

		// check if we follow spotify again
		$r = $this->provider->meFollowingContains(['type' => 'user', 'ids' => 'spotify']);
		$this->assertTrue($this->responseJson($r)[0]);

		// do we follow the demogorgon playlist?
		$r = $this->provider->userPlaylistFollowersContains('spotify', '37i9dQZF1DX9Oqi0gBNbHz', ['ids' => $this->testuser]);
		$this->assertFalse($this->responseJson($r)[0]);

		// follow...
		$r = $this->provider->followPlaylist('spotify', '37i9dQZF1DX9Oqi0gBNbHz', ['public' => false]);
		$this->assertSame(200, $r->getStatusCode());

		// ...
		$r = $this->provider->userPlaylistFollowersContains('spotify', '37i9dQZF1DX9Oqi0gBNbHz', ['ids' => $this->testuser]);
		$this->assertTrue($this->responseJson($r)[0]);

		// unfollow
		$r = $this->provider->unfollowPlaylist('spotify', '37i9dQZF1DX9Oqi0gBNbHz');
		$this->assertSame(200, $r->getStatusCode());

		// finally...!
		$r = $this->provider->userPlaylistFollowersContains('spotify', '37i9dQZF1DX9Oqi0gBNbHz', ['ids' => $this->testuser]);
		$this->assertFalse($this->responseJson($r)[0]);

		// yes, we do follow some artists...
		$r = $this->provider->meFollowing(['type' => 'artist', 'limit' => 10]);
		$this->assertCount(10, $this->responseJson($r)->artists->items);
	}

	/**
	 * meSavedAlbums
	 * meSavedAlbumsContains
	 * saveAlbums
	 * removeSavedAlbums
	 */
	public function testSavedAlbums(){
		// get a random album
		$r = $this->provider->meSavedAlbums(['limit' => 1]);
		$album_id = $this->responseJson($r)->items[0]->album->id;

		$r = $this->provider->removeSavedAlbums(['ids' => [$album_id]]);
		$this->assertSame(200, $r->getStatusCode());

		// it's gone!
		$r = $this->provider->meSavedAlbumsContains(['ids' => $album_id]);
		$this->assertFalse($this->responseJson($r)[0]);

		// re-add
		$r = $this->provider->saveAlbums(['ids' => [$album_id]]);
		$this->assertSame(200, $r->getStatusCode());

		// verify
		$r = $this->provider->meSavedAlbumsContains(['ids' => $album_id]);
		$this->assertTrue($this->responseJson($r)[0]);
	}

	/**
	 * meSavedTracks
	 * meSavedTracksContains
	 * saveTracks
	 * removeSavedTracks
	 */
	public function testSavedTracks(){
		$r = $this->provider->meSavedTracks(['limit' => 1]);
		$track_id = $this->responseJson($r)->items[0]->track->id;

		$r = $this->provider->removeSavedTracks(['ids' => [$track_id]]);
		$this->assertSame(200, $r->getStatusCode());

		$r = $this->provider->meSavedTracksContains(['ids' => $track_id]);
		$this->assertFalse($this->responseJson($r)[0]);

		$r = $this->provider->saveTracks(['ids' => [$track_id]]);
		$this->assertSame(200, $r->getStatusCode());

		$r = $this->provider->meSavedTracksContains(['ids' => $track_id]);
		$this->assertTrue($this->responseJson($r)[0]);
	}

	/**
	 * playlistCreate
	 * playlistUpdateDetails
	 * playlistAddTracks
	 * playlistReorderTracks
	 * playlistRemoveTracks
	 * playlistReplaceTracks
	 * userPlaylist
	 * userPlaylistTracks
	 */
	public function testPlaylistCreate(){
		// create
		$name        = 'test_'.md5(microtime(true));
		$body        = ['name' => $name, 'description' => 'test', 'public' => false, 'collaborative' => false];
		$r           = $this->responseJson($this->provider->playlistCreate($this->testuser, $body));
		$playlist_id = $r->id;
		$this->assertSame($name, $r->name);

		// update details
		$body = ['name' => 'testy'.$name, 'description' => 'testytest', 'public' => false, 'collaborative' => false];
		$r = $this->provider->playlistUpdateDetails($this->testuser, $playlist_id, $body);
		$this->assertSame(200, $r->getStatusCode());

		// add tracks
		$body        = ['uris' => ['spotify:track:0vYPwZx9gTU21BE6mEyWWk', 'spotify:track:7ykpEr7bxSlD6N8pf8boSv']];
		$r           = $this->provider->playlistAddTracks($this->testuser, $playlist_id, $body);
		$snapshot_id = $this->responseJson($r)->snapshot_id;
		$this->assertSame(201, $r->getStatusCode());

		// verify added tracks
		$r = $this->responseJson($this->provider->userPlaylist($this->testuser, $playlist_id));
		$this->assertSame('0vYPwZx9gTU21BE6mEyWWk', $r->tracks->items[0]->track->id);
		$this->assertSame('7ykpEr7bxSlD6N8pf8boSv', $r->tracks->items[1]->track->id);

		// reorder tracks
		$body        = ['range_start' => 1, 'range_length' => 1, 'insert_before' => 0, 'snapshot_id' => $snapshot_id];
		$r           = $this->provider->playlistReorderTracks($this->testuser, $playlist_id, $body);
		$snapshot_id = $this->responseJson($r)->snapshot_id;
		$this->assertSame(200, $r->getStatusCode());

		// verify reorder
		$r = $this->responseJson($this->provider->userPlaylistTracks($this->testuser, $playlist_id));
		$this->assertSame('7ykpEr7bxSlD6N8pf8boSv', $r->items[0]->track->id);
		$this->assertSame('0vYPwZx9gTU21BE6mEyWWk', $r->items[1]->track->id);

		// remove tracks
#		$body           = ['tracks' => [['uri' => 'spotify:track:7ykpEr7bxSlD6N8pf8boSv'],]];
		$body           = ['positions' => [0], 'snapshot_id' => $snapshot_id];
		$r = $this->provider->playlistRemoveTracks($this->testuser, $playlist_id, $body);
		$this->assertSame(200, $r->getStatusCode());

		// verify remove
		$r = $this->provider->userPlaylistTracks($this->testuser, $playlist_id);
		$this->assertSame('0vYPwZx9gTU21BE6mEyWWk', $this->responseJson($r)->items[0]->track->id);

		// replace/empty playlist
		$body = ['uris' => ['spotify:track:5cPNaz7OjAdz1AcjVI9uz5']];
		$r = $this->provider->playlistReplaceTracks($this->testuser, $playlist_id, $body);
		$this->assertSame(201, $r->getStatusCode());

		// verify replace
		$r = $this->provider->userPlaylistTracks($this->testuser, $playlist_id);
		$this->assertSame('5cPNaz7OjAdz1AcjVI9uz5', $this->responseJson($r)->items[0]->track->id);
	}

	/**
	 * devices
	 * next
	 * nowPlaying
	 * pause
	 * play
	 * previous
	 * repeat*
	 * seek*
	 * shuffle*
	 * transfer
	 * volume*
	 */
	public function testDevices(){
		$active_device   = null;
		$inactive_device = null;
		$r = $this->provider->devices();

		// look for devices
		foreach($this->responseJson($r)->devices as $device){

			if($device->is_active){
				$active_device = $device->id;
			}
			else{
				$inactive_device = $device->id;
			}
		}

		if($active_device){
			// start playback
#			$body = ['uris' => ['spotify:track:1BYqosPcKynuuSLZe2Wp7G', 'spotify:track:5AJfahYQ4mbhVMhYFznHVR'], 'offset' => ['uri' => 'spotify:track:5AJfahYQ4mbhVMhYFznHVR']];
#			$body = ['context_uri' => 'spotify:user:chillerlan:playlist:3DOua8fOWNgcfj3aNGxnLv', 'offset' => ['position' => 7]];
			$body = ['context_uri' => 'spotify:album:5AaJfXlHtrlfQh8KfXiIZh', 'offset' => ['position' => 2]];
			$r = $this->provider->play(['device_id' => $active_device], $body);
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// skip
			$r = $this->provider->next();
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// previous
			$r = $this->provider->previous();
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// seek
			// @todo: OAuthProvider::__call()
			$r = $this->provider->seek(['position_ms' => 25000]);
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// switch device
			if($inactive_device){
				$body           = ['device_ids' => [$inactive_device], 'play' => true];
				$r = $this->provider->transfer($body);
				$this->assertSame(204, $r->getStatusCode());
				usleep(3000000);

				$body           = ['device_ids' => [$active_device], 'play' => true];
				$r = $this->provider->transfer($body);
				$this->assertSame(204, $r->getStatusCode());
				usleep(3000000);
			}

			// volume
			// @todo: OAuthProvider::__call()
			$r = $this->provider->volume(['volume_percent' => 25]);
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// pause
			$r = $this->provider->pause();
			$this->assertSame(204, $r->getStatusCode());
		}

	}

}
