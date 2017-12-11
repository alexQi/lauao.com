<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\BlogCatalog;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogCatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blog Catalogs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-catalog-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create ') . Yii::t('app', 'Blog Catalog'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th><?=Yii::t('app', 'Title') ?> </th>
            <th><?=Yii::t('app', 'Sort Order') ?></th>
            <th><?=Yii::t('app', 'Template') ?></th>
            <th><?=Yii::t('app', 'Is Nav') ?></th>
            <th><?=Yii::t('app', 'Status') ?></th>
            <th><?=Yii::t('app', 'Actions') ?></th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($dataProvider as $item){ ?>
        <tr data-key="1">
            <td><?= $item['id']; ?></td>
            <td><?= $item['str_label']; ?></td>
            <td><?= $item['sort_order']; ?></td>
            <td><?= $item['template']; ?></td>
            <td><?= BlogCatalog::getOneIsNavLabel($item['is_nav']); ?></td>
            <td><?= \funson86\blog\models\Status::labels()[$item['status']]; ?></td>
            <td>
                <a href="<?= \Yii::$app->getUrlManager()->createUrl(['blog/blog-catalog/create','parent_id'=>$item['id']]); ?>" title="<?= Yii::t('app', 'Add Sub Catelog');?>" data-pjax="0"><span class="glyphicon glyphicon-plus-sign"></span></a>
                <a href="<?= \Yii::$app->getUrlManager()->createUrl(['blog/blog-catalog/view','id'=>$item['id']]); ?>"" title="<?= Yii::t('app', 'View');?>" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="<?= \Yii::$app->getUrlManager()->createUrl(['blog/blog-catalog/update','id'=>$item['id']]); ?>"" title="<?= Yii::t('app', 'Update');?>" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="<?= \Yii::$app->getUrlManager()->createUrl(['blog/blog-catalog/delete','id'=>$item['id']]); ?>"" title="<?= Yii::t('app', 'Delete');?>" data-confirm="<?= Yii::t('app', 'Are you sure you want to delete this item?');?>" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
