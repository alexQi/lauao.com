<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ApiBaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Api 接口列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-fw fa-arrows"></i><?php echo Html::encode($this->title); ?></h3>
                <div class="box-tools">
                    <?php echo Html::a('<i class="fa fa-plus"></i> 新增API', ['create'], ['class' => 'btn btn-sm btn-info']) ?>
                </div>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'layout'       => "{items}{summary}{pager}",
                    'summary'      => "<span class='dataTables_info'>当前共有{totalCount}条数据,分为{pageCount}页,当前为第{page}页</span>",
                    'options'      => [
                        'class' => 'col-sm-12 no-padding'
                    ],
                    'pager' => [
                        'options'=>[
                            'class' => 'pagination pull-right no-margin',
                        ]
                    ],
                    'columns' => [
                        [
                            'attribute' => 'id',
                            "headerOptions" => [
                                    "width" => "50"
                            ],
                        ],
                        [
                            'attribute'=>'api_name',
                            'format' => 'html',
                            'value'=>function ($model) {
                                $string = $model->is_default==1 ? '' : '默认';
                                $html   =$model->api_name.'<span class="label label-success margin">'.$string.'</span>';
                                return $html;
                            },
                        ],
                        'url',
                        [
                            'attribute'=>'status',
                            'format' => 'html',
                            'value'=>function ($model) {
                                $string = $model->status==1 ? '禁用' : '启用';
                                $class  = $model->status==1 ? 'danger' : 'success';
                                $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                                return $html;
                            },
                            "headerOptions" => [
                                "width" => "80"
                            ],
                        ],
                        [
                            'attribute'=>'created_at',
                            'value'=>function ($model) {
                                return date('Y-m-d H:i:s',$model->created_at);
                            },
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                        [
                            'class' => 'backend\components\LauaoActionColumn',
                            'template' => '{view} {update} {delete}',
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
