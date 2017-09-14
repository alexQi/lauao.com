<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityBase */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '活动列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-base-view">

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="box-body">
                <p>
                    <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'title',
                        'activity_desc',
                        'activity_rules',
                        [
                            'label' => '活动周期',
                            'format' => 'html',
                            'value' => function($model)
                            {
                                return date('Y-m-d H:i',$model->start_time).' -- '.date('Y-m-d H:i',$model->end_time);
                            }
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
                            'label' => '创建时间',
                            'attribute'=>'created_at',
                            'format' => ['date','Y-m-d H:i'],
                        ],
                    ],
                ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
