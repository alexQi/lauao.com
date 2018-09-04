<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model common\models\WeddingCombo */

$this->title = $model->combo_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wedding Combos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wedding-combo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->combo_id],
            ['class' => 'btn btn-primary',
            'data-key'    => '',
                                'data-toggle' => 'modal',
                                'data-target' => '#combo-modal',
            ]) ?>

        <?= Html::a('刪除', ['delete', 'id' => $model->combo_id], [
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
            'combo_id',
            'section_id',
            'combo_name',
            'price',
            [
                'label'         => '操作者',
                'attribute'     => 'real_name',
                'format'        => 'html',
                'value'         => function ($model) {
                    return $model->userExtend['real_name'];
                },
                "headerOptions" => [
                    "width" => "100"
                ],
            ],
            [
                'label' => '创建时间',
                'attribute'=>'created_at',
                'format' => 'date',
            ],
            [
                'label' => '更新时间',
                'attribute'=>'updated_at',
                'format' => 'date',
            ],
        ],
    ]) ?>

</div>\
<?php Modal::begin([
    'id'     => 'combo-modal',
    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 部门</h4>',
    'size'   => Modal::SIZE_LARGE,
]); ?>
<?php Modal::end(); ?>
<?php
$this->registerJs(
    "
        $(document).on(\"click\",\".detail-link\",function() {
            $.get($(this).attr(\"href\"),
                function (data) {
                    $('#combo-modal .modal-body').html(data);
                    $('#combo-modal').modal();
                }
            );
        });
    "
);
?>