<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\VideoCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

                <div class="box-tools">
        <?= Html::a('创建新分类', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
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
                            'id',
                            [
                                'label' => '类型',
                                'attribute'=>'type',
                                'format' => 'html',
                                'value'=>function ($model) {
                                    $string = $model->type==1 ? '作品' : '创作人';
                                    $class  = $model->type==1 ? 'danger' : 'success';
                                    $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                                    return $html;
                                },
                                'filter' => ['1'=>'作品','2'=>'创作人'], //筛选的数据
                                "headerOptions" => [
                                    "width" => "80"
                                ],
                            ],
                            'cate_name',
                            'created_at',

                            [
                                'class' => 'backend\components\LauaoActionColumn',
                                'template' => '{view} {update} {delete}',
                                "headerOptions" => [
                                    "width" => "150"
                                ],
                            ],
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
