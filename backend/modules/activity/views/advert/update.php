<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityAdvert */
/* @var $activityList common\models\ActivityBase */
/* @var $p1 */
/* @var $p2 */
/* @var $id */


$this->title = '修改广告: ' . $model->advert_title;
$this->params['breadcrumbs'][] = ['label' => '广告列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->advert_title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
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
                'activityList' => $activityList,
                'p1' => $p1,
                'p2' => $p2,
                'id' => '',
                ]) ?>
            </div>
        </div>
    </div>
</div>
