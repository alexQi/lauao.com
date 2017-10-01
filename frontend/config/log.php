<?php
return [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
            'logVars' => [],
        ],
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['info'],
            'categories' => ['entryway'],
            'logFile' => '@frontend/runtime/logs/entryway.log',
            'maxFileSize' => 1024 * 2,
            'maxLogFiles' => 20,
        ],
        [
        'class' => 'yii\log\FileTarget',
        'levels' => ['info'],
        'categories' => ['entryway_error'],
        'logFile' => '@frontend/runtime/logs/entryway_error.log',
        'maxFileSize' => 1024 * 2,
        'maxLogFiles' => 20,
    ]
    ],
];

?>