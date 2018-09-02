<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WeddingCombo */

$this->title = $model->combo_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wedding Combos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wedding-combo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->combo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->combo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'combo_id',
            'section_id',
            'combo_name',
            'price',
            'user_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
