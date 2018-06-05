<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'typo3_schedulertask_add-multiple-language',
    'description' => 'This repository should make a problem with multiple languages in a typo3 scheduler tasks reproducible.',
    'category' => 'be',
    'state' => 'beta',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'scheduler' => '8.7.0-8.7.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
