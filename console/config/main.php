<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
        'worker'=>[
            'class' => 'console\controllers\WorkerController',
        ],
        'cons'=>[
            'class' => 'console\controllers\ConsController',
        ]

    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn'   => 'mysql:host=www.oliu.online;dbname=zcg;port=3306',
            'username' => 'alex',
            'password' => 'woshishei',
            'charset'  => 'utf8',
            'tablePrefix' => 'pre_',
            'commandClass'=> "common\components\Command",
        ],
    ],
    'params' => $params,
];
