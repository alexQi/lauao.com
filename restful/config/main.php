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
    'homeUrl' => '/system/user/user-list',
    'defaultRoute' => 'system',
    'components' => [
        'log' => require 'log.php',
//        'errorHandler' => [
//            'errorAction' => '/site/site/error',
//        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,

            'enableSession' => false,
            'loginUrl' => null,

        ],
        "urlManager" => [
            // Yii2.0中改称美化。
            // 默认不启用。但实际使用中，特别是产品环境，一般都会启用。
            "enablePrettyUrl" => true,
            // 是否启用严格解析，如启用严格解析，要求当前请求应至少匹配1个路由规则，
            // 否则认为是无效路由。
            // 这个选项仅在 enablePrettyUrl 启用后才有效。
            "enableStrictParsing" => true,
            // 是否在URL中显示入口脚本。是对美化功能的进一步补充。
            "showScriptName" => false,
            // 指定续接在URL后面的一个后缀，如 .html 之类的。仅在 enablePrettyUrl 启用时有效。
            "suffix" => "",
            "rules" => [
//                "<controller:\w+>/<id:\d+>.html"=>"<controller>/view",
//                "<controller:\w+>/<action:\w+>.html"=>"<controller>/<action>",
//                "<module:\w+>/<controller:\w+>/<id:\d+>.html"=>"<module>/<controller>/view",
//                "<module:\w+>/<controller:\w+>/<action:\w+>.html"=>"<module>/<controller>/<action>",

                //restful route
                // request like this : http://restful.lauao.test/system/apply-users/list
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'system/apply-user',
                    'extraPatterns' => [
                        'GET list' => 'user-list',
                        'GET info' => 'search-apply-user',
                    ],
                ],
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'system/auth',
                    'extraPatterns' => [
                        'POST session' => 'get-session',
                        'POST descrypt' => 'descrypt-data'
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
