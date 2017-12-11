<?php
if (YII_ENV=='development')
{
    $director = 'development';
}else{
    $director = 'production';
}

return [
    'language' =>'zh-CN',//默认使用中文
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
//                     'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'zcg.php',
                    ],
                ],
            ],
        ],
        'formatter' => [ //for the showing of date datetime
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'CNY',
        ],
        'db'       => require(__DIR__ . '/'.$director.'/config_db.php'),
        'mailer'   => require(__DIR__ . '/'.$director.'/config_mail.php'),
        'redis'    => require(__DIR__ . '/'.$director.'/config_redis.php'),
        'beanstalk'=> require(__DIR__ . '/'.$director.'/config_beanstalk.php'),
    ],
];
