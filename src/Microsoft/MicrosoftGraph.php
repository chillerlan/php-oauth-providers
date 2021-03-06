<?php
/**
 * Class MicrosoftGraph
 *
 * @link https://docs.microsoft.com/graph/permissions-reference
 *
 * @created      30.07.2019
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

	protected array $defaultScopes = [
		self::SCOPE_OPENID,
		self::SCOPE_OPENID_EMAIL,
		self::SCOPE_OPENID_PROFILE,
		self::SCOPE_OFFLINE_ACCESS,
		self::SCOPE_USER_READ,
		self::SCOPE_USER_READBASIC_ALL,
	];

}
