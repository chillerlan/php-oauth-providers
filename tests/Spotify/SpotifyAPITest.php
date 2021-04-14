<?php
/**
 * Class SpotifyAPITest
 *
 * @created      06.04.2018
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2018 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\Spotify;

use chillerlan\OAuth\Providers\Spotify\Spotify;
use chillerlan\OAuthTest\Providers\OAuth2APITestAbstract;

/**
 * Spotify API usage tests/examples
 *
 * Please note that Spotify ids may change and so these test may fail at times
 *
 * @link https://developer.spotify.com/web-api/endpoint-reference/
 *
 * @property \chillerlan\OAuth\Providers\Spotify\Spotify $provider
 */
class SpotifyAPITest extends OAuth2APITestAbstract{

	protected string $FQN = Spotify::class;
	protected string $ENV = 'SPOTIFY';

	public function testAlbum():void{
		$r = $this->provider->albumsId('4KJaUvkYQ93TH4MxnJfpPh', ['market' => 'de']);
		$this::assertSame('The Dirt of Luck', $this->responseJson($r)->name);
	}

	public function testAlbumTracks():void{
		$r = $this->provider->albumsIdTracks('4KJaUvkYQ93TH4MxnJfpPh', ['market' => 'de']);
		$this::assertCount(12, $this->responseJson($r)->items);
	}

	public function testAlbums():void{
		$r = $this->provider->albums(['ids' => '4KJaUvkYQ93TH4MxnJfpPh,3TVrfbEBIQTimq6UtUe3vv,5ZcpjhmeKnRTsVyGKtHGP0', 'market' => 'de']);
		$this::assertSame(['The Dirt of Luck', 'Pirate Prude', 'The Magic City'], array_column($this->responseJson($r)->albums, 'name'));
	}

	public function testArtistAlbums():void{
		$r = $this->provider->artistsIdAlbums('7mefbdlQXxJVKgEbfAeKjL', ['include_groups' => 'album', 'market' => 'de']);
		$this::assertContains('4RizHxeSDd1mN27Yepfk2q', array_column($this->responseJson($r)->items, 'id'));
	}

	public function testArtistRelatedArtists():void{
		$r = $this->provider->artistsIdRelatedArtists('7mefbdlQXxJVKgEbfAeKjL');
		$this::assertContains('Mary Timony', array_column($this->responseJson($r)->artists, 'name'));
	}

	public function testArtistToptracks():void{
		$r = $this->provider->artistsIdTopTracks('7mefbdlQXxJVKgEbfAeKjL', ['market' => 'de']);
		$this::assertSame('Helium', $this->responseJson($r)->tracks[0]->artists[0]->name);
	}

	public function testArtists():void{
		$ids      = ['7mefbdlQXxJVKgEbfAeKjL', '1FFaHFtnhdnHuY0xGZcnD1', '4wLIbcoqmqI4WZHDiBxeCB','4G3PykZuN4ts87LgYKI9Zu'];
		$expected = ['Helium', 'Mary Timony', 'Sleater-Kinney', 'WILD FLAG'];

		$r = $this->responseJson($this->provider->artists(['ids' => implode(',', $ids)]));

		if(isset($r->artists)){
			foreach($r->artists as $k => $artist){
				$this::assertSame($expected[$k], $artist->name);
			}
		}

	}

	public function testAudioAnalysis():void{
		$r = $this->provider->audioAnalysisId('10ghIZM3y03CSwjTu1mVin');
		$this::assertSame(7271502, $this->responseJson($r)->track->num_samples);
	}

	public function testAudioFeatures():void{
		$r = $this->provider->audioFeaturesId('10ghIZM3y03CSwjTu1mVin');
		$this::assertSame(329773, $this->responseJson($r)->duration_ms);
	}

	public function testAudioFeaturesAll():void{
		$r = $this->provider->audioFeatures(['ids' => '4wKwANW5UUn5K9WJJWIllV,10ghIZM3y03CSwjTu1mVin']);
		$this::assertSame([190627, 329773], array_column($this->responseJson($r)->audio_features, 'duration_ms'));
	}

