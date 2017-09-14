<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApiBaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="api-base-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'api_name') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'url_path') ?>

    <?= $form->field($model, 'request_method') ?>

    <?php // echo $form->field($model, 'query_string') ?>

    <?php // echo $form->field($model, 'invoke_string') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_default') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
