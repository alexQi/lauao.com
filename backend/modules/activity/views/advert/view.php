<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityAdvert */

$this->title = $model->advert_title;
$this->params['breadcrumbs'][] = ['label' => '广告列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if ($model->type==2){
    \backend\assets\VideoAsset::register($this);
}
?>
<div class="activity-advert-view">

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
                        'id',
                        'advert_title',
                        [
                            'label' => '广告类型',
                            'attribute'=>'type',
                            'format' => 'html',
                            'value'=>function ($model) {
                                $string = $model->type==1 ? '图片' : '视频';
                                $class  = $model->type==1 ? 'info' : 'success';
                                $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                                return $html;
                            },
                            'filter' => ['1'=>'禁用','2'=>'启用'], //筛选的数据
                            "headerOptions" => [
                                "width" => "80"
                            ],
                        ],
                        [
                            'label' => '广告素材',
                            'attribute'=>'file_url',
                            'format' => 'raw',
                            'value'=>function ($model) {
                                if ($model->type==1){
                                    $html   ='<img src=\''.$model->file_url.'?'.yii::$app->params['qiniu']['style']['300x200'].'\' alt="广告图片" class="media-object">';
                                }else{

                                    $html = '<video id="my-video" class="video-js" controls preload="auto" width="300" height="200" data-setup="{}"><source src="'.$model->file_url.'" type="video/mp4"></video>';
                                }

                                return $html;
                            },
                            'filter' => ['1'=>'禁用','2'=>'启用'], //筛选的数据
                            "headerOptions" => [
                                "width" => "80"
                            ],
                        ],
                        'title',
                        'link_url:url',
                        [
                            'label' => '打开方式',
                            'attribute'=>'target',
                            'format' => 'html',
                            'value'=>function ($model) {
                                $string = $model->status==1 ? '本页' : '新页';
                                $class  = $model->status==1 ? 'info' : 'success';
                                $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                                return $html;
                            },
                            'filter' => ['1'=>'禁用','2'=>'启用'], //筛选的数据
                            "headerOptions" => [
                                "width" => "80"
                            ],
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
                            'label' => '更新时间',
                            'attribute'=>'updated_at',
                            'format' => ['date','Y-m-d H:i'],
                        ],
                    ],
                ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if ($model->type==2):?>
<script>
    var myVideo = videojs('my-video');

    myVideo.controls = false;
    myVideo.autoplay = false;
    myVideo.preload = "auto";
</script>
<?php endif; ?>