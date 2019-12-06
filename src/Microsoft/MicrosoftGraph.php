<?php
/**
 * Class MicrosoftGraph
 *
 * @link https://docs.microsoft.com/graph/permissions-reference
 *
 * @filesource   MicrosoftGraph.php
 * @created      30.07.2019
 * @package      chillerlan\OAuth\Providers\Microsoft
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuth\Providers\Microsoft;

/**
 * @method \Psr\Http\Message\ResponseInterface me()
 */
class MicrosoftGraph extends AzureActiveDirectory{

	public const SCOPE_USER_READ = 'User.Read';
	public const SCOPE_USER_READBASIC_ALL = 'User.ReadBasic.All';

	protected ?string $apiURL      = 'https://graph.microsoft.com';
	protected ?string $apiDocs     = 'https://docs.microsoft.com/graph/overview';
	protected ?string $endpointMap = MicrosoftGraphEndpoints::class;

}
