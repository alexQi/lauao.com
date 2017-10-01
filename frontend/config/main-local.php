<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'UYwvohFv91UUJysCC7xblfOaVvJ6A8xz',
        ],
        'wechat' => [
            'class' => 'common\models\Pay\Wechat',
            'appId' => 'wxcb2711060169adca',
            'appSecret' => '5d25144ef3458d13f407e54968fc6856',
            'token' => ' ',
            'partnerId' => '1446794902',
            'partnerKey' => 'ahwealth5sdwaddfiuek525swddtesds',
        ],
    ],
    'modules' => [
        'site' => [
            'class' => 'frontend\modules\site\Module',
        ],
        'ajax' => [
            'class' => 'frontend\modules\ajax\Module',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '172.17.0.*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '172.17.0.*'],
    ];
}

return $config;
