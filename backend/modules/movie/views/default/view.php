<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\VideoAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = $model->video_name;
$this->params['breadcrumbs'][] = ['label' => '视频列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
VideoAsset::register($this);
?>
<div class="activity-advert-view">

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
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
                            [
                                'label' => '视频分类',
                                'attribute'=>'video_cate_id',
                                'value'=>function ($model) {
                                    $cateList = \common\models\Video::getCategoryList();
                                    return  $cateList[$model->video_cate_id];
                                },
                            ],
                            'video_name',
                            [
                                'label' => '视频预览',
                                'attribute'=>'video_url',
                                'format' => 'raw',
                                'value'=>function ($model) {
                                    $html = '<div id="my-video" data-id="'.$model->video_url.'" style="width: 300px;height: 300px"></div>';
                                    return $html;
                                },
                            ],
                            [
                                'attribute'=>'status',
                                'format' => 'html',
                                'value'=>function ($model) {
                                    $string = $model->status==1 ? '禁用' : '启用';
                                    $class  = $model->status==1 ? 'warning' : 'success';
                                    $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                                    return $html;
                                },
                                "headerOptions" => [
                                    "width" => "100"
                                ],
                            ],
                            'sort',
                            'uploader',
                            'updated_at',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript" src="http://qzs.qq.com/tencentvideo_v1/js/tvp/tvp.player.js" charset="utf-8"></script>

<script language="javascript">
    function playVideo(){
        var id = $('#my-video').attr('data-id');
        var video = new tvp.VideoInfo();
        //向视频对象传入直播频道id
        video.setVid(id);
        var player = new tvp.Player(500, 300);
        //设置播放器初始化时加载的视频
        player.setCurVideo(video);
        //设置播放器为直播状态，1表示直播，2表示点播，默认为2
        player.addParam("type", "2");
        player.addParam("autoplay", 0);
        player.addParam("wmode", "transparent");
        player.addParam("showcfg", "0");
        player.addParam("flashskin", "http://imgcache.qq.com/minivideo_v1/vd/res/skins/TencentPlayerMiniSkin.swf");
        player.addParam("showend", 1);
        //输出播放器
        player.write('my-video');
    }
    playVideo();
</script>
