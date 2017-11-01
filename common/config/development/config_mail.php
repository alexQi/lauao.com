<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017/11/1
 * Time: 22:32
 */

return [
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
];