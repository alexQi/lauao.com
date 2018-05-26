<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\modules\admin\models\form\ChangePassword */
?>
<?php $form = ActiveForm::begin([
        'options'              => ['class' => 'form-horizontal'],
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute(['/ajax/validate/validate-change-pass-form']),
        'id'                   => 'passwd-form',
        'fieldConfig'          => [
            'template'     => "{input}{error}"
        ]
    ]
); ?>

<div class="box-body" style="padding-top: 0;padding-bottom: 0;">
    <div class="col-lg-12" style="padding-top: 0;padding-bottom: 0;">
            <?=$form->field($model, 'oldPassword')->passwordInput(['autocomplete'=>'off','placeholder'=>'旧密码'])?>
            <?=$form->field($model, 'newPassword')->passwordInput(['autocomplete'=>'off','placeholder'=>'请输入新密码'])?>
            <?=$form->field($model, 'retypePassword')->passwordInput(['autocomplete'=>'off','placeholder'=>'再次确认密码'])?>
    </div>
</div>
<div class="box-footer no-pad-top no-border">
    <?=Html::button('取消', ['class' => 'btn btn-default', 'data-btn-type' => 'cancel','data-dismiss'=>'modal'])?>
    <?=Html::submitButton('确认修改', ['class' => 'btn btn-primary pull-right', 'name' => 'change-button'])?>
</div>
<?php ActiveForm::end(); ?>
