<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApiBase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="api-base-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'api_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_method')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'query_string')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoke_string')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
