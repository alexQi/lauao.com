<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItem */
/* @var $context backend\modules\admin\components\ItemController */

$context                       = $this->context;
$labels                        = $context->labels();
$this->title                   = Yii::t('rbac-admin', 'Update ' . $labels['Item']) . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('rbac-admin', 'Update');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h5 class="box-title"><?=Html::encode($this->title)?></h5>
            </div>
            <div class="box-body">
                <?=
                $this->render('_form', [
                    'model' => $model,
                ]);
                ?>
            </div>
        </div>
    </div>
</div>