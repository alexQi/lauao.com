<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {
    public $basePath = '@backend/web';
    public $css      = [
        'css/site.css',
    ];
    public $js       = [
        'js/public.js',
        'js/bootbox.js',
        'js/site.js',
    ];

    public $jsOptions = [
        'position' => View::POS_BEGIN,
    ];

    public $depends = [
//        'backend\assets\MyYiiAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
