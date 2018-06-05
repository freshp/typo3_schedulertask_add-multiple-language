<?php
declare(strict_types=1);

namespace Freshp\Typo3SchedulertaskAddMultipleLanguage\Factory;

use Freshp\Typo3SchedulertaskAddMultipleLanguage\Statics\ExtensionStatics;
use TYPO3\CMS\Lang\Domain\Model\Language;

final class DefaultLanguageFactory
{
    public static function create(): Language
    {
        $language = new Language('de', 'deutsch');
        $language->_setProperty('uid', ExtensionStatics::DEFAULT_LANGUAGE_ID);

        return $language;
    }
}
