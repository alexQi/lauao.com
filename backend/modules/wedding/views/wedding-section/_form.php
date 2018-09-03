<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WeddingSection */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
        'options' => ['class'=>'form-horizontal'],
        'enableAjaxValidation'=>false,
        'id' => 'menu-form',
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-xs-8\">{input}</div>{error}",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ]
    ]
);?>
<div class="wedding-section-form">

    <div class="form-group">
        <?= $form->field($model, 'section_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'desc')->textarea(['maxlength' => true]) ?>
    </div>

    <div class="box-footer text-right no-pad-top no-border">
        <?=Html::button('取消', ['class' => 'btn btn-default', 'data-btn-type' => 'cancel','data-dismiss'=>'modal'])?>
        <?php
        echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name' => 'submit-button'])
        ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
