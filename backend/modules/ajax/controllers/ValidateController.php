<?php
namespace backend\modules\ajax\controllers;

use backend\modules\admin\models\form\ChangePassword;
use yii\widgets\ActiveForm;
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2018/5/26
 * Time: 12:45
 */
class ValidateController extends BaseController
{
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
}