<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\WeddingOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wedding-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'order_sn') ?>

    <?= $form->field($model, 'order_source') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'customer_mobile') ?>

    <?php // echo $form->field($model, 'wedding_date') ?>

    <?php // echo $form->field($model, 'wedding_address') ?>

    <?php // echo $form->field($model, 'project_process') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
