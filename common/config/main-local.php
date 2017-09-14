<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn'   => 'mysql:host=127.0.0.1;dbname=zcg;port=3306',
            'username' => 'root',
            'password' => 'root',
            'charset'  => 'utf8',
            'tablePrefix' => 'pre_',
        ],
        'mailer' =>[
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail', //指定邮件模版路径
            //false：非测试状态，发送真实邮件而非存储为文件
            'useFileTransport' => false,
            'transport'=>[
                'class' => 'Swift_SmtpTransport',
                'host' =>'smtp.qq.com',
                'username' => 'alex.qiubo@qq.com',
                'password' => 'woshishei@1',          //163邮箱的客户端授权密码
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'beanstalk'=>[
            'class' => 'common\components\yii2beanstalk\Beanstalk',
            'host'=> "127.0.0.1", // default host
            'port'=>11300, //default port
            'connectTimeout'=> 1,
            'sleep' => false, // or int for usleep after every job
        ],
    ],
];
