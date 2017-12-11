<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Status;
use common\models\BlogPost;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blog Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-post-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create ') . Yii::t('app', 'Blog Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            [
                'attribute'=>'catalog_id',
                'value'=>function ($model) {
                        return $model->catalog->title;
                    },
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'catalog_id',
                        BlogPost::getArrayCatalog(),
                        ['class' => 'form-control', 'prompt' => Yii::t('app', 'Please Filter')]
                    )
            ],
            'title',
            // 'content:ntext',
            // 'tags',
            // 'surname',
            // 'click',
            // 'user_id',
            'commentsCount',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                        if ($model->status === Status::STATUS_ACTIVE) {
                            $class = 'label-success';
                        } elseif ($model->status === Status::STATUS_INACTIVE) {
                            $class = 'label-warning';
                        } else {
                            $class = 'label-danger';
                        }

                        return '<span class="label ' . $class . '">' . $model->getStatus()->label . '</span>';
                    },
                'filter' => Html::activeDropDownList(
                        $searchModel,
                        'status',
                        Status::labels(),
                        ['class' => 'form-control', 'prompt' => Yii::t('app', 'PROMPT_STATUS')]
                    )
            ],
            'created_at:date',
            // 'update_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
