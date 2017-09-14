<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ApiBase */

$this->title = 'Update Api Base: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Api Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->api_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="api-base-update">

<!--    <h1>--><?php //echo Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
