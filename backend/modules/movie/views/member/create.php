<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoMember */

$this->title = '添加成员';
$this->params['breadcrumbs'][] = ['label' => '成员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
                'p1' => $p1,
                'p2' => $p2,
                'id' => '',
            ]) ?>
            </div>
        </div>
    </div>
</div>
