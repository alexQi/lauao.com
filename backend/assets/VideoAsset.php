<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class VideoAsset extends AppAsset
{
    public $sourcePath = "@backend/web";
    public $css = [
        'plug-in/video6.2.5.js/css/video-js.css',
    ];
    public $js = [
        'plug-in/video6.2.5.js/js/video.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_BEGIN,
    ];
}
