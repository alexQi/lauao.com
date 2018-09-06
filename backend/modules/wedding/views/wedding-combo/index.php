<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WeddingComboSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Wedding Combos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>

                <div class="box-tools">
                    <?=Html::a(
                        '<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create Wedding Combo'),
                        ['create'],
                        [
                            'class'       => 'btn btn-sm btn-info detail-link',
                            'data-key'    => '',
                            'data-toggle' => 'modal',
                            'data-target' => '#combo-modal',
                        ]
                    )?>
                </div>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>
                <?=GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'layout'       => "{items}{summary}{pager}",
                    'summary'      => "<span class='dataTables_info'>当前共有{totalCount}条数据,分为{pageCount}页,当前为第{page}页</span>",
                    'options'      => [
                        'class' => 'col-sm-12 no-padding'
                    ],
                    'pager'        => [
                        'options' => [
                            'class' => 'pagination pull-right no-margin',
                        ]
                    ],
                    'columns'      => [
                        //['class' => 'yii\grid\SerialColumn'],


                         [
                            'label'         => '套餐ID',
                            'attribute'     => 'combo_id',
                            "headerOptions" => [
                                "width" => "100"
                            ],
                        ],
                        [
                            'label' => '部門',
                            'attribute'=>'section_id',
                            'format' => 'html',
                            'value'=>function ($model) {
                                $sectionList = \common\models\WeddingCombo::getSectionList();
                                return  $sectionList[$model->section_id];
                            },
                            'filter' => \common\models\WeddingCombo::getSectionList(), //筛选的数据
                            "headerOptions" => [
                                "width" => "120"
                            ],
                        ],
                        'combo_name',
                        'price',
                       // 'user_id',
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
                        // 'created_at',
                        // 'updated_at',
                        [
                            'class'         => 'backend\components\LauaoActionColumn',
                            'template'      => '{view} {update} {delete}',
                            'buttons'       => [
                                'update' => function ($url, $model) {
                                    $options = [
                                        'class'       => 'btn btn-sm margin-r-5 bg-purple detail-link',
                                        'title'       => Yii::t('app', 'Update'),
                                        'data-pjax'   => "0",
                                        'data-key'    => $model->combo_name,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#combo-modal',
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
            </div>
            <?php Modal::begin([
                'id'     => 'combo-modal',
                'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 套餐</h4>',
                'size'   => Modal::SIZE_LARGE,
            ]); ?>
            <?php Modal::end(); ?>
        </div>
    </div>
</div>
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
