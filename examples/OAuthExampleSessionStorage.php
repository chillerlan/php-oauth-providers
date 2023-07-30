<?php
/**
 * Class OAuthExampleSessionStorage
 *
 * @created      26.07.2019
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2019 smiley
 * @license      MIT
 */

namespace chillerlan\OAuthExamples;

use chillerlan\OAuth\Core\AccessToken;
use chillerlan\OAuth\Storage\{OAuthStorageException, SessionStorage};
use chillerlan\Settings\SettingsContainerInterface;

use function file_exists, file_get_contents, file_put_contents, sprintf;

class OAuthExampleSessionStorage extends SessionStorage{

	protected string $storagepath;

	/**
	 * OAuthExampleSessionStorage constructor.
	 *
	 * @param \chillerlan\Settings\SettingsContainerInterface|null $options
	 * @param string|null                                          $storagepath
	 */
	public function __construct(SettingsContainerInterface $options = null, string $storagepath = null){
		parent::__construct($options);

		$this->storagepath = $storagepath ?? __DIR__;
	}

	/**
	 * @inheritDoc
	 */
	public function storeAccessToken(AccessToken $token, string $service = null):static{
		parent::storeAccessToken($token, $service);

		$tokenfile = sprintf('%s/%s.token.json', $this->storagepath, $this->getServiceName($service));

		if(file_put_contents($tokenfile, $token->toJSON()) === false){
			throw new OAuthStorageException('unable to access file storage');
		}

		return $this;
	}

	/**
	 * @inheritDoc
	 * @phan-suppress PhanTypeMismatchReturnSuperType
	 */
	public function getAccessToken(string $service = null):AccessToken{
		$service = $this->getServiceName($service);

		if($this->hasAccessToken($service)){
			return (new AccessToken)->fromJSON($_SESSION[$this->tokenVar][$service]);
		}

		$tokenfile = sprintf('%s/%s.token.json', $this->storagepath, $service);

		if(file_exists($tokenfile)){
			return (new AccessToken)->fromJSON(file_get_contents($tokenfile));
		}

		throw new OAuthStorageException('token not found');
	}

}
