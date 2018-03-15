<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-restful',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'restful\controllers',
    'defaultRoute' => 'index',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-restful',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the restful
            'name' => 'advanced-restful',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'error'],
                    'categories' => ['restful.message'],
                    'logFile' => '@app/runtime/logs/restful/data.log',
                    'maxFileSize' => 2048,
                    'maxLogFiles' => 20,
                    'logVars' => [],
                ],
            ],
        ],
        'errorHandler' => [
//            'errorAction' => 'yii\web\Error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' =>true,
            'rules' => [

            ],
        ],
    ],
    'params' => $params,
];
