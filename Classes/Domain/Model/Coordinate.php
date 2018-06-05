<?php
declare(strict_types=1);

namespace Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Coordinate extends AbstractEntity
{
    /**
     * @var float
     */
    protected $latitude = 0.0;

    /**
     * @var float
     */
    protected $longitude = 0.0;

    /**
     * @var int
     */
    protected $_languageUid = 0;

    /**
     * @var int
     */
    protected $l10nParent = 0;

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
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
