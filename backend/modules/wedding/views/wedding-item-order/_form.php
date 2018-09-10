<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\AdminLtePluginsDatePickerAsset;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WeddingOrder */
/* @var $form yii\widgets\ActiveForm */
/* @var $item_data_model \backend\models\WeddingItemOrderSearch */

AdminLtePluginsDatePickerAsset::register($this);

$fieldOptions = [
    'options'      => ['class' => 'form-group'],
    'labelOptions' => ['label' => '婚庆日期'],
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
        'enableAjaxValidation' => true,
        'id'                   => 'menu-form',
        'fieldConfig'          => [
            'template'     => "{label}<div class=\"col-xs-8\">{input}</div>{error}",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>
<div class="wedding-order-form">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#main" data-toggle="tab">基本信息</a>
            </li>
            <li>
                <a href="#section_detail_<?php echo $item_data_model->section_id; ?>"
                   data-toggle="tab">部门</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="main">
                <?=DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'order_sn',
                        'order_source',
                        'customer_name',
                        'customer_mobile',
                        [
                            'label' => '婚庆日期',
                            'attribute'=>'wedding_date',
                            'format' => 'date',
                        ],
                        'wedding_address',
                        [
                            'attribute'      => 'project_process',
                            'format'         => 'html',
                            'value'          => function ($model) {
                                switch ($model->project_process) {
                                    case 1:
                                        $string = '已付定金';
                                        $class  = 'success';
                                        break;
                                    case 2:
                                        $string = '已付合同款';
                                        $class  = 'warning';
                                        break;
                                    case 3:
                                        $string = '已付尾款';
                                        $class  = 'danger';
                                        break;
                                    default:
                                        //。。。。。
                                }
                                $html = '<span class="label label-' . $class . '">' . $string . '</span>';
                                return $html;
                            }
                        ],
                        'remark',
                        [
                            'label' => '创建时间',
                            'attribute'=>'created_at',
                            'format' => 'date',
                        ],
                        [
                            'label' => '更新时间',
                            'attribute'=>'updated_at',
                            'format' => 'date',
                        ],
                    ],
                ])?>
            </div>
            <div class="tab-pane" id="section_detail_<?php echo $item_data_model->section_id; ?>">
                <div class="form-group">
                    <?=$form->field($item_data_model, "combo_id", $comboOptions)->dropDownList(ArrayHelper::map($item_data_model->combos, 'combo_id', 'combo_name'),['disabled'=>true])?>
                </div>
                <div class="form-group">
                    <?=$form->field($item_data_model, "custom")->textInput(['maxlength' => true])?>
                </div>
                <div class="form-group">
                    <?=$form->field($item_data_model, "deal_price")->textInput(['maxlength' => true])?>
                </div>
                <div class="form-group">
                    <?=$form->field($item_data_model, "status")->dropDownList([
                        0 => '未接单',
                        1 => '已接单',
                    ])?>
                </div>
                <div class="form-group">
                    <?=$form->field($item_data_model, "principal")->textInput(['maxlength' => true])?>
                </div>
            </div>
        </div>
    </div>


    <div class="box-footer text-right no-pad-top no-border">
        <?=Html::button('取消', [
            'class'         => 'btn btn-default',
            'data-btn-type' => 'cancel',
            'data-dismiss'  => 'modal',
        ])?>
        <?php
        echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name'  => 'submit-button',
        ])
        ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
<?php
$this->registerJs("
        $(function () {
            $('#wedding-date').datepicker({
                language: \"zh-CN\",
                autoclose: true,
                format: \"yyyy-mm-dd\",
            });
        });
    ", \yii\web\View::POS_END);
?>
