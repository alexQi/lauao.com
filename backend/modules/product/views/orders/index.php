<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

                <div class="box-tools">
        <?= Html::a('导出Excel', ['data-to-excel'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'label' => 'ID',
                'attribute'=>'id',
                "headerOptions" => [
                    "width" => "60"
                ],
            ],
            [
                'label' => '套餐种类',
                'attribute'=>'combo',
                'value'=>function ($model) {
                    $string = '';
                    if($model->combo==1){
                        $string = "A.家庭装套餐";
                    }elseif($model->combo==2){
                        $string = "B.家庭装套餐";
                    }elseif($model->combo==3){
                        $string = "C.家庭装套餐";
                    }
                    return $string;
                },
                "headerOptions" => [
                    "width" => "120"
                ],
            ],
            [
                'label' => '数量',
                'attribute'=>'num',
                'value'=>function ($model) {
                    return $model->num.' 份';
                },
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '支付方式',
                'attribute'=>'pay_method',
                'format' => 'html',
                'value'=>function ($model) {
                    $string = $model->pay_method==1 ? '微信支付' : '其他支付';
                    $class  = $model->pay_method==1 ? 'warning' : 'success';
                    $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                    return $html;
                },
                'filter' => ['1'=>'微信支付','2'=>'其他支付'], //筛选的数据
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '总金额',
                'attribute'=>'total_money',
                'value'=>function ($model) {
                    return $model->total_money.' 元';
                },
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '渠道',
                'attribute'=>'channel',
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '包邮',
                'attribute'=>'is_postal',
                'format' => 'html',
                'value'=>function ($model) {
                    $string = $model->is_postal==1 ? '包邮' : '自负邮费';
                    $class  = $model->is_postal==1 ? 'info' : 'danger';
                    $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                    return $html;
                },
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '购买人',
                'attribute'=>'name',
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '手机',
                'attribute'=>'phone',
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            // 'address',
            [
                'label' => '状态',
                'attribute'=>'status',
                'format' => 'html',
                'value'=>function ($model) {
                    $string = $model->status==1 ? '未支付' : '已支付';
                    $class  = $model->status==1 ? 'danger' : 'success';
                    $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                    return $html;
                },
                'filter' => ['1'=>'未支付','2'=>'已支付'], //筛选的数据
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
            [
                'label' => '购买时间',
                'attribute'=>'pay_time',
                'value' => function($model){
                    return date('Y-m-d H:i:s',$model->pay_time);
                },
                "headerOptions" => [
                    "width" => "80"
                ],
            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>
