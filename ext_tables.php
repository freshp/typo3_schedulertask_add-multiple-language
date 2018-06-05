<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_typo3schedulertaskaddmultiplelanguage_domain_model_location'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_typo3schedulertaskaddmultiplelanguage_domain_model_coordinate'
        );
    }
);
