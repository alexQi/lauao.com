<?php

/* @var $this yii\web\View */
/* @var $model common\models\BlogCatalog */

$this->title = Yii::t('app', 'Create ') . Yii::t('app', 'Blog Catalog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Catalogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-catalog-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
