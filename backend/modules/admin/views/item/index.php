<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use backend\modules\admin\components\RouteRule;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\modules\admin\models\searchs\AuthItem */
/* @var $context backend\modules\admin\components\ItemController */

$context                       = $this->context;
$labels                        = $context->labels();
$this->title                   = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>
                <div class="box-tools">
                    <?=Html::a(
                        Yii::t('rbac-admin', 'Create ' . $labels['Item']).' <i class="fa fa-plus"></i>',
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
                    'filterModel' => $searchModel,
                    'layout'       => "{items}{summary}{pager}",
                    'summary'      => "<span class='dataTables_info'>当前共有{totalCount}条数据,分为{pageCount}页,当前为第{page}页</span>",
                    'options'      => [
                        'class' => 'col-sm-12 no-padding'
                    ],
                    'pager' => [
                        'options'=>[
                            'class' => 'pagination pull-right no-margin',
                        ]
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'name',
                            'label' => Yii::t('rbac-admin', 'Name'),
                        ],
                        [
                            'attribute' => 'ruleName',
                            'label' => Yii::t('rbac-admin', 'Rule Name'),
                            'filter' => $rules
                        ],
                        [
                            'attribute' => 'description',
                            'label' => Yii::t('rbac-admin', 'Description'),
                        ],
                        [
                            'class' => 'backend\components\LauaoActionColumn',
                            'template' => '{view} {update} {delete}',
                            'buttons' => [
                                'update' => function($url, $model) {
                                    $options = [
                                        'class' => 'btn btn-sm margin-r-5 bg-purple detail-link',
                                        'title' => Yii::t('rbac-admin', 'Update'),
                                        'data-pjax'   => "0",
                                        'data-key'    => $model->name,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#activity-modal',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);
                                }
                            ],
                            "headerOptions" => [
                                "width" => "200"
                            ],
                        ],
                    ],
                ])
                ?>
                <?php Modal::begin([
                'id'     => 'activity-modal',
                'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> ITEM MANAGER</h4>',
                'size'   => Modal::SIZE_LARGE,
                ]);?>
                <?php Modal::end();?>
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
                    $('.modal-body').html(data);
                    $('#activity-modal').modal();
                }
            );
        });
    "
);
?>