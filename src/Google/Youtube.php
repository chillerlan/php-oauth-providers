<?php
/**
 * Class Youtube
 *
 * @filesource   Youtube.php
 * @created      09.08.2018
 * @package      chillerlan\OAuth\Providers\Google
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2018 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Google;

/**
 */
class Youtube extends Google{

	public const SCOPE_YOUTUBE       = 'https://www.googleapis.com/auth/youtube';
	public const SCOPE_YOUTUBE_GDATA = 'https://gdata.youtube.com';

	protected $endpointMap        = YoutubeEndpoints::class;

}
