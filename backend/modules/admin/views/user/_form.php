<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \backend\assets\AdminLtePluginsDatePickerAsset;

/* @var $this yii\web\View */
/* @var $model \backend\modules\admin\models\User */
/* @var $extendModel \common\models\UserExtend */
/* @var $form yii\widgets\ActiveForm */
AdminLtePluginsDatePickerAsset::register($this);

$fieldOptions  = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => '生日'],
    'template'     => '{label}<div class="col-xs-3"><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div></div><div class="col-xs-2 no-padding">{error}</div>',
];
$statusOptions = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => '账户状态'],
    'template'     => '{label}<div class="col-xs-3">{input}</div><div class="col-xs-3  no-padding">{error}</div>',
];
?>
    <div class="user-form">
        <?php $form = ActiveForm::begin([
                'options'              => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                'enableAjaxValidation' => false,
                'fieldConfig'          => [
                    'template'     => "{label}<div class=\"col-xs-8\">{input}</div><div class=\"col-xs-2 no-padding\">{error}</div>",
                    'labelOptions' => ['class' => 'col-sm-2 control-label'],
                ]
            ]
        ); ?>
        <?php if ($model->isNewRecord): ?>
            <?=$form->field($model, 'username', ['labelOptions' => ['label' => '账号']])->textInput()?>
        <?php endif; ?>
        <?=$form->field($extendModel, 'nick_name', ['labelOptions' => ['label' => '昵称']])->textInput()?>

        <?=$form->field($model, 'password_hash', ['labelOptions' => ['label' => '密码']])->passwordInput(['autocomplete' => 'off'])?>

        <?=$form->field($model, 'status', $statusOptions)->dropDownList(['0' => '禁用', '10' => '启用'], ['disabled' => $model->id == 1 ? true : false])?>

        <?=$form->field($extendModel, 'birthday', $fieldOptions)->textInput(['id' => 'birthday'])?>

        <?=$form->field($extendModel, 'gender', ['labelOptions' => ['label' => '性别'], 'template' => '{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->radioList(['1' => '男', '2' => '女'])?>

        <?=$form->field($extendModel, 'real_name', ['labelOptions' => ['label' => '姓名']])->textInput()?>

        <?=$form->field($model, 'email', ['labelOptions' => ['label' => 'Email']])->textInput()?>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?=Html::submitButton('确定', ['class' => 'btn btn-danger save-data'])?>
                <?=$form->field($extendModel, 'avatar')->hiddenInput(['maxlength' => true])->label(false)?>
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