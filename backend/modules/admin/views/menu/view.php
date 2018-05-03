<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-body">
                    <p>
                        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('删除', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '确认删除?',
                                'method' => 'post',
                            ],
                        ]) ?>
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