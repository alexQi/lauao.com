<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WeddingItemOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Wedding Item Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>    <?=GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'layout'       => "{items}{summary}{pager}",
                    'summary'      => "<span class='dataTables_info'>当前共有{totalCount}条数据,分为{pageCount}页,当前为第{page}页</span>",
                    'options'      => [
                        'class' => 'col-sm-12 no-padding',
                    ],
                    'pager'        => [
                        'options' => [
                            'class' => 'pagination pull-right no-margin',
                        ],
                    ],
                    'columns'      => [
                        'order_sn',
                        [
                            'attribute'     => 'customer_name',
                            "headerOptions" => [
                                "width" => "100",
                                'class' => 'text-left',
                            ],
                        ],
                        [
                            'attribute'     => 'customer_mobile',
                            "headerOptions" => [
                                "width" => "100",
                                'class' => 'text-left',
                            ],
                        ],
                        [
                            'attribute'     => 'wedding_date',
                            'format'        => 'date',
                            "headerOptions" => [
                                "width" => "100",
                                'class' => 'text-left',
                            ],
                        ],
                        [
                            'attribute'      => 'combo_name',
                            'format'         => 'html',
                            'value'          => function ($model) {
                                return '<span class="label label-success">' . $model->combo_name . '</span>';
                            }
                        ],
                        [
                            'attribute'     => 'deal_price',
                            "headerOptions" => [
                                "width" => "100",
                                'class' => 'text-left',
                            ],
                        ],
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
                            },
                            "headerOptions"  => [
                                "width" => "70",
                                'class' => 'text-center'
                            ],
                            "contentOptions" => [
                                'class' => 'text-center'
                            ],
                            'filter'         => [
                                0 => '未接单',
                                1 => '已接单',
                            ],
                        ],
                        // 'principal',
                        // 'user_id',
                        [
                            'label' => '下单日期',
                            'attribute'=>'created_at',
                            'format' => 'date',
                        ],
                        // 'updated_at',

                        [
                            'class'         => 'backend\components\LauaoActionColumn',
                            'template'      => '{view} {update}',
                            'buttons'       => [
                                'update' => function($url, $model)
                                {
                                    $options = [
                                        'class'       => 'btn btn-sm margin-r-5 bg-purple detail-link',
                                        'title'       => Yii::t('app', 'Update'),
                                        'data-pjax'   => "0",
                                        'data-key'    => $model->item_order_id,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#wedding-item-order-modal',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                                },
                            ],
                            "headerOptions" => [
                                "width" => "150",
                            ],
                        ],
                    ],
                ]);?>
                <?php Pjax::end(); ?>
                <?php Modal::begin([
                    'id'     => 'wedding-item-order-modal',
                    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 部门订单</h4>',
                    'size'   => Modal::SIZE_LARGE,
                ]); ?>
                <?php Modal::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJs(
    "
        $(document).on(\"click\",\".detail-link\",function() {
            $.get($(this).attr(\"href\"),
                function (data) {
                    $('#wedding-item-order-modal .modal-body').html(data);
                    $('#wedding-item-order-modal').modal();
                }
            );
        });
    "
);
?>
