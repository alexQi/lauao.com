<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-6-25
 * Time: 上午11:32
 */

return [
    'wechat' => array(
        'AppID'     => 'wxa6d88347eb94a706',
        'AppSecret' => '887361f0b8859314260993b5767ee6ac',
        'Token'     => 'woshishei',
        'ApiUrl'    => 'hk.api.weixin.qq.com',
        'EncodingAESKey' => 'xrgnBv8pkwnbIN9EOfhWa96PaEsJURRnF5dK4aYgLM1',
        'getToken'  => 'https://api.weixin.qq.com/cgi-bin/token',
        'tpl'       => require(__DIR__ . '/tpl.php'),
    ),
];