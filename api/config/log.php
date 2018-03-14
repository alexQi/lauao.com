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
            'categories' => ['log.data'],
            'logFile' => '@app/runtime/logs/data/info.log',
            'maxFileSize' => 1024 * 2,
            'maxLogFiles' => 20,
        ],
    ],
];