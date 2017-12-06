<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\modules\admin\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Signup');
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
                    'p1' => $p1,
                    'p2' => $p2,
                    'id' => '',
                    'sectionList' => $sectionList
                ]) ?>
            </div>
        </div>
    </div>
</div>
