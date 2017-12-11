<?php

/* @var $this yii\web\View */
/* @var $model common\models\BlogPost */

$this->title = Yii::t('app', 'Create ') . Yii::t('app', 'Blog Post');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-post-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
