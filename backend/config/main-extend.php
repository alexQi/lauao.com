<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9ZAHp-HBXWXdXd03DukejzEDv0CAXrWk',
        ],
    ],
    'as access' => [
        'class' => 'backend\modules\admin\components\AccessControl',
        'allowActions' => [
            //这里是允许访问的action *代表所有
            'debug/default/*',
            'ajax/*'
//            '*',
        ],
    ],
    'on beforeRequest' => function($event) {
        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(), \yii\db\BaseActiveRecord::EVENT_AFTER_UPDATE, ['backend\components\AdminLog', 'write']);
        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(), \yii\db\BaseActiveRecord::EVENT_AFTER_DELETE, ['backend\components\AdminLog', 'write']);
        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(), \yii\db\BaseActiveRecord::EVENT_AFTER_INSERT, ['backend\components\AdminLog', 'write']);
    },
];

if (YII_ENV) {
    // configuration adjustments for 'dev' environment
    $config['as access']['allowActions'][] = 'gii/*';
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1'],
        'generators' => [
            'crud' => [ //生成器名称
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [ //设置我们自己的模板
                    //模板名 => 模板路径
                    'Oliu-template' => '@app/gii-template/default',
                ]
            ]
        ]
    ];
}

return $config;
