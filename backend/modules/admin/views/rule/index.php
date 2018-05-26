<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this  yii\web\View */
/* @var $model backend\modules\admin\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\modules\admin\models\searchs\BizRule */

$this->title                   = Yii::t('rbac-admin', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>
                <div class="box-tools">
                    <?=Html::a(
                        '<i class="fa fa-plus"></i> ' . Yii::t('rbac-admin', 'Create'),
                        ['create'],
                        [
                            'class'       => 'btn btn-sm btn-info detail-link',
                            'data-key'    => '',
                            'data-toggle' => 'modal',
                            'data-target' => '#activity-modal',
                        ]
                    )?>
                </div>
            </div>
            <div class="box-body">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'name',
                            'label'     => Yii::t('rbac-admin', 'Name'),
                        ],
                        [
                            'attribute' => 'className',
                            'label'     => '类名',
                        ],
                        [
                            'class'         => 'backend\components\LauaoActionColumn',
                            'template'      => '{view} {update} {delete}',
                            'buttons'       => [
                                'update' => function ($url, $model) {
                                    $options = [
                                        'class'       => 'btn btn-sm margin-r-5 bg-purple detail-link',
                                        'title'       => Yii::t('rbac-admin', 'Update'),
                                        'data-pjax'   => "0",
                                        'data-key'    => $model->name,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#activity-modal',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                                }
                            ],
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                    ],
                ]);
                ?>
                <?php Modal::begin([
                    'id'     => 'activity-modal',
                    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-adjust"></i> 新增规则</h4>',
                    'size'   => Modal::SIZE_DEFAULT,
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
                    $('#activity-modal .modal-body').html(data);
                    $('#activity-modal').modal();
                }
            );
        });
    "
);
?>