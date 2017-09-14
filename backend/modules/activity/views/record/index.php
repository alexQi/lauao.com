<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ApplyRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '申请列表';
$this->params['breadcrumbs'][] = $this->title;
Alert::widget();
?>
<?= Alert::widget() ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'label' => '照片',
                        'attribute'=>'self_picture',
                        'format' => 'html',
                        'value'=>function ($model) {
                            $html = '<div class="widget-user-image">
                      <img class="img-circle"  style="width: 145px;height: 145px;" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
                    </div>';
                            return $html;
                        },
                        "headerOptions" => [
                            "width" => "100"
                        ],
                    ],
                    [
                        'label' => '申请人资料',
                        'attribute'=>'apply_name',
                        'format' => 'html',
                        'value'=>function ($model) {
                            $html  = "<dl class='margin'>";
                            $html .= "<dt><i class=\"fa fa-fw fa-plus-square\"></i>：ID <".$model->id."></dt>";
                            $html .= "<dd><i class=\"fa fa-fw fa-h-square\"></i>：".$model->apply_name."</dd>";
                            $html .= "<dd><i class=\"fa fa-fw  fa-odnoklassniki-square\"></i>：".($model->gender==1?'男':'女')."</dd>";
                            $html .= "<dd><i class=\"fa fa-fw fa-phone-square\"></i>：".$model->phone."</dd>";
                            $html .= "<dd><i class=\"fa fa-fw fa-share-square\"></i>：".$model->recommend."</dd>";
                            $html .= "<dd><i class=\"fa fa-fw fa-xing-square\"></i>：".$model->title."</dd>";
                            if($model->status==1)
                            {
                                $status = '<span class="label label-warning">未审核</span>';
                            }elseif($model->status==2){
                                $status = '<span class="label label-info">已审核</span>';
                            }else{
                                $status = '<span class="label label-danger">已拒绝</span>';
                            }
                            $html .= "<dd><i class=\"fa fa-fw  fa-bell\"></i>：".$status."</dd>";
                            $html .= "<dd><i class=\"fa fa-fw  fa-pencil-square\"></i>：".date('Y-m-d H:i',$model->created_at)."</dd>";
                            $html .= "</dl>";
                            return $html;
                        },
                        "headerOptions" => [
                            "width" => "200"
                        ],
                    ],
                    [
                        'label' => '自我介绍',
                        'attribute'=>'self_desc',
                        'format' => 'html',
                        'content'=>function ($model) {
                            $html ="<textarea class='form-control' style='height: 100px;resize:none;' disabled>$model->self_desc</textarea>";
                            $html .='<audio src="'.$model->self_media.'" controls style="margin-top:30px;min-width: 530px;"></audio>';
                            return $html;
                        },
                        "headerOptions" => [
                            "width" => "530",
                        ],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '审核',
                        'template' => '{audit}',
                        'buttons' => [
                            'audit' => function ($url, $model, $key) {
                                if($model->status==1)
                                {
                                    $html = Html::a('<span class="glyphicon glyphicon glyphicon-ok"></span>', ['record/audit','id'=>$model->id,'status'=>2], ['title' => '审核','class'=>'btn btn-sm bg-green margin-r-5']);
                                    $html .= Html::a('<span class="glyphicon glyphicon glyphicon-remove"></span>', ['record/audit','id'=>$model->id,'status'=>3], ['title' => '拒绝','class'=>'btn btn-sm bg-red margin-r-5']);
                                }elseif($model->status==2){
                                    $html = Html::a('<span class="glyphicon glyphicon-ok-sign"></span>', ['record/audit','id'=>$model->id], ['title' => '已审核','class'=>'btn btn-sm bg-green margin-r-5']);
                                }else{
                                    $html = Html::a('<span class="glyphicon glyphicon-remove-sign"></span>', 'javascript:void(0)', ['title' => '已拒绝','class'=>'btn btn-sm bg-red margin-r-5']);
                                }
                                return $html;
                            },
                        ],
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
