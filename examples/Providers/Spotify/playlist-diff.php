<?php
/**
 * playlist-diff.php
 *
 * @created      31.08.2023
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2023 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples\Providers\Spotify;

use function array_diff;
use function array_keys;
use function sprintf;

/**
 * @var \chillerlan\OAuth\Providers\Spotify $spotify
 * @var \Psr\Http\Message\RequestFactoryInterface $requestFactory
 * @var \Psr\Log\LoggerInterface $logger
 * @var string $CFGDIR
 */
require_once __DIR__.'/spotify-common.php';

$client = new class ($spotify, $logger) extends SpotifyClient{

	public function playlistDiff(string $playlistID1, string $playlistID2, bool $createAsPlaylist = false):array{
		$p1 = array_keys($this->getPlaylist($playlistID1));
		$p2 = array_keys($this->getPlaylist($playlistID2));

		$diff = array_diff($p1, $p2);

		if($createAsPlaylist){
			$playlistID = $this->createPlaylist(
				'playlist diff',
				sprintf('diff between playlists "spotify:playlist:%s" and "spotify:playlist:%s"', $playlistID1, $playlistID2)
			);
			$this->addTracks($playlistID, $diff);
		}

		return $diff;
	}

};

$client->playlistDiff('37i9dQZF1DX4UtSsGT1Sbe', '37i9dQZF1DXb57FjYWz00c', true);
