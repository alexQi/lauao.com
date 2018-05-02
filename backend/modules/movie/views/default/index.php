<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '视频列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'attribute'=>'video_id',
                            "headerOptions" => [
                                "width" => "50"
                            ],
                        ],
                        [
                            'label' => '视频分类',
                            'attribute'=>'video_cate_id',
                            'format' => 'html',
                            'value'=>function ($model) {
                                $cateList = \common\models\Video::getCategoryList();
                                return  $cateList[$model->video_cate_id];
                            },
                            'filter' => \common\models\Video::getCategoryList(), //筛选的数据
                            "headerOptions" => [
                                "width" => "80"
                            ],
                        ],
//                        'video_name',
                        [
                            'attribute'=>'video_name',
                            "headerOptions" => [
                                "width" => "200"
                            ],
                        ],
                        [
                            'attribute'=>'play_num',
                            "headerOptions" => [
                                "width" => "80"
                            ],
                        ],
                        [
                            'attribute'=>'like_num',
                            "headerOptions" => [
                                "width" => "80"
                            ],
                        ],
//                        [
//                            'attribute'=>'uploader',
//                            "headerOptions" => [
//                                "width" => "80"
//                            ],
//                        ],
//                        [
//                            'attribute'=>'video_time',
//                            "headerOptions" => [
//                                "width" => "80"
//                            ],
//                        ],
                        'created_at',
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
            <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
