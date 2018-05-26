<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2018/5/26
 * Time: 18:23
 */
namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Class MyYiiAsset
 *
 * @package backend\assets
 */
class MyYiiAsset extends AssetBundle
{
    public $sourcePath = '@yii/assets';
    public $js = [
        'yii.js',
    ];

    public $depends = [
        'backend\assets\MyJqueryAsset',
    ];
}