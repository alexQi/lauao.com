<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\admin\components\RouteRule;
use backend\modules\admin\AutocompleteAsset;
use yii\helpers\Json;
use backend\modules\admin\components\Configs;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
/* @var $context backend\modules\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$rules = Configs::authManager()->getRules();
unset($rules[RouteRule::RULE_NAME]);
$source = Json::htmlEncode(array_keys($rules));

$js = <<<JS
    $('#rule_name').autocomplete({
        source: $source,
    });
JS;
AutocompleteAsset::register($this);
$this->registerJs($js);
?>
<?php $form = ActiveForm::begin([
        'options' => ['class'=>'form-horizontal'],
        'enableAjaxValidation'=>false,
        'id' => 'item-form',
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-xs-8\">{input}</div>{error}",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ]
    ]
);?>
<div class="box-body">
    <div class="col-lg-12 no-margin">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>
        <?= $form->field($model, 'ruleName')->textInput(['id' => 'rule_name']) ?>
        <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
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
