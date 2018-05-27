<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \backend\assets\AdminLtePluginsDatePickerAsset;

/* @var $this yii\web\View */
/* @var $model common\models\ApiBase */
/* @var $form yii\widgets\ActiveForm */
AdminLtePluginsDatePickerAsset::register($this);

$uriOptions = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => 'URI路径'],
    'template'     => '{label}<div class="col-xs-3">{input}</div><div class="col-xs-3  no-padding">{error}</div>',
];
$methodOptions = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => '请求方式'],
    'template'     => '{label}<div class="col-xs-3">{input}</div><div class="col-xs-3  no-padding">{error}</div>',
];
$statusOptions = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => '状态'],
    'template'     => '{label}<div class="col-xs-3">{input}</div><div class="col-xs-3  no-padding">{error}</div>',
];
$isDefaultOptions = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => '是否默认'],
    'template'     => '{label}<div class="col-xs-3" style="padding: 7px;">{input}</div><div class="col-xs-3  no-padding">{error}</div>',
];
?>

<div class="api-base-form">

    <?php $form = ActiveForm::begin([
            'options'              => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
            'enableAjaxValidation' => false,
            'fieldConfig'          => [
                'template'     => "{label}<div class=\"col-xs-8\">{input}</div><div class=\"col-xs-2 no-padding\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
            ]
        ]
    ); ?>

    <?= $form->field($model, 'api_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_path',$uriOptions)->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_method',$methodOptions)->dropDownList(['GET','POST','PUT','DELETE','VIEW']) ?>

    <?= $form->field($model, 'query_string')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoke_string')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'status', $statusOptions)->dropDownList(['0' => '禁用', '10' => '启用'])?>

    <?=$form->field($model, 'is_default',$isDefaultOptions)->radioList(['0' => '禁用', '10' => '启用'])?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?=Html::submitButton('确定', ['class' => 'btn btn-danger save-data'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$this->registerJs(
    "
        $(function () {
            $('#birthday').datepicker({
                language: \"zh-CN\",
                autoclose: true,
                format: \"yyyy-mm-dd\",
            });
        });
    "
    , \yii\web\View::POS_END);
?>