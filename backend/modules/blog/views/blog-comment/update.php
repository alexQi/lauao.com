<?php

/* @var $this yii\web\View */
/* @var $model common\models\BlogComment */

$this->title = Yii::t('app', 'Update ') . Yii::t('app', 'Blog Comment') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="blog-comment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
