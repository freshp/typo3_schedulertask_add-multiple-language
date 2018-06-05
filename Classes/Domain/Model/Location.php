<?php
declare(strict_types=1);

namespace Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Location extends AbstractEntity
{
    /**
     * @var string
     */
    protected $apiId = '';

    /**
     * @var string
     */
    protected $address = '';

    /**
     * @var string
     */
    protected $countryCode = '';

    /**
     * @var string
     */
    protected $postalCode = '';

    /**
     * @var string
     */
    protected $province = '';

    /**
     * @var string
     */
    protected $town = '';

    /**
     * @var \Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Model\Coordinate
     */
    protected $coordinate;

    /**
     * @var int
     */
    protected $_languageUid = 0;

    /**
     * @var int
     */
    protected $l10nParent = 0;

    public function getApiId(): string
    {
        return $this->apiId;
    }

    public function setApiId(string $apiId): void
    {
        $this->apiId = $apiId;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postCode): void
    {
        $this->postalCode = $postCode;
    }

    public function getProvince(): string
    {
        return $this->province;
    }

    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    public function getTown(): string
    {
        return $this->town;
    }

    public function setTown(string $town): void
    {
        $this->town = $town;
    }

    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    public function setCoordinate(Coordinate $coordinate): void
    {
        $this->coordinate = $coordinate;
    }

    public function get_languageUid(): int
    {
        return $this->_languageUid;
    }

    public function set_languageUid(int $sysLanguageUid): void
    {
        $this->_languageUid = $sysLanguageUid;
    }

    public function getL10nParent(): int
    {
        return $this->l10nParent;
    }

    public function setL10nParent(int $l10nParent): void
    {
        $this->l10nParent = $l10nParent;
    }
}
