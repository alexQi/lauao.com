<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ApiBase */

$this->title = 'Create Api Base';
$this->params['breadcrumbs'][] = ['label' => 'Api Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="api-base-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
