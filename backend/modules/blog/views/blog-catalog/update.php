<?php

/* @var $this yii\web\View */
/* @var $model funson86\blog\models\BlogCatalog */

$this->title = Yii::t('app', 'Update ') . Yii::t('app', 'Blog Catalog') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="blog-catalog-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
