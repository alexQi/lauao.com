<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ActivityAdvert */
/* @var $activityList common\models\ActivityBase */
/* @var $p1 */
/* @var $p2 */
/* @var $id */

$this->title = '新增广告';
$this->params['breadcrumbs'][] = ['label' => '广告列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
