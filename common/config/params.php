<?php
return [
    'adminEmail' => 'alex.qiubo@qq.com',
    'supportEmail' => 'alex.qiubo@qq.com',
    'user.passwordResetTokenExpire' => 3600,

    //upload file path
    'uploadPath'=>'../../upload/',

    'qiniu' =>  [
        'uploadUrl' => 'ztwliot.com',
        'AccessKey' => 'LiJibjRU035QFfsgqAR6nLbMCJx7xX3S1ffRvh5T',
        'SecretKey' => 'gXiK83RjjTluvOCjz4gG8fcojZUPMWXB63BzVwmF',
        'style' => [
            '300x200' => 'imageView2/1/w/300/h/200/q/70|imageslim',
        ]
    ],
    'aliyun' => [
        'AppKey'    => '24518974',
        'AppSecret' => '4c4b5438b808bc809b173f55a906427e',
        'AppCode'   => '234ca6323b9445f9b54f5b4aeda08deb',
    ],
    'turing' => [
        'APIkey'    => '25648c697a2a4a44b4bfe6a20e6651af',
        'secret'    => '9a04fb1dc3c066c8ONOFF',
    ],
];
