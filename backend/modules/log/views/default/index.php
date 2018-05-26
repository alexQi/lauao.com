<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\admin\components\Helper;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = '操作日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>
            </div>
            <div class="box-body">
                <?=GridView::widget([
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
                        [
                            'attribute'     => 'id',
                            "headerOptions" => [
                                "width" => "50"
                            ]
                        ],
                        [
                            'attribute'     => 'module',
                            'format'        => 'raw',
                            'value'         => function ($model) {
                                return $model->module;
                            },
                            "headerOptions" => [
                                "width" => "50"
                            ]
                        ],
                        [
                            'attribute'     => 'controller',
                            'format'        => 'raw',
                            'value'         => function ($model) {
                                return $model->controller;
                            },
                            "headerOptions" => [
                                "width" => "80"
                            ]
                        ],
                        [
                            'attribute'     => 'action',
                            'format'        => 'raw',
                            'value'         => function ($model) {
                                return $model->action;
                            },
                            "headerOptions" => [
                                "width" => "150"
                            ]
                        ],
                        [
                            'attribute'     => 'table_name',
                            "headerOptions" => [
                                "width" => "110"
                            ],
                        ],
                        [
                            'attribute'     => 'primary_key',
                            "headerOptions" => [
                                "width" => "50"
                            ],
                        ],
                        [
                            'attribute'      => 'operation_type',
                            'format'         => 'html',
                            'value'          => function ($model) {

                                switch ($model->operation_type) {
                                    case 'create':
                                        $string = '添加';
                                        $class  = 'success';
                                        break;
                                    case 'update':
                                        $string = '更新';
                                        $class  = 'warning';
                                        break;
                                    case 'delete':
                                        $string = '删除';
                                        $class  = 'danger';
                                        break;
                                    default:
                                        $string = '未知';
                                        $class  = 'default';
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
                                'create' => '添加',
                                'update' => '更新',
                                'delete' => '删除'
                            ],
                        ],
                        [
                            'label'         => '操作者',
                            'attribute'     => 'real_name',
                            'format'        => 'html',
                            'value'         => function ($model) {
                                return $model->userExtend['real_name'];
                            },
                            "headerOptions" => [
                                "width" => "50"
                            ],
                        ],
                        [
                            'attribute'     => 'created_at',
                            'format'        => ['date', 'php:Y-m-d H:i:s'],
                            "headerOptions" => [
                                "width" => "130"
                            ],
                        ],
                        [
                            'class'         => 'backend\components\LauaoActionColumn',
                            'template'      => Helper::filterActionColumn(['view']),
                            'buttons'       => [
                                'view' => function ($url, $model) {
                                    $options = [
                                        'class'      => 'btn btn-sm margin-r-5 bg-maroon detail-link',
                                        'title'      => '查看详情',
                                        'data-pjax'  => '0',
                                        'data-key'    => $model->id,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#activity-modal',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                                }
                            ],
                            "headerOptions" => [
                                "width" => "50"
                            ],
                        ],
                    ],
                ]);?>
                <?php Modal::begin([
                    'id'     => 'activity-modal',
                    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-random"></i> 操作日志详情</h4>',
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
                    $('#activity-modal .modal-body').html(data);
                    $('#activity-modal').modal();
                }
            );
        });
    "
);
?>
