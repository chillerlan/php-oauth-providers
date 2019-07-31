# chillerlan/php-oauth-providers

[![Packagist version][packagist-badge]][packagist]
[![License][license-badge]][license]
[![Travis CI][travis-badge]][travis]
[![CodeCov][coverage-badge]][coverage]
[![Scrunitizer CI][scrutinizer-badge]][scrutinizer]
[![Packagist downloads][downloads-badge]][downloads]
[![PayPal donate][donate-badge]][donate]

[packagist-badge]: https://img.shields.io/packagist/v/chillerlan/php-oauth-providers.svg?style=flat-square
[packagist]: https://packagist.org/packages/chillerlan/php-oauth-providers
[license-badge]: https://img.shields.io/github/license/chillerlan/php-oauth-providers.svg?style=flat-square
[license]: https://github.com/chillerlan/php-oauth-providers/blob/master/LICENSE
[travis-badge]: https://img.shields.io/travis/chillerlan/php-oauth-providers.svg?style=flat-square
[travis]: https://travis-ci.org/chillerlan/php-oauth-providers
[coverage-badge]: https://img.shields.io/codecov/c/github/chillerlan/php-oauth-providers.svg?style=flat-square
[coverage]: https://codecov.io/github/chillerlan/php-oauth-providers
[scrutinizer-badge]: https://img.shields.io/scrutinizer/g/chillerlan/php-oauth-providers.svg?style=flat-square
[scrutinizer]: https://scrutinizer-ci.com/g/chillerlan/php-oauth-providers
[downloads-badge]: https://img.shields.io/packagist/dt/chillerlan/php-oauth-providers.svg?style=flat-square
[downloads]: https://packagist.org/packages/chillerlan/php-oauth-providers/stats
[donate-badge]: https://img.shields.io/badge/donate-paypal-ff33aa.svg?style=flat-square
[donate]: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WLYUNAT9ZTJZ4

