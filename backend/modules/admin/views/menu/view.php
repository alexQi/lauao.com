<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <p>
                        <?=Html::a(
                            '更新',
                            ['update', 'id' => $model->id],
                            [
                                'class'       => 'btn bg-purple detail-link',
                                'data-pjax'   => "0",
                                'data-key'    => $model->id,
                                'data-toggle' => 'modal',
                                'data-target' => '#activity-modal',
                            ]
                        )?>
                        <?=Html::a('删除', ['delete', 'id' => $model->id], [
                            'class'        => 'btn btn-danger',
                            'data-confirm' => '确认删除?',
                            'data-method'  => 'post',
                        ]);?>
                        <?=Html::a(
                            '新增菜单',
                            ['create'],
                            [
                                'class'       => 'btn btn-success detail-link',
                                'data-key'    => '',
                                'data-toggle' => 'modal',
                                'data-target' => '#activity-modal',
                            ]
                        )?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'menuParent.name:text:父级菜单',
                            'name',
                            'route',
                            'order',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    'id'     => 'activity-modal',
    'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 菜单</h4>',
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