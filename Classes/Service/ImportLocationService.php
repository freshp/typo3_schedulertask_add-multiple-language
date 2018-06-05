<?php
declare(strict_types=1);

namespace Freshp\Typo3SchedulertaskAddMultipleLanguage\Service;

use Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Model\Coordinate;
use Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Model\Location;
use Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Repository\LocationRepository;
use Freshp\Typo3SchedulertaskAddMultipleLanguage\Statics\ExtensionStatics;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Lang\Domain\Model\Language;

final class ImportLocationService
{
    private $persistenceManager;
    private $locationRepository;

    public function __construct(PersistenceManager $persistenceManager, LocationRepository $locationRepository)
    {
        $this->persistenceManager = $persistenceManager;
        $this->locationRepository = $locationRepository;
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException
     */
    public function run(array $languages, int $targetTypo3Pid = 0): void
    {
        /** @var Language $language */
        foreach ($languages as $language) {
            if (false === $language instanceof Language) {
                continue;
            }

            $content = file_get_contents(
                sprintf(
                    '%s/../../Tests/Fixtures/Api/%s.api.json',
                    __DIR__,
                    $language->getLocale()
                )
            );
            $locations = json_decode($content, true);

            foreach ($locations as $location) {
                \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($location);
                $knownLocation = $this->locationRepository->findOneByApiIdAndSysLanguageId(
                    $location['apiId'],
                    $language->getUid()
                );

                $parentElement = null;
                if (ExtensionStatics::DEFAULT_LANGUAGE_ID !== $language->getUid()) {
                    $parentElement = $this->locationRepository->findOneByApiIdAndSysLanguageId(
                        $location['apiId'],
                        ExtensionStatics::DEFAULT_LANGUAGE_ID
                    );
                }

                $mappedData = $this->mapData(
                    $location,
                    $language->getUid(),
                    $targetTypo3Pid,
                    $knownLocation,
                    $parentElement
                );

                $this->persistOffice($mappedData, null === $knownLocation);
            }
        }
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException
     */
    private function persistOffice(Location $location, ?bool $isNew): void
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($location);
        if (true === $isNew) {
            $this->locationRepository->add($location);
            $this->persistenceManager->persistAll();

            return;
        }

        $this->locationRepository->update($location);
        $this->persistenceManager->persistAll();
    }

    private function mapData(
        array $location,
        int $sysLanguageUid,
        int $targetPid,
        ?Location $knownLocation = null,
        ?Location $parentElement = null
    ): Location {
        $new = false;
        if (null === $knownLocation) {
            $new = true;
            $knownLocation = new Location();
            $knownLocation->setApiId($location['apiId']);
        }

        $knownLocation->set_languageUid($sysLanguageUid);
        if (null !== $parentElement) {
            $knownLocation->setL10nParent($parentElement->getUid());
        }

        $knownLocation->setPid($targetPid);
        $knownLocation->setAddress($location['address']);
        $knownLocation->setCountryCode($location['countryCode']);
        $knownLocation->setPostalCode($location['postCode']);
        $knownLocation->setProvince($location['province']);
        $knownLocation->setTown($location['town']);

        if (true === $new) {
            $coordinate = new Coordinate();
            $knownLocation->setCoordinate($coordinate);
        }

        $coordinate = $knownLocation->getCoordinate();
        $coordinate->set_languageUid($sysLanguageUid);
        if (null !== $parentElement) {
            $coordinate->setL10nParent($parentElement->getCoordinate()->getUid());
        }

        $coordinate->setLatitude($location['coordinate']['latitude']);
        $coordinate->setLongitude($location['coordinate']['longitude']);
        $knownLocation->setCoordinate($coordinate);

        return $knownLocation;
    }
}
