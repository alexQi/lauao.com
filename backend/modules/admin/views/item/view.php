<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Json;
use backend\modules\admin\AnimateAsset;
use yii\web\YiiAsset;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItem */
/* @var $context backend\modules\admin\components\ItemController */

$context                       = $this->context;
$labels                        = $context->labels();
$this->title                   = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $model->getItems()
]);

$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-body">
                <p>
                    <?=Html::a(
                        Yii::t('rbac-admin', 'Update ' . $labels['Item']),
                        ['update', 'id' => $model->name],
                        [
                            'class'       => 'btn bg-purple detail-link',
                            'data-pjax'   => "0",
                            'data-key'    => $model->name,
                            'data-toggle' => 'modal',
                            'data-target' => '#activity-modal',
                        ]
                    )?>
                    <?=Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
                        'class'        => 'btn btn-danger',
                        'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
                        'data-method'  => 'post',
                    ]);?>
                    <?=Html::a(
                        Yii::t('rbac-admin', 'Create ' . $labels['Item']),
                        ['create'],
                        [
                            'class'       => 'btn btn-success detail-link',
                            'data-key'    => '',
                            'data-toggle' => 'modal',
                            'data-target' => '#activity-modal',
                        ]
                    )?>
                </p>
                <?=
                DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'name',
                        'description:ntext',
                        'ruleName',
                        'data:ntext',
                    ],
                    'template'   => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>'
                ]);
                ?>
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-sm-5">
                        <input class="form-control search" data-target="available"
                               placeholder="<?=Yii::t('rbac-admin', 'Search for available')?>">
                        <select multiple size="20" class="form-control list" data-target="available"></select>
                    </div>
                    <div class="col-sm-1">
                        <br><br>
                        <?=Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->name], [
                            'class'       => 'btn btn-success btn-assign',
                            'data-target' => 'available',
                            'title'       => Yii::t('rbac-admin', 'Assign')
                        ])?><br><br>
                        <?=Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->name], [
                            'class'       => 'btn btn-danger btn-assign',
                            'data-target' => 'assigned',
                            'title'       => Yii::t('rbac-admin', 'Remove')
                        ])?>
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control search" data-target="assigned"
                               placeholder="<?=Yii::t('rbac-admin', 'Search for assigned')?>">
                        <select multiple size="20" class="form-control list" data-target="assigned"></select>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <p>&nbsp;</p>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<?php Modal::begin([
    'id'     => 'activity-modal',
    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> '.$labels['Item'].'</h4>',
    'size'   => Modal::SIZE_LARGE,
]);?>
<?php Modal::end();?>
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
