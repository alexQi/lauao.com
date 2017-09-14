<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language'=> 'zh-CN',
    'homeUrl' => '/site/default/index',
    "modules" => [
        "activity" => [
            "class" => "backend\modules\activity\Module",
        ],
        "admin" => [
            "class" => "backend\modules\admin\Module",
        ],
        'site' => [
            'class' => 'backend\modules\site\Module',
        ],
        'message' => [
            'class' => 'backend\modules\message\Module',
        ],
        'ajax' => [
            'class' => 'backend\modules\ajax\Module',
        ],
        'product' => [
            'class' => 'backend\modules\product\Module',
        ],
        'api' => [
            'class' => 'backend\modules\api\Module',
        ],
        'log' => [
            'class' => 'backend\modules\log\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars'=> [],//被收集记录的额外数据如'logVars'=>['_GET','_POST','_FILES','_COOKIE','_SESSION','_SERVER'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => '/site/default/error',
        ],
        "urlManager" => [
            //用于表明urlManager是否启用URL美化功能，在Yii1.1中称为path格式URL，
            // Yii2.0中改称美化。
            // 默认不启用。但实际使用中，特别是产品环境，一般都会启用。
            "enablePrettyUrl" => true,
            // 是否启用严格解析，如启用严格解析，要求当前请求应至少匹配1个路由规则，
            // 否则认为是无效路由。
            // 这个选项仅在 enablePrettyUrl 启用后才有效。
            "enableStrictParsing" => false,
            // 是否在URL中显示入口脚本。是对美化功能的进一步补充。
            "showScriptName" => false,
            // 指定续接在URL后面的一个后缀，如 .html 之类的。仅在 enablePrettyUrl 启用时有效。
            "suffix" => "",
            "rules" => [
                "<controller:\w+>/<id:\d+>.html"=>"<controller>/view",
                "<controller:\w+>/<action:\w+>.html"=>"<controller>/<action>",
                "<module:\w+>/<controller:\w+>/<id:\d+>.html"=>"<module>/<controller>/view",
                "<module:\w+>/<controller:\w+>/<action:\w+>.html"=>"<module>/<controller>/<action>"
            ],
        ],

        "authManager" => [
            "class" => 'yii\rbac\DbManager', //这里记得用单引号而不是双引号
            "defaultRoles" => ["guest"],
        ],
    ],
    'as access' => [
        'class' => 'backend\modules\admin\components\AccessControl',
        'allowActions' => [
            //这里是允许访问的action
            //controller/action
            '*'
        ],
    ],
    'params' => $params,
    'name'=>'OLIU后台管理',
];
