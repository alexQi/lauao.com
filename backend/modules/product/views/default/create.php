<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = \Yii::t('app', 'create product');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'product'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

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
