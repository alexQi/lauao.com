<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-7-11
 * Time: 下午5:30
 */
namespace common\components;

use yii;
use yii\base\Behavior;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class MyBehavior Extends Behavior
{
    public $queryParam;

    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'handleRequest',
        ];
    }

    /**
     * 处理request参数
     *
     * @return array
     */
    public function handleRequest(){

        $GetData  = yii::$app->request->get();
        $PostData = yii::$app->request->post();

        return $this->queryParam = ArrayHelper::merge($PostData,$GetData);
    }
}