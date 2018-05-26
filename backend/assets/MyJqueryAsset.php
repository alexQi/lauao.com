<?php
namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * Class MyJqueryAsset
 *
 * @package backend\assets
 */
class MyJqueryAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery/dist';
    public $js = [
        'jquery.min.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}