<?php

/* @var $this yii\web\View */
/* @var $model common\models\BlogComment */

$this->title = Yii::t('app', 'Create ') . Yii::t('app', 'Blog Comment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-comment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
