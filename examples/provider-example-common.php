<?php
/**
 * @filesource   provider-example-common.php
 * @created      26.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples;

use chillerlan\OAuth\Providers;

require_once __DIR__.'/../vendor/autoload.php';

$CFGDIR = __DIR__.'/../config';

/** @var \chillerlan\Settings\SettingsContainerInterface $options */
$options = null;

require_once __DIR__.'/../vendor/chillerlan/php-oauth-core/examples/oauth-example-common.php';

$providers = [
	Providers\Amazon\Amazon::class,
	Providers\BigCartel\BigCartel::class,
	Providers\Deezer\Deezer::class,
	Providers\DeviantArt\DeviantArt::class,
	Providers\Discogs\Discogs::class,
	Providers\Discord\Discord::class,
	Providers\Flickr\Flickr::class,
	Providers\Foursquare\Foursquare::class,
	Providers\GitHub\GitHub::class,
	Providers\Gitter\Gitter::class,
	Providers\Instagram\Instagram::class,
	Providers\LastFM\LastFM::class,
	Providers\MailChimp\MailChimp::class,
	Providers\Mastodon\Mastodon::class,
	Providers\Mixcloud\Mixcloud::class,
	Providers\MusicBrainz\MusicBrainz::class,
	Providers\OpenCaching\OpenCaching::class,
	Providers\OpenStreetmap\OpenStreetmap::class,
	Providers\Patreon\Patreon1::class,
	Providers\Patreon\Patreon2::class,
	Providers\Slack\Slack::class,
	Providers\SoundCloud\SoundCloud::class,
	Providers\Spotify\Spotify::class,
	Providers\Stripe\Stripe::class,
	Providers\Tumblr\Tumblr::class,
	Providers\Twitter\Twitter::class,
	Providers\Twitter\Twitter2::class,
	Providers\Vimeo\Vimeo::class,
	Providers\Wordpress\Wordpress::class,
];
