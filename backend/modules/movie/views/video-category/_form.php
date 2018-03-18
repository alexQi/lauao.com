<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VideoCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-category-form">
    <?php $form = ActiveForm::begin([
            'options' => ['class'=>'form-horizontal'],
            'enableAjaxValidation'=>false,

            'fieldConfig' => [
                'template' => "{label}<div class=\"col-xs-8\">{input}</div><div class=\"col-xs-2\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2'],
            ]
        ]
    );?>

    <div class="row margin">
        <?= $form->field($model, 'type',['labelOptions' => ['label' => '分类类型'],'template'=>'{label}<div class="col-xs-4">{input}</div><div class="col-xs-2">{error}</div>'])->dropDownList(['1'=>'作品','2'=>'创作人']) ?>
    </div>
    <div class="row margin">
        <?= $form->field($model, 'cate_name',['labelOptions' => ['label' => '分类名称'],'template'=>'{label}<div class="col-xs-6">{input}</div><div class="col-xs-2">{error}</div>'])->textInput(['maxlength' => true,['id'=>'col-xs-4']]) ?>
    </div>
    <div class="row margin">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success save-data' : 'btn btn-primary save-data']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
