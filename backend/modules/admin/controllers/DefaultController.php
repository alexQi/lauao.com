<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17-7-19
 * Time: 下午4:10
 */
namespace backend\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex(){
        echo 'this is default action';
    }
}