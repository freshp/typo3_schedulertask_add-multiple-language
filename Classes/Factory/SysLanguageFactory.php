<?php
declare(strict_types=1);

namespace Freshp\Typo3SchedulertaskAddMultipleLanguage\Factory;

use TYPO3\CMS\Lang\Domain\Model\Language;

final class SysLanguageFactory
{
    public static function create(array $languageRecordRow): ?Language
    {
        if (false === self::valid($languageRecordRow)) {
            return null;
        }

        $language = new Language($languageRecordRow['language_isocode'], $languageRecordRow['title']);
        $language->_setProperty('uid', $languageRecordRow['uid']);

        return $language;
    }

    private static function valid(array $languageRecordRow): bool
    {
        return true === isset(
                $languageRecordRow['uid'],
                $languageRecordRow['language_isocode'],
                $languageRecordRow['title']
            );
    }
}
