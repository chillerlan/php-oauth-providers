# chillerlan/php-oauth-providers

**ATTENTION: This library has been abandoned and archive in favor of [chillerlan/php-oauth](https://github.com/chillerlan/php-oauth)**

[![PHP Version Support][php-badge]][php]
[![Packagist version][packagist-badge]][packagist]
[![License][license-badge]][license]
[![Continuous Integration][gh-action-badge]][gh-action]
[![CodeCov][coverage-badge]][coverage]
[![Codacy][codacy-badge]][codacy]
[![Packagist downloads][downloads-badge]][downloads]

[php-badge]: https://img.shields.io/packagist/php-v/chillerlan/php-oauth-providers?logo=php&color=8892BF
[php]: https://www.php.net/supported-versions.php
[packagist-badge]: https://img.shields.io/packagist/v/chillerlan/php-oauth-providers.svg?logo=packagist
[packagist]: https://packagist.org/packages/chillerlan/php-oauth-providers
[license-badge]: https://img.shields.io/github/license/chillerlan/php-oauth-providers.svg
[license]: https://github.com/chillerlan/php-oauth-providers/blob/main/LICENSE
[coverage-badge]: https://img.shields.io/codecov/c/github/chillerlan/php-oauth-providers.svg?logo=codecov
[coverage]: https://codecov.io/github/chillerlan/php-oauth-providers
[codacy-badge]: https://img.shields.io/codacy/grade/a8f867d3d53840adaabc2d6aab304cf0?logo=codacy
[codacy]: https://app.codacy.com/gh/chillerlan/php-oauth-providers/dashboard
[downloads-badge]: https://img.shields.io/packagist/dt/chillerlan/php-oauth-providers.svg?logo=packagist
[downloads]: https://packagist.org/packages/chillerlan/php-oauth-providers/stats
[gh-action-badge]: https://img.shields.io/github/actions/workflow/status/chillerlan/php-oauth-providers/ci.yml?branch=main&logo=github
[gh-action]: https://github.com/chillerlan/php-oauth-providers/actions/workflows/ci.yml?query=branch%3Amain

# Documentation
See [the wiki](https://github.com/chillerlan/php-oauth-providers/wiki) for advanced documentation.

## Requirements
- PHP 8.1+
- a [PSR-18](https://www.php-fig.org/psr/psr-18/) compatible HTTP client library of your choice ([there is one included](https://github.com/chillerlan/php-httpinterface), though)
  - optional [PSR-17](https://www.php-fig.org/psr/psr-17/) compatible Request-, Response- and UriFactories

For documentation of the core components see [`chillerlan/php-oauth-core`](https://github.com/chillerlan/php-oauth-core).

## Installation
**requires [composer](https://getcomposer.org)**

`composer.json` (note: replace `dev-main` with a [version boundary](https://getcomposer.org/doc/articles/versions.md))
```json
{
	"require": {
		"php": "^8.1",
		"chillerlan/php-oauth-providers": "dev-main"
	}
}
```
Profit!

## Supported Providers
A list of already implemented Providers.

<!--A-->
| Provider | API keys | revoke access | OAuth | `ClientCredentials` |
|----------|----------|---------------|-------|---------------------|
| [Amazon](https://login.amazon.com/) | [link](https://sellercentral.amazon.com/hz/home) |  | 2 |  |
| [BattleNet](https://develop.battle.net/documentation) | [link](https://develop.battle.net/access/clients) | [link](https://account.blizzard.com/connections) | 2 | ✓ |
| [BigCartel](https://developers.bigcartel.com/api/v1) | [link](https://bigcartel.wufoo.com/forms/big-cartel-api-application/) | [link](https://my.bigcartel.com/account) | 2 |  |
| [Bitbucket](https://developer.atlassian.com/bitbucket/api/2/reference/) | [link](https://developer.atlassian.com/apps/) |  | 2 | ✓ |
| [Deezer](https://developers.deezer.com/api) | [link](http://developers.deezer.com/myapps) | [link](https://www.deezer.com/account/apps) | 2 |  |
| [DeviantArt](https://www.deviantart.com/developers/) | [link](https://www.deviantart.com/developers/apps) | [link](https://www.deviantart.com/settings/applications) | 2 | ✓ |
| [Discogs](https://www.discogs.com/developers/) | [link](https://www.discogs.com/settings/developers) | [link](https://www.discogs.com/settings/applications) | 1 |  |
| [Discord](https://discordapp.com/developers/) | [link](https://discordapp.com/developers/applications/) |  | 2 | ✓ |
| [Flickr](https://www.flickr.com/services/api/) | [link](https://www.flickr.com/services/apps/create/) | [link](https://www.flickr.com/services/auth/list.gne) | 1 |  |
| [Foursquare](https://developer.foursquare.com/docs) | [link](https://foursquare.com/developers/apps) | [link](https://foursquare.com/settings/connections) | 2 |  |
| [GitHub](https://developer.github.com/) | [link](https://github.com/settings/developers) | [link](https://github.com/settings/applications) | 2 |  |
| [GitLab](https://docs.gitlab.com/ee/api/README.html) | [link](https://gitlab.com/profile/applications) |  | 2 | ✓ |
| [Google](https://developers.google.com/oauthplayground/) | [link](https://console.developers.google.com/apis/credentials) | [link](https://myaccount.google.com/permissions) | 2 |  |
| [GuildWars2](https://wiki.guildwars2.com/wiki/API:Main) | [link](https://account.arena.net/applications) | [link](https://account.arena.net/applications) | 2 |  |
| [Imgur](https://apidocs.imgur.com) | [link](https://api.imgur.com/oauth2/addclient) | [link](https://imgur.com/account/settings/apps) | 2 |  |
| [Instagram](https://www.instagram.com/developer/) | [link](https://www.instagram.com/developer/clients/manage/) | [link](https://www.instagram.com/accounts/manage_access/) | 2 |  |
| [LastFM](https://www.last.fm/api/) | [link](https://www.last.fm/api/account/create) | [link](https://www.last.fm/settings/applications) | - |  |
| [MailChimp](https://developer.mailchimp.com/) | [link](https://admin.mailchimp.com/account/oauth2/) |  | 2 |  |
| [Mastodon](https://docs.joinmastodon.org/api/) | [link]() |  | 2 |  |
| [MicrosoftGraph](https://docs.microsoft.com/graph/overview) | [link](https://aad.portal.azure.com/#blade/Microsoft_AAD_IAM/ActiveDirectoryMenuBlade/RegisteredApps) | [link](https://account.live.com/consent/Manage) | 2 |  |
| [Mixcloud](https://www.mixcloud.com/developers/) | [link](https://www.mixcloud.com/developers/create/) | [link](https://www.mixcloud.com/settings/applications/) | 2 |  |
| [MusicBrainz](https://musicbrainz.org/doc/Development) | [link](https://musicbrainz.org/account/applications) | [link](https://musicbrainz.org/account/applications) | 2 |  |
| [NPROne](https://dev.npr.org/api/) | [link](https://dev.npr.org/console) |  | 2 |  |
| [OpenCaching](https://www.opencaching.de/okapi/) | [link](https://www.opencaching.de/okapi/signup.html) | [link](https://www.opencaching.de/okapi/apps/) | 1 |  |
| [OpenStreetmap](https://wiki.openstreetmap.org/wiki/API) | [link](https://www.openstreetmap.org/user/{USERNAME}/oauth_clients) |  | 1 |  |
| [OpenStreetmap2](https://wiki.openstreetmap.org/wiki/API) | [link](https://www.openstreetmap.org/oauth2/applications) |  | 2 |  |
| [Patreon](https://docs.patreon.com/) | [link](https://www.patreon.com/portal/registration/register-clients) |  | 2 |  |
| [PayPal](https://developer.paypal.com/docs/connect-with-paypal/reference/) | [link](https://developer.paypal.com/developer/applications/) |  | 2 | ✓ |
| [PayPalSandbox](https://developer.paypal.com/docs/connect-with-paypal/reference/) | [link](https://developer.paypal.com/developer/applications/) |  | 2 | ✓ |
| [Slack](https://api.slack.com) | [link](https://api.slack.com/apps) | [link](https://slack.com/apps/manage) | 2 |  |
| [SoundCloud](https://developers.soundcloud.com/) | [link](https://soundcloud.com/you/apps) | [link](https://soundcloud.com/settings/connections) | 2 | ✓ |
| [Spotify](https://developer.spotify.com/documentation/web-api/) | [link](https://developer.spotify.com/dashboard) | [link](https://www.spotify.com/account/apps/) | 2 | ✓ |
| [SteamOpenID](https://developer.valvesoftware.com/wiki/Steam_Web_API) | [link](https://steamcommunity.com/dev/apikey) |  | - |  |
| [Stripe](https://stripe.com/docs/api) | [link](https://dashboard.stripe.com/apikeys) | [link](https://dashboard.stripe.com/account/applications) | 2 |  |
| [Tumblr](https://www.tumblr.com/docs/en/api/v2) | [link](https://www.tumblr.com/oauth/apps) | [link](https://www.tumblr.com/settings/apps) | 1 |  |
| [Tumblr2](https://www.tumblr.com/docs/en/api/v2) | [link](https://www.tumblr.com/oauth/apps) | [link](https://www.tumblr.com/settings/apps) | 2 |  |
| [Twitch](https://dev.twitch.tv/docs/api/reference/) | [link](https://dev.twitch.tv/console/apps/create) | [link](https://www.twitch.tv/settings/connections) | 2 | ✓ |
| [Twitter](https://developer.twitter.com/docs) | [link](https://developer.twitter.com/apps) | [link](https://twitter.com/settings/applications) | 1 |  |
| [TwitterCC](https://developer.twitter.com/en/docs/basics/authentication/overview/application-only) | [link](https://developer.twitter.com/apps) | [link](https://twitter.com/settings/applications) | 2 | ✓ |
| [Vimeo](https://developer.vimeo.com) | [link](https://developer.vimeo.com/apps) | [link](https://vimeo.com/settings/apps) | 2 | ✓ |
| [WordPress](https://developer.wordpress.com/docs/api/) | [link](https://developer.wordpress.com/apps/) | [link](https://wordpress.com/me/security/connected-applications) | 2 |  |
| [YouTube](https://developers.google.com/oauthplayground/) | [link](https://console.developers.google.com/apis/credentials) | [link](https://myaccount.google.com/permissions) | 2 |  |
<!--O-->

# Disclaimer
OAuth tokens are secrets and should be treated as such. Store them in a safe place,
[consider encryption](http://php.net/manual/book.sodium.php).<br/>
I won't take responsibility for stolen auth tokens. Use at your own risk.
