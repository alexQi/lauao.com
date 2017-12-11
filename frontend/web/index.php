<?php
defined('YII_ENV') or define('YII_ENV', get_cfg_var('site_mode'));

if (YII_ENV=='development')
{
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    ini_set("display_errors", "On");
    error_reporting(E_ALL);
}else{
    defined('YII_DEBUG') or define('YII_DEBUG', false);
}

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-extend.php')
);

$application = new yii\web\Application($config);
$application->language = isset($_COOKIE['language']) ? ($_COOKIE['language']) : 'zh-CN';
$application->run();
