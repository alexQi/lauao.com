<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $item_data_model common\models\WeddingItemOrder */
/* @var $model common\models\WeddingOrder */

$this->title                   = '订单号码 : ' . $model->order_sn;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Wedding Item Orders'),
    'url'   => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-base-view">

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
                            'id' => $item_data_model->item_order_id,
                        ], [
                                'class'       => 'btn btn-info detail-link',
                                'data-key'    => '',
                                'data-toggle' => 'modal',
                                'data-target' => '#item-order-detail-modal',
                            ])?>
                    </p>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#main" data-toggle="tab">基本信息</a>
                            </li>
                            <li>
                                <a href="#section_detail_view_<?php echo $item_data_model->section_id; ?>"
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
                                            'label'     => '婚庆日期',
                                            'attribute' => 'wedding_date',
                                            'format'    => 'date',
                                        ],
                                        'wedding_address',
                                        [
                                            'attribute' => 'project_process',
                                            'format'    => 'html',
                                            'value'     => function($model)
                                            {
                                                switch ($model->project_process)
                                                {
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
                                            },
                                        ],
                                        'remark',
                                        [
                                            'label'     => '创建时间',
                                            'attribute' => 'created_at',
                                            'format'    => 'date',
                                        ],
                                        [
                                            'label'     => '更新时间',
                                            'attribute' => 'updated_at',
                                            'format'    => 'date',
                                        ],
                                    ],
                                ])?>
                            </div>
                            <div class="tab-pane" id="section_detail_view_<?php echo $item_data_model->section_id; ?>">
                                <?=DetailView::widget([
                                    'model'      => $item_data_model,
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
                                            'attribute' => 'status',
                                            'format'    => 'html',
                                            'value'     => function($model)
                                            {
                                                switch ($model->status)
                                                {
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
                                            },
                                        ],
                                        'principal',
                                        [
                                            'label'     => '创建时间',
                                            'attribute' => 'created_at',
                                            'format'    => 'date',
                                        ],
                                        [
                                            'label'     => '更新时间',
                                            'attribute' => 'updated_at',
                                            'format'    => 'date',
                                        ],
                                    ],
                                ])?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    'id'     => 'item-order-detail-modal',
    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 部门</h4>',
    'size'   => Modal::SIZE_LARGE,
]); ?>
<?php Modal::end(); ?>
<?php
$this->registerJs("
        $(document).on(\"click\",\".detail-link\",function() {
            $.get($(this).attr(\"href\"),
                function (data) {
                    $('#item-order-detail-modal .modal-body').html(data);
                    $('#item-order-detail-modal').modal();
                }
            );
        });
    ");
?>
