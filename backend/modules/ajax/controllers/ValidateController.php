<?php
namespace backend\modules\ajax\controllers;

use yii;
use yii\web\Response;
use yii\widgets\ActiveForm;
use backend\modules\admin\models\form\ChangePassword;
use backend\models\LoginForm;
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2018/5/26
 * Time: 12:45
 */
class ValidateController extends BaseController
{
    public function init(){
        //Format IO data
        yii::$app->response->format = Response::FORMAT_JSON;

        $this->postData   = Yii::$app->request->post();
        $this->getData    = Yii::$app->request->get();
    }
    /**
     * 异步验证修改密码提交的数据是否正确
     * @return array
     */
    public function actionValidateChangePassForm()
    {
        $model = new ChangePassword();
        $model->load($this->postData);
        return ActiveForm::validate($model);
    }

    /**
     * 异步验证登陆数据
     * @return array
     */
    public function actionValidateLoginForm(){
        $model = new LoginForm();
        $model->load($this->postData);
        return ActiveForm::validate($model);
    }
}