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
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/datepicker';

    public $js = [
        'bootstrap-datepicker.js',
        'locales/bootstrap-datepicker.zh-CN.js'
    ];

    public $css = [
        'datepicker3.css'
    ];

    public $jsOptions = [
        'position' => View::POS_BEGIN,
    ];
}