## Requirements
- PHP 7.2+
- a [PSR-18](https://www.php-fig.org/psr/psr-18/) compatible HTTP client library of your choice
  - optional [PSR-17](https://www.php-fig.org/psr/psr-17/) compatible Request-, Response- and UriFactories

For documentation see [`chillerlan/php-oauth-core`](https://github.com/chillerlan/php-oauth-core)

## Supported Providers

<!--A-->
 Provider | API keys | revoke access 
----------|----------|---------------
[Amazon](https://login.amazon.com/) | [link](https://sellercentral.amazon.com/hz/home) | 
[BigCartel](https://developers.bigcartel.com/api/v1) | [link](https://bigcartel.wufoo.com/forms/big-cartel-api-application/) | [link](https://my.bigcartel.com/account)
[Bitbucket](https://developer.atlassian.com/bitbucket/api/2/reference/) | [link](https://developer.atlassian.com/apps/) | 
[Deezer](https://developers.deezer.com/api) | [link](http://developers.deezer.com/myapps) | [link](https://www.deezer.com/account/apps)
[DeviantArt](https://www.deviantart.com/developers/) | [link](https://www.deviantart.com/developers/apps) | [link](https://www.deviantart.com/settings/applications)
[Discogs](https://www.discogs.com/developers/) | [link](https://www.discogs.com/settings/developers) | [link](https://www.discogs.com/settings/applications)
[Discord](https://discordapp.com/developers/) | [link](https://discordapp.com/developers/applications/) | 
[Flickr](https://www.flickr.com/services/api/) | [link](https://www.flickr.com/services/apps/create/) | [link](https://www.flickr.com/services/auth/list.gne)
[Foursquare](https://developer.foursquare.com/docs) | [link](https://foursquare.com/developers/apps) | [link](https://foursquare.com/settings/connections)
[GitHub](https://developer.github.com/) | [link](https://github.com/settings/developers) | [link](https://github.com/settings/applications)
[GitLab](https://docs.gitlab.com/ee/api/README.html) | [link](https://gitlab.com/profile/applications) | 
[Gitter](https://developer.gitter.im) | [link](https://developer.gitter.im/apps) | 
[Google](https://developers.google.com/oauthplayground/) | [link](https://console.developers.google.com/apis/credentials) | [link](https://myaccount.google.com/permissions)
[Youtube](https://developers.google.com/oauthplayground/) | [link](https://console.developers.google.com/apis/credentials) | [link](https://myaccount.google.com/permissions)
[GuildWars2](https://wiki.guildwars2.com/wiki/API:Main) | [link](https://account.arena.net/applications) | [link](https://account.arena.net/applications)
[Imgur](https://apidocs.imgur.com) | [link](https://api.imgur.com/oauth2/addclient) | [link](https://imgur.com/account/settings/apps)
[Instagram](https://www.instagram.com/developer/) | [link](https://www.instagram.com/developer/clients/manage/) | [link](https://www.instagram.com/accounts/manage_access/)
[LastFM](https://www.last.fm/api/) | [link](https://www.last.fm/api/account/create) | [link](https://www.last.fm/settings/applications)
[MailChimp](https://developer.mailchimp.com/) | [link](https://admin.mailchimp.com/account/oauth2/) | 
[Mastodon](https://docs.joinmastodon.org/api/guidelines/) | [link]() | 
[MicrosoftGraph](https://docs.microsoft.com/graph/overview) | [link](https://aad.portal.azure.com/#blade/Microsoft_AAD_IAM/ActiveDirectoryMenuBlade/RegisteredApps) | [link](https://account.live.com/consent/Manage)
[Mixcloud](https://www.mixcloud.com/developers/) | [link](https://www.mixcloud.com/developers/create/) | [link](https://www.mixcloud.com/settings/applications/)
[MusicBrainz](https://musicbrainz.org/doc/Development) | [link](https://musicbrainz.org/account/applications) | [link](https://musicbrainz.org/account/applications)
[NPROne](https://dev.npr.org/api/) | [link](https://dev.npr.org/console) | 
[OpenCaching](https://www.opencaching.de/okapi/) | [link](https://www.opencaching.de/okapi/signup.html) | [link](https://www.opencaching.de/okapi/apps/)
[OpenStreetmap](https://wiki.openstreetmap.org/wiki/API) | [link](https://www.openstreetmap.org/user/{USERNAME}/oauth_clients) | 
[Patreon1](https://docs.patreon.com/) | [link](https://www.patreon.com/portal/registration/register-clients) | 
[Patreon2](https://docs.patreon.com/) | [link](https://www.patreon.com/portal/registration/register-clients) | 
[PayPal](https://developer.paypal.com/docs/connect-with-paypal/reference/) | [link](https://developer.paypal.com/developer/applications/) | 
[PayPalSandbox](https://developer.paypal.com/docs/connect-with-paypal/reference/) | [link](https://developer.paypal.com/developer/applications/) | 
[Slack](https://api.slack.com) | [link](https://api.slack.com/apps) | [link](https://slack.com/apps/manage)
[SoundCloud](https://developers.soundcloud.com/) | [link](https://soundcloud.com/you/apps) | [link](https://soundcloud.com/settings/connections)
[Spotify](https://developer.spotify.com/documentation/web-api/) | [link](https://developer.spotify.com/dashboard/applications) | [link](https://www.spotify.com/account/apps/)
[Stripe](https://stripe.com/docs/api) | [link](https://dashboard.stripe.com/apikeys) | [link](https://dashboard.stripe.com/account/applications)
[Tumblr](https://www.tumblr.com/docs/en/api/v2) | [link](https://www.tumblr.com/oauth/apps) | [link](https://www.tumblr.com/settings/apps)
[Twitch](https://dev.twitch.tv/docs/api/reference/) | [link](https://dev.twitch.tv/console/apps/create) | [link](https://www.twitch.tv/settings/connections)
[Twitter](https://developer.twitter.com/docs) | [link](https://developer.twitter.com/apps) | [link](https://twitter.com/settings/applications)
[TwitterCC](https://developer.twitter.com/en/docs/basics/authentication/overview/application-only) | [link](https://developer.twitter.com/apps) | [link](https://twitter.com/settings/applications)
[Vimeo](https://developer.vimeo.com) | [link](https://developer.vimeo.com/apps) | [link](https://vimeo.com/settings/apps)
[Wordpress](https://developer.wordpress.com/docs/api/) | [link](https://developer.wordpress.com/apps/) | [link](https://wordpress.com/me/security/connected-applications)
<!--O-->
