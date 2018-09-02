<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WeddingItemOrder */

$this->title = Yii::t('app', 'Create Wedding Item Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wedding Item Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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