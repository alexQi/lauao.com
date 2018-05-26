<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this  yii\web\View */
/* @var $model backend\modules\admin\models\BizRule */
/* @var $form ActiveForm */
?>
<?php $form = ActiveForm::begin([
        'options' => ['class'=>'form-horizontal'],
        'enableAjaxValidation'=>false,
        'id' => 'rule-form',
        'fieldConfig' => [
            'template' => "{input}{error}",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ]
    ]
);?>
<div class="box-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => 64,'placeholder'=>'规则名称']) ?>
    <?= $form->field($model, 'className')->textInput(['placeholder'=>'类名']) ?>
</div>
<div class="box-footer text-right">
    <?php
    echo Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
        'name' => 'submit-button'])
    ?>
</div>
<?php ActiveForm::end(); ?>
