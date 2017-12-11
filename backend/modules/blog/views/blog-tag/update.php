<?php

/* @var $this yii\web\View */
/* @var $model common\models\BlogTag */

$this->title = Yii::t('app', 'Update ') . Yii::t('app', 'Blog Tag') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="blog-tag-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
