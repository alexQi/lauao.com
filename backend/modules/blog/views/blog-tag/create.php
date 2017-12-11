<?php

/* @var $this yii\web\View */
/* @var $model common\models\BlogTag */

$this->title = Yii::t('app', 'Create ') . Yii::t('app', 'Blog Tag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-tag-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
