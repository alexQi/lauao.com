<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WeddingCombo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Wedding Combo',
]) . $model->combo_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wedding Combos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->combo_id, 'url' => ['view', 'id' => $model->combo_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
