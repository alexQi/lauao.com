<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WeddingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Wedding Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>

                <div class="box-tools">
                    <?=Html::a(Yii::t('app', 'Create Wedding Order'), ['create'], ['class' => 'btn btn-success'])?>
                </div>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>    <?=GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'order_id',
                        'order_sn',
                        'order_source',
                        'customer_name',
                        'customer_mobile',
                        // 'wedding_date',
                        // 'wedding_address',
                        // 'project_process',
                        // 'remark',
                        // 'user_id',
                        // 'created_at',
                        // 'updated_at',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
