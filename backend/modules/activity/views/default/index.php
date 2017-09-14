<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\activityBaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                <div class="box-tools">
        <?= Html::a('新建活动', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'title',
                    [
                        'label' => '活动周期',
                        'attribute'=>'start_time',
                        'format' => 'html',
                        'value' => function($model)
                        {
                            return date('Y-m-d H:i',$model->start_time).' -- '.date('Y-m-d H:i',$model->end_time);
                        },
                        'filter' => '<input type="text" class="form-control" value="DISABLED" disabled/>',
                    ],
                    [
                        'label' => '状态',
                        'attribute'=>'status',
                        'format' => 'html',
                        'value'=>function ($model) {
                            $string = $model->status==1 ? '禁用' : '启用';
                            $class  = $model->status==1 ? 'danger' : 'success';
                            $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                            return $html;
                        },
                        'filter' => ['1'=>'禁用','2'=>'启用'], //筛选的数据
                        "headerOptions" => [
                            "width" => "80"
                        ],
                    ],
                    [
                        'label' => '添加人',
                        'attribute'=>'username',
                        'format' => 'raw',
                        'value'=>function ($model) {
                            return $model->username;
                        },
                        "headerOptions" => [
                            "width" => "80"
                        ],
                    ],
                    [
                        'label' => '创建时间',
                        'attribute'=>'created_at',
                        'format' => ['date', 'php:Y-m-d H:i'],
                        "headerOptions" => [
                            "width" => "80"
                        ],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'buttonOptions' => [
                            'class' => 'btn btn-sm bg-olive margin-r-5'
                        ],
                        "headerOptions" => [
                            "width" => "100"
                        ],
                    ],
                ],
            ]); ?>
            </div>
        </div>
    </div>
</div>
