<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ApiBase */

$this->title = $model->api_name;
$this->params['breadcrumbs'][] = ['label' => 'Api Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="api-base-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'api_name',
            'url:url',
            'url_path:url',
            'request_method',
            'query_string',
            'invoke_string',
            'status',
            'created_at:datetime',
            'updated_at:datetime',
            'is_default',
        ],
    ]) ?>

</div>
