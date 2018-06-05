<?php
declare(strict_types=1);

namespace Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Repository;

use Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Model\Location;
use TYPO3\CMS\Extbase\Persistence\Repository;

class LocationRepository extends Repository
{
    public function findOneByApiIdAndSysLanguageId(string $apiId, int $languageUid): ?Location
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setIgnoreEnableFields(true);
        $query->getQuerySettings()->setRespectSysLanguage(false);

        $query->matching(
            $query->logicalAnd(
                $query->equals('api_id', $apiId),
                $query->equals('sys_language_uid', $languageUid)
            )
        );

        return $query->execute()->getFirst();
    }
}
