<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VideoCategory */

$this->title = $model->cate_name;
$this->params['breadcrumbs'][] = ['label' => '分类列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-advert-view">

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div>
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
                            'id',
                            [
                                'label' => '分类类型',
                                'attribute'=>'type',
                                'value'=>function ($model) {
                                    switch ($model->type)
                                    {
                                        case 1:
                                            $string = "作品";
                                            break;
                                        case 2:
                                            $string = "创作人";
                                            break;
                                        default:
                                            //.....
                                            $string = "未知类型";
                                    }
                                    return $string;
                                }
                            ],
                            'cate_name',
                            'created_at',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
