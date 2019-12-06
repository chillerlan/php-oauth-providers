<?php
/**
 * Class MusicBrainzTestXML
 *
 * @filesource   MusicBrainzTest.php
 * @created      31.07.2018
 * @package      chillerlan\OAuthTest\Providers\MusicBrainz
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\OAuthTest\Providers\MusicBrainz;

use chillerlan\HTTP\Psr7;

class MusicBrainzAPITestXML extends MusicBrainzAPITestAbstract{

	public function testArea():void{
		$r = $this->provider->area(['query' => 'Olympia', 'fmt' => 'xml']);
		$x = Psr7\get_xml($r);

		static::assertSame('Olympia', (string)$x->{'area-list'}->area[0]->name);
		static::assertSame('dc14405c-7534-457a-8672-54593b8805b9', (string)$x->{'area-list'}->area[0]->attributes()['id']);
	}

	public function testAreaId():void{
		$r = $this->provider->areaId('dc14405c-7534-457a-8672-54593b8805b9', ['fmt' => 'xml']);
		$x = Psr7\get_xml($r);

		static::assertSame('Olympia', (string)$x->area->name);
		static::assertSame('dc14405c-7534-457a-8672-54593b8805b9', (string)$x->area->attributes()['id']);
	}

	public function testArtist():void{
		$r = $this->provider->artist(['query' => 'sleater-kinney', 'fmt' => 'xml']);
		$x = Psr7\get_xml($r);

		static::assertSame('Sleater‐Kinney', (string)$x->{'artist-list'}->artist[0]->name);
		static::assertSame('e36e78eb-3ace-4acd-882c-16789e700ab7', (string)$x->{'artist-list'}->artist[0]->attributes()['id']);
	}

	public function testArtistId():void{
		$r = $this->provider->artistId('573510d6-bb5d-4d07-b0aa-ea6afe39e28d', ['inc' => 'url-rels work-rels', 'fmt' => 'xml']);
		$x = Psr7\get_xml($r);

		static::assertSame('Helium', (string)$x->artist[0]->name);
		static::assertSame('573510d6-bb5d-4d07-b0aa-ea6afe39e28d', (string)$x->artist[0]->attributes()['id']);
	}

}
