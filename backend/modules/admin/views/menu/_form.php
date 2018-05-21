<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\admin\models\Menu;
use yii\helpers\Json;
use backend\modules\admin\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
        'menus' => Menu::getMenuSource(),
        'routes' => Menu::getSavedRoutes(),
    ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
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
<div class="box-body">

    <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
    <div class="col-lg-12 no-margin">
        <div class="form-group">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'parent_name')->textInput(['id' => 'parent_name']) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'order')->input('number') ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>
        </div>
    </div>
</div>
<div class="box-footer text-right">
    <button type="button" class="btn btn-default" data-btn-type="cancel" data-dismiss="modal">取消</button>
    <?php
    echo Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
        'name' => 'submit-button'])
    ?>
</div>
<?php ActiveForm::end(); ?>
