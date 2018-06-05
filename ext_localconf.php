<?php
defined('TYPO3_MODE') or die();

use \Freshp\Typo3SchedulertaskAddMultipleLanguage\Task\ImportLocationTask;

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][ImportLocationTask::class] = [
    'extension' => 'typo3_schedulertask_add-multiple-language',
    'title' => 'Import Locations',
    'description' => 'no description available',
];
