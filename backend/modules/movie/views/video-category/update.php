<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VideoCategory */

$this->title = '更新分类: ' . $model->cate_name;
$this->params['breadcrumbs'][] = ['label' => '分类列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cate_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新分类';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
