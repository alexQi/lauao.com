<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = '操作日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
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
                                "width" => "80"
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
                                "width" => "80"
                            ]
                        ],
                        [
                            'attribute'     => 'table_name',
                            "headerOptions" => [
                                "width" => "80"
                            ],
                        ],
                        [
                            'attribute'     => 'primary_key',
                            "headerOptions" => [
                                "width" => "70"
                            ],
                        ],
                        [
                            'attribute'     => 'operation_type',
                            'format'        => 'html',
                            'value'         => function ($model) {

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
                            "headerOptions" => [
                                "width" => "80"
                            ],
                            'filter'        => [
                                'create' => '添加',
                                'update' => '更新',
                                'delete' => '删除'
                            ],
                        ],
                        [
                            'attribute'     => 'current_data',
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                        [
                            'attribute'     => 'created_at',
                            'format'        => ['date', 'php:Y-m-d H:i:s'],
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                        // 'user_id',
                    ],
                ]);?>
            </div>
        </div>
    </div>
</div>
