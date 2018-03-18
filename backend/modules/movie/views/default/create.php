<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = '新建';
$this->params['breadcrumbs'][] = ['label' => '视频列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
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
