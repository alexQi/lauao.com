<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'BKNSxD-1-Amlw2f-pe5w32nxTZd-nFkq',
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;

                if (
                    $response->data !== null && $response->isSuccessful == false
                    && !empty( Yii::$app->request->get('suppress_response_code') )
                ) {
                    $response->data = [
                        'errcode' => $response->data['status'],
                        'errmsg' => $response->data['message'],
                        'data' => $response->data,
                    ];
                }
            },
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'db'  => require(__DIR__ . '/db.php'),
        'log' => require(__DIR__ . '/log.php'),
        'urlManager' => require(__DIR__ . '/url.php'),
    ],
    'params' => $params,
];
