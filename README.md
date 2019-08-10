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
- a [PSR-18](https://www.php-fig.org/psr/psr-18/) compatible HTTP client library of your choice ([there is one included](https://github.com/chillerlan/php-httpinterface), though)
  - optional [PSR-17](https://www.php-fig.org/psr/psr-17/) compatible Request-, Response- and UriFactories

For documentation of the core components see [`chillerlan/php-oauth-core`](https://github.com/chillerlan/php-oauth-core).

## Installation
**requires [composer](https://getcomposer.org)**

`composer.json` (note: replace `dev-master` with a [version boundary](https://getcomposer.org/doc/articles/versions.md))
```json
{
	"require": {
		"php": "^7.2",
		"chillerlan/php-oauth-providers": "dev-master"
	}
}
```
Profit!


## Getting Started
In order to instance a provider ([`OAuthInterface`](https://github.com/chillerlan/php-oauth-core/blob/master/src/Core/OAuthInterface.php)) you you'll need to invoke a 
PSR-18 [`ClientInterface`](https://github.com/php-fig/http-client/blob/master/src/ClientInterface.php), 
an [`OAuthStorageInterface`](https://github.com/chillerlan/php-oauth-core/blob/master/src/Storage/OAuthStorageInterface.php) 
and `OAuthOptions` (a [`SettingsContainerInterface`](https://github.com/chillerlan/php-settings-container/blob/master/src/SettingsContainerInterface.php)) objects first:
```php
use chillerlan\OAuth\Providers\<PROVIDER_NAMESPACE>\<PROVIDER> as Provider;
use chillerlan\OAuth\{OAuthOptions, Storage\SessionStorage};
use <PSR-18 HTTP Client>;

$options = new OAuthOptions([
	'key'         => '<API_KEY>',
	'secret'      => '<API_SECRET>',
	'callbackURL' => '<API_CALLBACK_URL>',
]);

// a PSR-18 http client
$http = new HttpClient;

// OAuthStorageInterface
// a persistent storage is required for authentication!
$storage = new SessionStorage($options);

// an optional PSR-3 logger
$logger = new Logger;

// invoke and use the OAuthInterface
$provider = new Provider($http, $storage, $options, $logger);
```
## Authentication
The application flow may differ slightly depending on the provider; there's a working authentication example in the 
[provider repository](https://github.com/chillerlan/php-oauth-providers/tree/master/examples/get-token).

### Step 1: optional login link
Display a login link and provide the user with information what kind of data you're about to access; ask them for permission to save the access token if needed.

```php
echo '<a href="?login='.$provider->serviceName.'">connect with '.$provider->serviceName.'!</a>';
```

### Step 2: redirect to the provider
Redirect to the provider's login screen with optional arguments in the authentication URL, like permissions, scopes etc.
```php
// additional request parameters
$params = [
	'extra-param' => 'val',
];

// optional scopes for OAuth2 providers
// you may want to save the used scopes along with the received token
$scopes = [
	Provider::SCOPE_WHATEVER,
];

header('Location: '.$provider->getAuthURL($params, $scopes));
```

### Step 3: receive the token
Receive the access token and save it, do whatever you need to do (e.g. save scopes with the token), then redirect to step 4.

#### OAuth1
```php
// save token & redirect...
$token = $provider->getAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);
```

#### OAuth2
Usage of the `<state>` parameter is enforced through the `CSRFToken` interface if the provider implements it.
```php
// save token & redirect...
$token = $provider->getAccessToken($_GET['code'], $_GET['state'] ?? null);
```

### Step 4: auth granted
After receiving the access token, go on and verify it then use the API.
```php
$response = $provider->request('/do/stuff', 'GET');

// or using the magic API
$response = $provider->doStuff();

// ...
```

### Call the Provider's API
After successfully receiving the Token, we're ready to make API requests:
```php
$storage = new MemoryStorage;

// import a token to the OAuth token storage if needed
$storage->storeAccessToken($provider->serviceName, (new AccessToken)->fromJSON($token_json));

// make a request
$response = $provider->request(
	'/some/endpoint', 
	['q' => 'param'], 
	'POST', 
	['data' => 'content'], 
	['content-type' => 'whatever']
);

// use the data: $response is a PSR-7 ResponseInterface
$headers = $response->getHeaders();
$data    = $response->getBody()->getContents();
```
The included [chillerlan/php-httpinterface](https://github.com/chillerlan/php-httpinterface#psr-7-message-helpers) brings some convenience functions to handle a `ResponseInterface` (among other stuff).

Another way to call the provider API is to use the methods provided by an [`EndpointMapInterface`](https://github.com/chillerlan/php-magic-apiclient/blob/master/src/EndpointMap.php).
See below for more information.


## Provider implementation
In order to use a provider that is not yet supported, you'll need to implement the respective interfaces. 
The abstract providers already implement everything necessary, so that in most cases you only need to set the required URLs in order to get started.

Additionally to the provider specific properties there are several common ones, most importantly `$apiURL` (required), 
which sets the base URL for the provider's API, as well as `$authHeaders` and `$apiHeaders` that can be used to provide extra headers which should be included in each call.

### [`OAuth1Interface`](https://github.com/chillerlan/php-oauth-core/blob/master/src/Core/OAuth1Provider.php)
A minimal OAuth1 implementation requires `$requestTokenURL`, `$authURL`, `$accessTokenURL` like follows:

```php
use chillerlan\OAuth\Core\OAuth1Provider;

class MyOauth1Provider extends Oauth1Provider{

	protected $apiURL          = 'https://api.example.com';
	protected $requestTokenURL = 'https://example.com/oauth/request_token';
	protected $authURL         = 'https://example.com/oauth/authorize';
	protected $accessTokenURL  = 'https://example.com/oauth/access_token';

}
```

Example implementations for OAuth1 providers: 
[Discogs](https://github.com/chillerlan/php-oauth-providers/blob/master/src/Discogs/Discogs.php), 
[Twitter](https://github.com/chillerlan/php-oauth-providers/blob/master/src/Twitter/Twitter.php), 
[Flickr](https://github.com/chillerlan/php-oauth-providers/blob/master/src/Flickr/Flickr.php)

### [`OAuth2Interface`](https://github.com/chillerlan/php-oauth-core/blob/master/src/Core/OAuth2Provider.php)
[OAuth2 is a very straightforward... mess](https://hueniverse.com/oauth-2-0-and-the-road-to-hell-8eec45921529). Please refer to your provider's docs for implementation details.

A minimum OAuth2 implementation requires `$authURL` and `$accessTokenURL`. 
If the provider allows fetching client tokens, an optional `$clientCredentialsTokenURL` can be set (in case it differs from `$accessTokenURL`). 
An `$authMethod` needs to be set if it differs from the "standard" header `Authorization: Bearer <TOKEN>`. 
There are constants for the most common auth methods in [OAuth2Interface](https://github.com/chillerlan/php-oauth-core/blob/master/src/Core/OAuth2Interface.php). 
Finally, a `$scopesDelimiter` can be set if it differs from the default `' '` (space).

There are several interfaces that can be implemented by OAuth2 providers:

- `ClientCredentials` - allows to fetch client credentials access tokens 
- `CSRFToken` - enforces the usage/verification of the `<state>` parameter during authentication
- `TokenRefresh` - allows refreshing expired tokens during requests

```php
use chillerlan\OAuth\Core\OAuth2Provider;

class MyOauth2Provider extends Oauth2Provider implements ClientCredentials, CSRFToken, TokenRefresh{

	public const SCOPE_WHATEVER = 'whatever';

	protected $apiURL                    = 'https://api.example.com';
	protected $authURL                   = 'https://example.com/oauth2/authorize';
	protected $accessTokenURL            = 'https://example.com/oauth2/token';
	protected $clientCredentialsTokenURL = 'https://example.com/oauth2/client_credentials';
	protected $authMethod                = self::HEADER_BEARER;
	protected $authHeaders               = ['Accept' => 'application/json'];
	protected $apiHeaders                = ['Accept' => 'application/json'];
	protected $scopesDelimiter           = ',';

}
```

Example implementations for OAuth2 providers:
[Spotify](https://github.com/chillerlan/php-oauth-providers/blob/master/src/Spotify/Spotify.php),
[Mastodon](https://github.com/chillerlan/php-oauth-providers/blob/master/src/Mastodon/Mastodon.php),
[MusicBrainz](https://github.com/chillerlan/php-oauth-providers/blob/master/src/MusicBrainz/MusicBrainz.php)


### [MagicAPI](https://github.com/chillerlan/php-magic-apiclient/blob/master/src/ApiClientInterface.php)
The magic API client is basically a container holding arrays with information about each endpoint of an API that translate into provider methods.
It requires an implementation of a [`__call()`](https://github.com/chillerlan/php-oauth-core/blob/98fa87234f718efd24c00fd74935d9c2f5614902/src/Core/OAuthProvider.php#L240) method that turns the given parameters into requests and returns the result, a PSR-7 `ResponseInterface`.

```php
class ProviderEndpoints extends EndpointMap{

    // a common base path, useful for versioning etc.
	protected $API_BASE = '/v1'; 

	protected $myEndpoint = [
		// the path to your endpoint, path elements that are values are replaced by numbered placeholders (see sprintf())
		'path'          => '/my/endpoint/%1$s',
		// the request method
		'method'        => 'GET',
		// additional query elements, listed are the names of the query parameters
		'query'         => ['q'],
		// the path elemnts corresponding to the placeholders in "path"
		'path_elements' => ['path'],
		// names of the post/patch/put body elements (if any)
		'body'          => null,
		// additional request headers
		'headers'       => null,
	];

}
```
The above endpoint example would then translate to:
```php
$provider->myEndpoint(string $path, array $query = ['q' => null]);
```
See the [`Spotify`](https://github.com/chillerlan/php-oauth-providers/blob/master/src/Spotify/Spotify.php) provider , 
its [Endpoint map](https://github.com/chillerlan/php-oauth-providers/blob/master/src/Spotify/SpotifyEndpoints.php) 
and the [live API tests](https://github.com/chillerlan/php-oauth-providers/blob/master/tests/Spotify/SpotifyAPITest.php) for examples.
To ease IDE type hinting for magic methods, there's a [docblock generator over here](https://github.com/chillerlan/php-magic-apiclient/blob/master/tests/EndpointDocblock.php).

## Supported Providers
A list of already implemented Providers.

<!--A-->
 Provider | API keys | revoke access | OAuth | `ClientCredentials`
----------|----------|---------------|-------|--------------------
[Amazon](https://login.amazon.com/) | [link](https://sellercentral.amazon.com/hz/home) | | 2| 
[BattleNet](https://develop.battle.net/documentation) | [link](https://develop.battle.net/access/clients) | [link](https://account.blizzard.com/connections)| 2| ✓
[BigCartel](https://developers.bigcartel.com/api/v1) | [link](https://bigcartel.wufoo.com/forms/big-cartel-api-application/) | [link](https://my.bigcartel.com/account)| 2| 
[Bitbucket](https://developer.atlassian.com/bitbucket/api/2/reference/) | [link](https://developer.atlassian.com/apps/) | | 2| ✓
[Deezer](https://developers.deezer.com/api) | [link](http://developers.deezer.com/myapps) | [link](https://www.deezer.com/account/apps)| 2| 
[DeviantArt](https://www.deviantart.com/developers/) | [link](https://www.deviantart.com/developers/apps) | [link](https://www.deviantart.com/settings/applications)| 2| ✓
[Discogs](https://www.discogs.com/developers/) | [link](https://www.discogs.com/settings/developers) | [link](https://www.discogs.com/settings/applications)| 1| 
[Discord](https://discordapp.com/developers/) | [link](https://discordapp.com/developers/applications/) | | 2| ✓
[Flickr](https://www.flickr.com/services/api/) | [link](https://www.flickr.com/services/apps/create/) | [link](https://www.flickr.com/services/auth/list.gne)| 1| 
[Foursquare](https://developer.foursquare.com/docs) | [link](https://foursquare.com/developers/apps) | [link](https://foursquare.com/settings/connections)| 2| 
[GitHub](https://developer.github.com/) | [link](https://github.com/settings/developers) | [link](https://github.com/settings/applications)| 2| 
[GitLab](https://docs.gitlab.com/ee/api/README.html) | [link](https://gitlab.com/profile/applications) | | 2| ✓
[Gitter](https://developer.gitter.im) | [link](https://developer.gitter.im/apps) | | 2| 
[Google](https://developers.google.com/oauthplayground/) | [link](https://console.developers.google.com/apis/credentials) | [link](https://myaccount.google.com/permissions)| 2| 
[Youtube](https://developers.google.com/oauthplayground/) | [link](https://console.developers.google.com/apis/credentials) | [link](https://myaccount.google.com/permissions)| 2| 
[GuildWars2](https://wiki.guildwars2.com/wiki/API:Main) | [link](https://account.arena.net/applications) | [link](https://account.arena.net/applications)| 2| 
[Imgur](https://apidocs.imgur.com) | [link](https://api.imgur.com/oauth2/addclient) | [link](https://imgur.com/account/settings/apps)| 2| 
[Instagram](https://www.instagram.com/developer/) | [link](https://www.instagram.com/developer/clients/manage/) | [link](https://www.instagram.com/accounts/manage_access/)| 2| 
[LastFM](https://www.last.fm/api/) | [link](https://www.last.fm/api/account/create) | [link](https://www.last.fm/settings/applications)| -| 
[MailChimp](https://developer.mailchimp.com/) | [link](https://admin.mailchimp.com/account/oauth2/) | | 2| 
[Mastodon](https://docs.joinmastodon.org/api/guidelines/) | [link]() | | 2| 
[MicrosoftGraph](https://docs.microsoft.com/graph/overview) | [link](https://aad.portal.azure.com/#blade/Microsoft_AAD_IAM/ActiveDirectoryMenuBlade/RegisteredApps) | [link](https://account.live.com/consent/Manage)| 2| 
[Mixcloud](https://www.mixcloud.com/developers/) | [link](https://www.mixcloud.com/developers/create/) | [link](https://www.mixcloud.com/settings/applications/)| 2| 
[MusicBrainz](https://musicbrainz.org/doc/Development) | [link](https://musicbrainz.org/account/applications) | [link](https://musicbrainz.org/account/applications)| 2| 
[NPROne](https://dev.npr.org/api/) | [link](https://dev.npr.org/console) | | 2| 
[OpenCaching](https://www.opencaching.de/okapi/) | [link](https://www.opencaching.de/okapi/signup.html) | [link](https://www.opencaching.de/okapi/apps/)| 1| 
[OpenStreetmap](https://wiki.openstreetmap.org/wiki/API) | [link](https://www.openstreetmap.org/user/{USERNAME}/oauth_clients) | | 1| 
[Patreon1](https://docs.patreon.com/) | [link](https://www.patreon.com/portal/registration/register-clients) | | 2| 
[Patreon2](https://docs.patreon.com/) | [link](https://www.patreon.com/portal/registration/register-clients) | | 2| 
[PayPal](https://developer.paypal.com/docs/connect-with-paypal/reference/) | [link](https://developer.paypal.com/developer/applications/) | | 2| ✓
[PayPalSandbox](https://developer.paypal.com/docs/connect-with-paypal/reference/) | [link](https://developer.paypal.com/developer/applications/) | | 2| ✓
[Slack](https://api.slack.com) | [link](https://api.slack.com/apps) | [link](https://slack.com/apps/manage)| 2| 
[SoundCloud](https://developers.soundcloud.com/) | [link](https://soundcloud.com/you/apps) | [link](https://soundcloud.com/settings/connections)| 2| 
[Spotify](https://developer.spotify.com/documentation/web-api/) | [link](https://developer.spotify.com/dashboard/applications) | [link](https://www.spotify.com/account/apps/)| 2| ✓
[Stripe](https://stripe.com/docs/api) | [link](https://dashboard.stripe.com/apikeys) | [link](https://dashboard.stripe.com/account/applications)| 2| 
[Tumblr](https://www.tumblr.com/docs/en/api/v2) | [link](https://www.tumblr.com/oauth/apps) | [link](https://www.tumblr.com/settings/apps)| 1| 
[Twitch](https://dev.twitch.tv/docs/api/reference/) | [link](https://dev.twitch.tv/console/apps/create) | [link](https://www.twitch.tv/settings/connections)| 2| ✓
[Twitter](https://developer.twitter.com/docs) | [link](https://developer.twitter.com/apps) | [link](https://twitter.com/settings/applications)| 1| 
[TwitterCC](https://developer.twitter.com/en/docs/basics/authentication/overview/application-only) | [link](https://developer.twitter.com/apps) | [link](https://twitter.com/settings/applications)| 2| ✓
[Vimeo](https://developer.vimeo.com) | [link](https://developer.vimeo.com/apps) | [link](https://vimeo.com/settings/apps)| 2| ✓
[Wordpress](https://developer.wordpress.com/docs/api/) | [link](https://developer.wordpress.com/apps/) | [link](https://wordpress.com/me/security/connected-applications)| 2| 
<!--O-->

# Disclaimer
OAuth tokens are secrets and should be treated as such. Store them in a safe place,
[consider encryption](http://php.net/manual/book.sodium.php).<br/>
I won't take responsibility for stolen auth tokens. Use at your own risk.
