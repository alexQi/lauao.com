<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2018/5/15
 * Time: 23:10
 */
namespace backend\modules\admin\components;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;
/**
 * Class LauaoActionColumn
 *
 * @package backend\modules\admin\components
 */
class LauaoActionColumn extends ActionColumn{

    /**
     * overwirte initButton
     * @param string $name
     * @param string $iconName
     * @param array $additionalOptions
     */
    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                switch ($name) {
                    case 'view':
                        $title = Yii::t('yii', 'View');
                        $class = "btn btn-sm margin-r-5 btn-primary";
                        break;
                    case 'update':
                        $title = Yii::t('yii', 'Update');
                        $class = "btn btn-sm margin-r-5 btn-warning";
                        break;
                    case 'delete':
                        $title = Yii::t('yii', 'Delete');
                        $class = "btn btn-sm margin-r-5 btn-danger";
                        break;
                    default:
                        $title = ucfirst($name);
                }
                $this->buttonOptions['class'] = $class;
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                return Html::a($icon, $url, $options);
            };
        }
    }
}