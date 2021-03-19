<?php
/**
 * Class MusicBrainzTest
 *
 * @filesource   MusicBrainzTest.php
 * @created      31.07.2018
 * @package      chillerlan\OAuthTest\Providers\MusicBrainz
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\MusicBrainz;

class MusicBrainzAPITest extends MusicBrainzAPITestAbstract{

	public function testArea():void{
		$r = $this->provider->area(['query' => 'Olympia']);
		$j = $this->responseJson($r);

		$this::assertSame('Olympia', $j->areas[0]->name);
		$this::assertSame('dc14405c-7534-457a-8672-54593b8805b9', $j->areas[0]->id);
	}

	public function testAreaId():void{
		$r = $this->provider->areaId('dc14405c-7534-457a-8672-54593b8805b9');
		$j = $this->responseJson($r);

		$this::assertSame('Olympia', $j->name);
		$this::assertSame('dc14405c-7534-457a-8672-54593b8805b9', $j->id);
	}

	public function testArtist():void{
		$r = $this->provider->artist(['query' => 'sleater-kinney']);
		$j = $this->responseJson($r);

		$this::assertSame('Sleater‐Kinney', $j->artists[0]->name);
		$this::assertSame('e36e78eb-3ace-4acd-882c-16789e700ab7', $j->artists[0]->id);
	}

	public function testArtistId():void{
		$r = $this->provider->artistId('573510d6-bb5d-4d07-b0aa-ea6afe39e28d', ['inc' => 'url-rels work-rels']);
		$j = $this->responseJson($r);

		$this::assertSame('Helium', $j->name);
		$this::assertSame('573510d6-bb5d-4d07-b0aa-ea6afe39e28d', $j->id);
	}

}
