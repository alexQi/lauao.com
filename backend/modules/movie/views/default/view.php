<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = $model->video_name;
$this->params['breadcrumbs'][] = ['label' => '视频列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\backend\assets\VideoAsset::register($this);
?>
<div class="activity-advert-view">

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-body">
                    <p>
                        <?= Html::a('更新', ['update', 'id' => $model->video_id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('删除', ['delete', 'id' => $model->video_id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '确认删除?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'video_id',
                            [
                                'label' => '视频分类',
                                'attribute'=>'video_cate_id',
                                'value'=>function ($model) {
                                    $cateList = \common\models\Video::getCategoryList();
                                    return  $cateList[$model->video_cate_id];
                                },
                            ],
                            'video_name',
                            'video_url:url',
                            [
                                'label' => '视频预览',
                                'attribute'=>'video_url',
                                'format' => 'raw',
                                'value'=>function ($model) {
                                    $html = '<video id="my-video" class="video-js" poster="'.$model->poster.'" controls preload="auto" width="300" height="200" data-setup="{}"><source src="'.$model->video_url.'" type="video/mp4"></video>';
                                    return $html;
                                },
                            ],
                            [
                                'label' => '播放次数',
                                'attribute'=>'play_num',
                                'format' => 'raw',
                                'value'=>function ($model) {
                                    return $model->play_num.'次';
                                },
                            ],
                            [
                                'label' => '被赞数',
                                'attribute'=>'like_num',
                                'format' => 'raw',
                                'value'=>function ($model) {
                                    return $model->like_num.'次';
                                },
                            ],
                            'uploader',
                            'video_time',
                            'updated_at',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var myVideo = videojs('my-video');

    myVideo.controls = false;
    myVideo.autoplay = false;
    myVideo.preload = "auto";
</script>
