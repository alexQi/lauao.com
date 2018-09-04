<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\WeddingOrderSearch;
use backend\assets\AdminLtePluginsDatePickerAsset;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\WeddingOrder */
/* @var $form yii\widgets\ActiveForm */
/* @var $item_data_model \backend\models\WeddingItemOrderSearch*/

AdminLtePluginsDatePickerAsset::register($this);

$fieldOptions = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => '生日'],
    'template'     => '{label}<div class="col-xs-3"><div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>{input}</div></div><div class="col-xs-2 no-padding">{error}</div>',
];

$comboOptions = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => '套餐'],
    'template'     => '{label}<div class="col-xs-3"><div class="input-group">{input}</div></div><div class="col-xs-2 no-padding">{error}</div>',
];
?>

<?php $form = ActiveForm::begin([
        'options'              => ['class' => 'form-horizontal'],
        'enableAjaxValidation' => false,
        'id'                   => 'menu-form',
        'fieldConfig'          => [
            'template'     => "{label}<div class=\"col-xs-8\">{input}</div>{error}",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ]
    ]
); ?>
<div class="wedding-order-form">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#main" data-toggle="tab">基本信息</a>
            </li>
            <?php foreach ($item_data_model as $item_model): ?>
            <li>
                <a href="#section_<?php echo $item_model->section_id;?>" data-toggle="tab"><?php echo $item_model->section_name;?></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="main">
                <div class="form-group">
                    <?=$form->field($model, 'order_source')->textInput(['maxlength' => true])?>
                </div>
                <div class="form-group">
                    <?=$form->field($model, 'customer_name')->textInput(['maxlength' => true])?>
                </div>
                <div class="form-group">
                    <?=$form->field($model, 'customer_mobile')->textInput()?>
                </div>
                <div class="form-group">
                    <?=$form->field($model, 'wedding_date', $fieldOptions)->textInput(['id' => 'wedding-date'])?>
                </div>
                <div class="form-group">
                    <?=$form->field($model, 'wedding_address')->textInput(['maxlength' => true])?>
                </div>
                <div class="form-group">
                    <?=$form->field($model, 'project_process')->dropDownList(WeddingOrderSearch::$process)?>
                </div>
                <div class="form-group">
                    <?=$form->field($model, 'remark')->textarea(['maxlength' => true])?>
                </div>
            </div>
            <?php foreach ($item_data_model as $item_model): ?>
                <div class="tab-pane" id="section_<?php echo $item_model->section_id;?>">
                    <div class="form-group">
                        <?= $form->field($item_model, "[{$item_model->section_id}]combo_id",$comboOptions)->radioList(ArrayHelper::map($item_model->combos,'combo_id','combo_name')) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($item_model, "[{$item_model->section_id}]custom")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($item_model, "[{$item_model->section_id}]deal_price")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($item_model, "[{$item_model->section_id}]status")->textInput() ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($item_model, "[{$item_model->section_id}]principal")->textInput(['maxlength' => true]) ?>
                    </div>
                    <?= $form->field($item_model, "[{$item_model->section_id}]section_id")->hiddenInput()->label(false)?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="box-footer text-right no-pad-top no-border">
        <?=Html::button('取消', ['class' => 'btn btn-default', 'data-btn-type' => 'cancel', 'data-dismiss' => 'modal'])?>
        <?php
        echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name'  => 'submit-button'])
        ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
<?php
$this->registerJs(
    "
        $(function () {
            $('#wedding-date').datepicker({
                language: \"zh-CN\",
                autoclose: true,
                format: \"yyyy-mm-dd\",
            });
        });
    "
    , \yii\web\View::POS_END);
?>
