<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplyRecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apply-record-search">
    <div class="row margin">
    <?php $form = ActiveForm::begin([
        'options' => ['class'=>'form-inline'],
        'action'  => ['index'],
        'method'  => 'get',
    ]); ?>

    <?= $form->field($model, 'id',['labelOptions' => ['label' => 'ID']]) ?>

    <?= $form->field($model, 'apply_name',['labelOptions' => ['label' => '申请人姓名']]) ?>

    <?= $form->field($model, 'phone',['labelOptions' => ['label' => '手机号']]) ?>

    <?= $form->field($model, 'status',['labelOptions' => ['label' => '状态']])->dropDownList(['1'=>'未审核','2'=>'已通过','3'=>'已拒绝'],['prompt'=>'请选择']) ?>

    <div class="form-group" style="margin-top: -10px;">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重制', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
