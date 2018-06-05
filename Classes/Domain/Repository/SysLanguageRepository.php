<?php
declare(strict_types=1);

namespace Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Repository;

use Freshp\Typo3SchedulertaskAddMultipleLanguage\Factory\SysLanguageFactory;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Lang\Domain\Model\Language;

class SysLanguageRepository extends AbstractRepository
{
    private $tableName = 'sys_language';

    /**
     * @return Language[]
     */
    public function findAll(): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable($this->tableName);

        $queryBuilder->resetRestrictions();

        $results = $queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where($queryBuilder->expr()->eq('hidden', 0))
            ->execute()
            ->fetchAll();

        $languages = [];
        foreach ($results as $result) {
            $temp = SysLanguageFactory::create($result);
            if (null !== $temp) {
                $languages[] = $temp;
            }
        }

        return $languages;
    }
}
