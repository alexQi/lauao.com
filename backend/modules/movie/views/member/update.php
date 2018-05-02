<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VideoMember */

$this->title = '更新成员信息: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '成员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <?= $this->render('_form', [
                'model' => $model,
                'p1' => $p1,
                'p2' => $p2,
                'id' => $id
                ]) ?>
            </div>
        </div>
    </div>
</div>
