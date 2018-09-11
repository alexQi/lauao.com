<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\WeddingOrder */
/* @var $item_data_model \backend\models\WeddingItemOrderSearch */

$this->title                   = '订单号码 : '.$model->order_sn;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Wedding Orders'),
    'url'   => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="order-base-view">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?=Html::encode($this->title)?></h3>
                    </div>
                    <div class="box-body">
                        <p>
                            <?=Html::a('更新', [
                                'update',
                                'id' => $model->order_id,
                            ], [
                                'class'       => 'btn btn-info detail-link',
                                'data-key'    => '',
                                'data-toggle' => 'modal',
                                'data-target' => '#order-modal',
                            ])?>
                            <?=Html::a('删除', [
                                'delete',
                                'id' => $model->order_id,
                            ], [
                                'class' => 'btn btn-danger',
                                'data'  => [
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                    'method'  => 'post',
                                ],
                            ])?>
                        </p>

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#main_detail" data-toggle="tab">基本信息</a>
                                </li>
                                <?php foreach ($item_data_model as $item_model): ?>
                                    <li>
                                        <a href="#section_detail_<?php echo $item_model->section_id; ?>"
                                           data-toggle="tab"><?php echo $item_model->section_name; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="main_detail">
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
                                <?php foreach ($item_data_model as $item_model): ?>
                                    <div class="tab-pane" id="section_detail_<?php echo $item_model->section_id; ?>">
                                        <?= DetailView::widget([
                                            'model' => $item_model,
                                            'attributes' => [
                                                'section_name',
                                                [
                                                    'attribute' => 'combo_name',
                                                    'format'    => 'html',
                                                    'value'     => function($model)
                                                    {
                                                        if ($model->combo_id==-1){
                                                            $html = '<span class="label label-danger">无套餐</span>';
                                                        }else{
                                                            $html = '<span class="label label-success">' . $model->combo_name . '</span>';;
                                                        }
                                                        return $html;
                                                    },
                                                ],
                                                'custom',
                                                'deal_price',
                                                [
                                                    'attribute'      => 'status',
                                                    'format'         => 'html',
                                                    'value'          => function ($model) {
                                                        switch ($model->status) {
                                                            case 0:
                                                                $string = '未接单';
                                                                $class  = 'danger';
                                                                break;
                                                            case 1:
                                                                $string = '已接单';
                                                                $class  = 'success';
                                                                break;
                                                            default:
                                                                //。。。。。
                                                        }
                                                        $html = '<span class="label label-' . $class . '">' . $string . '</span>';
                                                        return $html;
                                                    }
                                                ],
                                                'principal',
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
                                        ]) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php Modal::begin([
    'id'     => 'order-modal',
    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 部门</h4>',
    'size'   => Modal::SIZE_LARGE,
]); ?>
<?php Modal::end(); ?>
<?php
$this->registerJs("
        $(document).on(\"click\",\".detail-link\",function() {
            $.get($(this).attr(\"href\"),
                function (data) {
                    $('#order-modal .modal-body').html(data);
                    $('#order-modal').modal();
                }
            );
        });
    ");
?>