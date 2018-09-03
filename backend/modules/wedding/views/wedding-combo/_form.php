<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\WeddingCombo */
/* @var $form yii\widgets\ActiveForm */
/* @var $sections array */
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
<div class="wedding-combo-form">

    <div class="col-lg-12 no-margin">
        <div class="form-group">
            <?= $form->field($model, 'section_id')->dropDownList(ArrayHelper::map($sections,'id','section_name')) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'combo_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
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