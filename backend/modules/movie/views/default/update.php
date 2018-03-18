<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = '更新: ' . $model->video_name;
$this->params['breadcrumbs'][] = ['label' => '视频列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->video_name, 'url' => ['view', 'id' => $model->video_id]];
$this->params['breadcrumbs'][] = $this->title
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
                    'vCate' => $vCate,
                    'p1' => $p1,
                    'p2' => $p2,
                    'id' => '',
                ]) ?>
            </div>
        </div>
    </div>
</div>
