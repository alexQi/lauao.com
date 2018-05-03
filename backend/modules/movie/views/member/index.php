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
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

                <div class="box-tools">
        <?= Html::a('添加成员', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'avatar_url:url',
            'name',
            'sort',
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttonOptions' => [
                    'class' => 'btn btn-sm bg-olive margin-r-5'
                ],
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