	public function testCategories():void{
		$r = $this->provider->browseCategories();
		$this::assertSame('https://api.spotify.com/v1/browse/categories?offset=0&limit=20', $this->responseJson($r)->categories->href);
	}

	public function testCategory():void{
		$r = $this->provider->browseCategoriesCategoryId('toplists',  ['locale' => 'de']);
		$this::assertSame('Top-Listen', $this->responseJson($r)->name);
	}

	public function testCategoryPlaylists():void{
		$r = $this->responseJson($this->provider->browseCategoriesCategoryIdPlaylists('toplists'));
		$this::assertTrue(isset($r->playlists));
	}

	public function testFeaturedPlaylists():void{
		$r = $this->responseJson($this->provider->browseFeaturedPlaylists(['country' => 'DE', 'locale' => 'de']));
		$this::assertTrue(isset($r->playlists));
	}

	public function testMe():void{
		$r = $this->provider->me();
		$this::assertSame($this->testuser, $this->responseJson($r)->id);
	}

	public function testMePlaylists():void{
		$r = $this->provider->mePlaylists(['limit' => 10]);
		$this::assertCount(10, $this->responseJson($r)->items);
	}

	public function testMeTop():void{
		$r = $this->provider->meTopType('artists', ['limit' => 10]);
		$this::assertCount(10, $this->responseJson($r)->items);
	}

	public function testNewReleases():void{
		$r = $this->provider->browseNewReleases(['country' => 'DE']);
		$this::assertSame('https://api.spotify.com/v1/browse/new-releases?country=DE&offset=0&limit=20', $this->responseJson($r)->albums->href);
	}

	public function testRecentlyPlayed():void{
		$r = $this->provider->mePlayerRecentlyPlayed();
		$this::assertSame('https://api.spotify.com/v1/me/player/recently-played', $this->responseJson($r)->href);
	}

	public function testRecommendations():void{
		$r = $this->provider->recommendations(['seed_artists' => '4wLIbcoqmqI4WZHDiBxeCB']);
		$this::assertSame('4wLIbcoqmqI4WZHDiBxeCB', $this->responseJson($r)->seeds[0]->id);
	}

	public function searchDataProvider():array{
		return  [
			[['q' => 'sleater-kinney', 'type' => 'artist'], 'artists', '4wLIbcoqmqI4WZHDiBxeCB'],
			[['q' => 'wild flag', 'type' => 'artist'], 'artists', '4G3PykZuN4ts87LgYKI9Zu'],
			[['q' => 'album:the woods artist:sleater-kinney', 'type' => 'album'], 'albums', '73ctstwnbNifu5U902X2zL'],
			[['q' => 'track:one beat artist:sleater-kinney', 'type' => 'track'], 'tracks', '5AsqwkDeT5lnbVDioY6Ool'],
		];
	}

	/**
	 * @dataProvider searchDataProvider
	 *
	 * @param array  $params
	 * @param string $field
	 * @param string $expected
	 */
	public function testSearch(array $params, string $field, string $expected):void{
		$r = $this->provider->search($params);
		$this::assertSame($expected, $this->responseJson($r)->{$field}->items[0]->id);
	}

	public function testTrack():void{
		$r = $this->provider->tracksId('4wKwANW5UUn5K9WJJWIllV', ['market' => 'de']);
		$this::assertSame('Medusa', $this->responseJson($r)->name);
	}

	public function testTracks():void{
		$r = $this->provider->tracks(['ids' => '4wKwANW5UUn5K9WJJWIllV,10ghIZM3y03CSwjTu1mVin', 'market' => 'de']);
		$this::assertSame(['Medusa', 'Oh The Wind And Rain'], array_column($this->responseJson($r)->tracks, 'name'));
	}

	public function testUser():void{
		$r = $this->provider->usersUserId('spotify');
		$this::assertSame('spotify', $this->responseJson($r)->id);
	}

	public function testUserPlaylists():void{
		$r = $this->provider->usersUserIdPlaylists($this->testuser, ['limit' => 10]);
		$this::assertSame('https://api.spotify.com/v1/users/'.$this->testuser.'/playlists?offset=0&limit=10', $this->responseJson($r)->href);
	}

