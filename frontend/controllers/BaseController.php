<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-7-11
 * Time: 下午2:46
 */
namespace frontend\controllers;

use yii\web\Controller;
use common\components\MyBehavior;
use yii\web\ForbiddenHttpException;

class BaseController extends Controller
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['MyBehavior'] = [
            'class' => MyBehavior::className(),
            'queryParam' => 'queryParam'
        ];

        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST==false ? 'testme' : null,
            ],
        ];
    }

    public function init()
    {
        parent::init(); // TODO: 继承父类
    }
}