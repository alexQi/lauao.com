<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VideoMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '成员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

                <div class="box-tools">
        <?= Html::a('添加成员', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
    <?= GridView::widget([
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
            [
                'attribute'=>'id',
                "headerOptions" => [
                    "width" => "80"
                ],
            ],

            'avatar_url:url',
            [
                'attribute'=>'name',
                "headerOptions" => [
                    "width" => "100"
                ],
            ],
            [
                'attribute'=>'sort',
                "headerOptions" => [
                    "width" => "100"
                ],
            ],
            [
                'attribute'=>'created_at',
                "headerOptions" => [
                    "width" => "110"
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