	public function testFollow():void{
		// unfollow
		$r = $this->provider->meUnfollow(['type' => 'user'], ['ids' => ['spotify']]);
		$this::assertSame(204, $r->getStatusCode());

		// verify unfollow
		$r = $this->provider->meFollowingContains(['type' => 'user', 'ids' => 'spotify']);
		$this::assertFalse($this->responseJson($r)[0]);

		// follow again
		$r = $this->provider->meFollow(['type' => 'user'], ['ids' => ['spotify']]);
		$this::assertSame(204, $r->getStatusCode());

		// check if we follow spotify again
		$r = $this->provider->meFollowingContains(['type' => 'user', 'ids' => 'spotify']);
		$this::assertTrue($this->responseJson($r)[0]);

		// do we follow the demogorgon playlist?
		$r = $this->provider->playlistsPlaylistIdFollowersContains('37i9dQZF1DX9Oqi0gBNbHz', ['ids' => $this->testuser]);
		$this::assertFalse($this->responseJson($r)[0]);

		// follow...
		$r = $this->provider->playlistsPlaylistIdFollow('37i9dQZF1DX9Oqi0gBNbHz', ['public' => false]);
		$this::assertSame(200, $r->getStatusCode());

		// ...
		$r = $this->provider->playlistsPlaylistIdFollowersContains('37i9dQZF1DX9Oqi0gBNbHz', ['ids' => $this->testuser]);
		$this::assertTrue($this->responseJson($r)[0]);

		// unfollow
		$r = $this->provider->playlistsPlaylistIdUnfollow('37i9dQZF1DX9Oqi0gBNbHz');
		$this::assertSame(200, $r->getStatusCode());

		// finally...!
		$r = $this->provider->playlistsPlaylistIdFollowersContains('37i9dQZF1DX9Oqi0gBNbHz', ['ids' => $this->testuser]);
		$this::assertFalse($this->responseJson($r)[0]);

		// yes, we do follow some artists...
		$r = $this->provider->meFollowing(['type' => 'artist', 'limit' => 10]);
		$this::assertCount(10, $this->responseJson($r)->artists->items);
	}

	public function testSavedAlbums():void{
		// get a random album
		$r = $this->provider->meAlbums(['limit' => 1]);
		$album_id = $this->responseJson($r)->items[0]->album->id;

		$r = $this->provider->meAlbumRemove(['ids' => [$album_id]]);
		$this::assertSame(200, $r->getStatusCode());

		// it's gone!
		$r = $this->provider->meAlbumsContains(['ids' => $album_id]);
		$this::assertFalse($this->responseJson($r)[0]);

		// re-add
		$r = $this->provider->meAlbumSave(['ids' => [$album_id]]);
		$this::assertSame(200, $r->getStatusCode());

		// verify
		$r = $this->provider->meAlbumsContains(['ids' => $album_id]);
		$this::assertTrue($this->responseJson($r)[0]);
	}

	public function testSavedTracks():void{
		$r = $this->provider->meTracks(['limit' => 1]);
		$track_id = $this->responseJson($r)->items[0]->track->id;

		$r = $this->provider->meTrackRemove(['ids' => [$track_id]]);
		$this::assertSame(200, $r->getStatusCode());

		$r = $this->provider->meTracksContains(['ids' => $track_id]);
		$this::assertFalse($this->responseJson($r)[0]);

		$r = $this->provider->meTrackSave(['ids' => [$track_id]]);
		$this::assertSame(200, $r->getStatusCode());

		$r = $this->provider->meTracksContains(['ids' => $track_id]);
		$this::assertTrue($this->responseJson($r)[0]);
	}

