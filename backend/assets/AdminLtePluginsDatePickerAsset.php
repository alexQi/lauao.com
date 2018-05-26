<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset bundle for the Twitter bootstrap css files.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminLtePluginsDatePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/';

    public $js = [
        'js/bootstrap-datepicker.js',
        'locales/bootstrap-datepicker.zh-CN.min.js'
    ];

    public $css = [
        'css/bootstrap-datepicker.min.css'
    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];
}
