<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'product');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(\Yii::t('app', 'create product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=>['class'=>'table table-striped table-bordered table-hover'],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'name',
            ['label'=>\Yii::t('app', 'cate name'),'attribute' => 'cate_name',  'value' => 'cate.cate_name' ],
            'price',
            'content:ntext',
            [
                'attribute'=>'create_time',
                'format'=>['date', 'php:Y-m-d H:i:s']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
