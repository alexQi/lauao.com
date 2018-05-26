<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\modules\admin\models\form\Signup */
/* @var $extendModel \common\models\UserExtend */

$this->title                   = Yii::t('rbac-admin', 'Signup');
$this->params['breadcrumbs'][] = ['label' => '用户列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>
            </div>
            <div class="box-body">
                <?=$this->render('_form', [
                    'model'       => $model,
                    'extendModel' => $extendModel
                ])?>
            </div>
        </div>
    </div>
</div>
