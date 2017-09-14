<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = \Yii::t('app', 'update') . $model->cate_name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'cate'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cate_name, 'url' => ['view', 'id' => $model->cate_id]];
$this->params['breadcrumbs'][] = \Yii::t('app', 'update');
?>
<div class="category-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
