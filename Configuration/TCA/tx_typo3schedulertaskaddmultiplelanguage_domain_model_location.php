<?php
return [
    'ctrl' => [
        'title' => 'Location',
        'label' => 'address',
        'label_alt' => 'town, postal_code',
        'label_alt_force' => 1,
        'hideTable' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'api_id,address,country_code,postal_code,province,town,coordinate',
    ],
    'interface' => [
        'showRecordFieldList' => 'api_id, hidden, address, country_code, postal_code, province, town, coordinate',
    ],
    'types' => [
        '1' => ['showitem' => 'api_id, hidden, address, country_code, postal_code, province, town, coordinate, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'readOnly' => 1,
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'readOnly' => 1,
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_typo3schedulertaskaddmultiplelanguage_domain_model_location',
                'foreign_table_where' => 'AND tx_typo3schedulertaskaddmultiplelanguage_domain_model_location.pid=###CURRENT_PID### AND tx_typo3schedulertaskaddmultiplelanguage_domain_model_location.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'api_id' => [
            'exclude' => false,
            'label' => 'api_id',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'address' => [
            'exclude' => false,
            'label' => 'address',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'country_code' => [
            'exclude' => false,
            'label' => 'country_code',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'postal_code' => [
            'exclude' => false,
            'label' => 'postal_code',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'province' => [
            'exclude' => false,
            'label' => 'province',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'town' => [
            'exclude' => false,
            'label' => 'town',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'coordinate' => [
            'exclude' => false,
            'label' => 'coordinate',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_typo3schedulertaskaddmultiplelanguage_domain_model_coordinate',
                'minitems' => 0,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'enabledControls' => [
                        'new' => false,
                        'delete' => false,
                        'hide' => false,
                    ],
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],

    ],
];
