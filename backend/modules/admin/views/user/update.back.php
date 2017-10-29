<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Yii::t('rbac-admin', 'Update').': ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('rbac-admin', 'Update');
?>
<div class="user-update">

    <?= $this->render('_update_form', [
        'model' => $model,
    ]) ?>

</div>
