<?php
/**
 * Class MailChimpEndpoints
 *
 * @filesource   MailChimpEndpoints.php
 * @created      16.08.2018
 * @package      chillerlan\OAuth\Providers\MailChimp
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\MailChimp;

use chillerlan\HTTP\MagicAPI\EndpointMap;

/**
 * in case you're bored:
 *
 * @link http://developer.mailchimp.com/documentation/mailchimp/reference/overview/
 */
class MailChimpEndpoints extends EndpointMap{

	/************
	 * API Root *
	 ************/

	/**
	 * @link http://developer.mailchimp.com/documentation/mailchimp/reference/root/#read-get_root
	 */
	protected $root = [
		'path'          => '/',
		'method'        => 'GET',
		'query'         => ['fields', 'exclude_fields'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/*******************
	 * Authorized Apps *
	 *******************/

	/**
	 * @link http://developer.mailchimp.com/documentation/mailchimp/reference/authorized-apps/#create-post_authorized_apps
	 */
	protected $createAuthorizedApp = [
		'path'          => '/authorized-apps',
		'method'        => 'POST',
		'query'         => [],
		'path_elements' => [],
		'body'          => ['client_id', 'client_secret'],
		'headers'       => [],
	];

	/**
	 * @link http://developer.mailchimp.com/documentation/mailchimp/reference/authorized-apps/#read-get_authorized_apps
	 */
	protected $getAuthorizedAppList = [
		'path'          => '/authorized-apps',
		'method'        => 'GET',
		'query'         => ['fields', 'exclude_fields', 'count', 'offset'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

	/**
	 * @link http://developer.mailchimp.com/documentation/mailchimp/reference/authorized-apps/#read-get_authorized_apps_app_id
	 */
	protected $getAuthorizedApp = [
		'path'          => '/authorized-apps/%1$s',
		'method'        => 'GET',
		'query'         => ['fields', 'exclude_fields'],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];



	// ...


	/**
	 * @link http://developer.mailchimp.com/documentation/mailchimp/reference/ping/#read-get_ping
	 */
	protected $ping = [
		'path'          => '/ping',
		'method'        => 'GET',
		'query'         => [],
		'path_elements' => [],
		'body'          => null,
		'headers'       => [],
	];

}
