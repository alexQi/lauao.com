<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WeddingSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Wedding Sections');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>

                <div class="box-tools">
                    <?=Html::a(
                        '<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Wedding Section'),
                        ['create'],
                        [
                            'class'       => 'btn btn-sm btn-info detail-link',
                            'data-key'    => '',
                            'data-toggle' => 'modal',
                            'data-target' => '#section-modal',
                        ]
                    )?>
                </div>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>    <?=GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'columns'      => [
                        [
                            'label'         => '部门ID',
                            'attribute'     => 'section_id',
                            "headerOptions" => [
                                "width" => "50"
                            ],
                        ],
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
                            'attribute'=>'created_at',
                            'format'=>'date'
                        ],
                        [
                            'attribute'=>'updated_at',
                            'format'=>'date'
                        ],
                        [
                            'class'         => 'backend\components\LauaoActionColumn',
                            'template'      => '{view} {update} {delete}',
                            'buttons'       => [
                                'update' => function ($url, $model) {
                                    $options = [
                                        'class'       => 'btn btn-sm margin-r-5 bg-purple detail-link',
                                        'title'       => Yii::t('app', 'Update'),
                                        'data-pjax'   => "0",
                                        'data-key'    => $model->section_name,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#section-modal',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                                }
                            ],
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                    ],
                ]);?>
                <?php Pjax::end(); ?>
                <?php Modal::begin([
                    'id'     => 'section-modal',
                    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 部门</h4>',
                    'size'   => Modal::SIZE_LARGE,
                ]); ?>
                <?php Modal::end(); ?>
            </div>
        </div>
    </div>
</div>
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
