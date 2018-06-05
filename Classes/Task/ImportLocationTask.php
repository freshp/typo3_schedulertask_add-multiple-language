<?php
declare(strict_types=1);

namespace Freshp\Typo3SchedulertaskAddMultipleLanguage\Task;

use Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Repository\LocationRepository;
use Freshp\Typo3SchedulertaskAddMultipleLanguage\Domain\Repository\SysLanguageRepository;
use Freshp\Typo3SchedulertaskAddMultipleLanguage\Factory\DefaultLanguageFactory;
use Freshp\Typo3SchedulertaskAddMultipleLanguage\Service\ImportLocationService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Scheduler\Task\AbstractTask;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class ImportLocationTask extends AbstractTask
{
    public function execute(): bool
    {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $sysLanguageRepository = $objectManager->get(SysLanguageRepository::class);
        $languages = array_merge_recursive([DefaultLanguageFactory::create()], $sysLanguageRepository->findAll());

        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($languages);

        $importOfficeService = new ImportLocationService(
            $objectManager->get(PersistenceManager::class),
            $objectManager->get(LocationRepository::class)
        );

        $importOfficeService->run($languages);

        return true;
    }
}