	public function testPlaylistCreate():void{
		// create
		$name        = 'test_'.md5(microtime(true));
		$body        = ['name' => $name, 'description' => 'test', 'public' => false, 'collaborative' => false];
		$r           = $this->responseJson($this->provider->usersUserPlaylistCreate($this->testuser, $body));
		$playlist_id = $r->id;
		$this::assertSame($name, $r->name);

		// update details
		$body = ['name' => 'testy'.$name, 'description' => 'testytest', 'public' => false, 'collaborative' => false];
		$r = $this->provider->playlistsPlaylistIdChangeDetails($playlist_id, $body);
		$this::assertSame(200, $r->getStatusCode());

		// add tracks
		$body        = ['uris' => ['spotify:track:0vYPwZx9gTU21BE6mEyWWk', 'spotify:track:7ykpEr7bxSlD6N8pf8boSv']];
		// query and body have similar params, so we're gonna add an empty params array to force using the body
		$r           = $this->provider->playlistsPlaylistIdTracksAdd($playlist_id, [], $body);
		$snapshot_id = $this->responseJson($r)->snapshot_id;
		$this::assertSame(201, $r->getStatusCode());

		// verify added tracks
		$r = $this->responseJson($this->provider->playlistsPlaylistId($playlist_id));
		$this::assertSame('0vYPwZx9gTU21BE6mEyWWk', $r->tracks->items[0]->track->id);
		$this->assertSame('7ykpEr7bxSlD6N8pf8boSv', $r->tracks->items[1]->track->id);

		// reorder tracks
		$body        = ['range_start' => 1, 'range_length' => 1, 'insert_before' => 0, 'snapshot_id' => $snapshot_id];
		$r           = $this->provider->playlistsPlaylistIdTracksReplace($playlist_id, [], $body);
		$snapshot_id = $this->responseJson($r)->snapshot_id;
		$this->assertSame(200, $r->getStatusCode());

		// verify reorder
		$r = $this->responseJson($this->provider->playlistsPlaylistIdTracks($playlist_id));
		$this->assertSame('7ykpEr7bxSlD6N8pf8boSv', $r->items[0]->track->id);
		$this->assertSame('0vYPwZx9gTU21BE6mEyWWk', $r->items[1]->track->id);

		// remove tracks
#		$body = ['tracks' => [['uri' => 'spotify:track:7ykpEr7bxSlD6N8pf8boSv'],]];
		$body = ['positions' => [0], 'snapshot_id' => $snapshot_id];
		$r    = $this->provider->playlistsPlaylistIdTracksRemove($playlist_id, $body);
		$this->assertSame(200, $r->getStatusCode());

		// verify remove
		$r = $this->provider->playlistsPlaylistIdTracks($playlist_id);
		$this->assertSame('0vYPwZx9gTU21BE6mEyWWk', $this->responseJson($r)->items[0]->track->id);

		// replace/empty playlist
		$body = ['uris' => ['spotify:track:5cPNaz7OjAdz1AcjVI9uz5']];
		$r = $this->provider->playlistsPlaylistIdTracksReplace($playlist_id, $body);
		$this->assertSame(201, $r->getStatusCode());

		// verify replace
		$r = $this->provider->playlistsPlaylistIdTracks($playlist_id);
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
	public function testDevices():void{
		$active_device   = null;
		$inactive_device = null;
		$r = $this->provider->mePlayerDevices();

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
			$r    = $this->provider->mePlayerPlay(['device_id' => $active_device], $body);
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// skip
			$r = $this->provider->mePlayerNext();
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// previous
			$r = $this->provider->mePlayerPrevious();
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// seek
			$r = $this->provider->mePlayerSeek(['position_ms' => 25000]);
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// switch device
			if($inactive_device){
				$body = ['device_ids' => [$inactive_device], 'play' => true];
				$r    = $this->provider->mePlayerTransferPlayback($body);
				$this->assertSame(204, $r->getStatusCode());
				usleep(3000000);

				$body = ['device_ids' => [$active_device], 'play' => true];
				$r    = $this->provider->mePlayerTransferPlayback($body);
				$this->assertSame(204, $r->getStatusCode());
				usleep(3000000);
			}

			// volume
			$r = $this->provider->mePlayerVolume(['volume_percent' => 25]);
			$this->assertSame(204, $r->getStatusCode());
			usleep(3000000);

			// pause
			$r = $this->provider->mePlayerPause();
			$this->assertSame(204, $r->getStatusCode());
		}

	}

}
