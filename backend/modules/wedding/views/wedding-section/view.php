<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\WeddingSection */

$this->title                   = $model->section_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wedding Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-base-view">

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?=Html::encode($this->title)?></h3>
                </div>
                <div class="box-body">
                    <p>
                        <?=Html::a('更新', ['update', 'id' => $model->section_id],
                            [
                                'class'       => 'btn btn-info detail-link',
                                'data-key'    => '',
                                'data-toggle' => 'modal',
                                'data-target' => '#section-modal',
                            ])?>
                        <?=Html::a('删除', ['delete', 'id' => $model->section_id], [
                            'class' => 'btn btn-danger',
                            'data'  => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method'  => 'post',
                            ],
                        ])?>
                    </p>

                    <?=DetailView::widget([
                        'model'      => $model,
                        'attributes' => [
                            'section_id',
                            'section_name',
                            'desc',
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
                    ])?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    'id'     => 'section-modal',
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
                    $('#section-modal .modal-body').html(data);
                    $('#section-modal').modal();
                }
            );
        });
    "
);
?>
