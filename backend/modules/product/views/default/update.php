<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = \Yii::t('app', 'update'). $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'product'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->product_id]];
$this->params['breadcrumbs'][] = \Yii::t('app', 'update');
?>
<div class="product-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'uploadModel'=>$uploadModel,
        'category'=>$category,
        'p1' => $p1,
        'p2' => $p2,
        // 商品id
        'id' => $id,
    ]) ?>

</div>
