<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WeddingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Wedding Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>

                <div class="box-tools">
                    <?=Html::a(Yii::t('app', 'Create Wedding Order'), ['create'],
                        [
                            'class'       => 'btn btn-sm btn-info detail-link',
                            'data-key'    => '',
                            'data-toggle' => 'modal',
                            'data-target' => '#wedding-order-modal',
                        ])?>
                </div>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>    <?=GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'layout'       => "{items}{summary}{pager}",
                    'summary'      => "<span class='dataTables_info'>当前共有{totalCount}条数据,分为{pageCount}页,当前为第{page}页</span>",
                    'options'      => [
                        'class' => 'col-sm-12 no-padding'
                    ],
                    'pager'        => [
                        'options' => [
                            'class' => 'pagination pull-right no-margin',
                        ]
                    ],
                    'columns'      => [
                        'order_sn',
                        [
                            'attribute'      => 'customer_name',
                            "headerOptions"  => [
                                "width" => "100",
                                'class' => 'text-center'
                            ]
                        ],
                        'customer_mobile',
                        [
                            'attribute'      => 'wedding_date',
                            'format'         => 'date',
                            "headerOptions"  => [
                                "width" => "100",
                                'class' => 'text-center'
                            ]
                        ],
                        // 'wedding_date',
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
                            },
                            "headerOptions"  => [
                                "width" => "70",
                                'class' => 'text-center'
                            ],
                            "contentOptions" => [
                                'class' => 'text-center'
                            ],
                            'filter'         => [
                                1 => '已付定金',
                                2 => '已付合同款',
                                3 => '已付尾款'
                            ],
                        ],
                        [
                            'attribute'      => 'updated_at',
                            'format'         => 'date',
                            "headerOptions"  => [
                                "width" => "100",
                                'class' => 'text-center'
                            ]
                        ],

                        [
                            'class'         => 'backend\components\LauaoActionColumn',
                            'template'      => '{view} {update} {delete}',
                            'buttons'       => [
                                'update' => function ($url, $model) {
                                    $options = [
                                        'class'       => 'btn btn-sm margin-r-5 bg-purple detail-link',
                                        'title'       => Yii::t('app', 'Update'),
                                        'data-pjax'   => "0",
                                        'data-key'    => $model->order_sn,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#wedding-order-modal',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                                }
                            ],
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                    ],
                ]);?>
                <?php Pjax::end(); ?>
                <?php Modal::begin([
                    'id'     => 'wedding-order-modal',
                    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 订单</h4>',
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
                    $('#wedding-order-modal .modal-body').html(data);
                    $('#wedding-order-modal').modal();
                }
            );
        });
    "
);
?>
