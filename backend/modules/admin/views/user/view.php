<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\admin\components\Helper;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use backend\modules\admin\AnimateAsset;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$controllerId = $this->context->uniqueId . '/';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-body">
                <p>
                    <?php
                    if ($model->status == 0 && Helper::checkRoute($controllerId . 'activate')) {
                        echo Html::a(Yii::t('rbac-admin', 'Activate'), ['activate', 'id' => $model->id], [
                            'class' => 'btn btn-primary',
                            'data' => [
                                'confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                                'method' => 'post',
                            ],
                        ]);
                    }
                    ?>
                    <?php
                    if (Helper::checkRoute($controllerId . 'delete')) {
                        echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]);
                    }
                    ?>
                </p>

                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'label' => '用户名',
                            'attribute' => 'username',
                            'format' => 'html',
                            'value' => function($model) {
                                return $model->username;
                            }
                        ],
                        [
                            'label' => '状态',
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function($model) {
                                $string = $model->status==0 ? 'Forbid' : '正常';
                                $class  = $model->status==10 ? 'danger': '禁用';
                                $html   ='<span class="label label-'.$class.'">'.$string.'</span>';
                                return $html;
                            },
                            'filter' => [
                                0 => 'Inactive',
                                10 => 'Active'
                            ]
                        ],
                        [
                            'label' => '创建时间',
                            'attribute' => 'created_at',
                            'format' => 'html',
                            'value' => function($model) {
                                return date('Y-m-d H:i:s',$model->created_at);
                            }
                        ],
                    ],
                ])
                ?>

            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<?php
/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\Assignment */
/* @var $fullnameField string */

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $assModel->getItems()
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="assignment-index">
    <div class="row">
        <div class="col-sm-5">
            <input class="form-control search" data-target="avaliable"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for avaliable') ?>">
            <select multiple size="20" class="form-control list" data-target="avaliable">
            </select>
        </div>
        <div class="col-sm-1">
            <br><br>
            <?= Html::a('&gt;&gt;' . $animateIcon, ['user/assign', 'id' => (string)$model->id], [
                'class' => 'btn btn-success btn-assign',
                'data-target' => 'avaliable',
                'title' => Yii::t('rbac-admin', 'Assign')
            ]) ?><br><br>
            <?= Html::a('&lt;&lt;' . $animateIcon, ['user/revoke', 'id' => (string)$model->id], [
                'class' => 'btn btn-danger btn-assign',
                'data-target' => 'assigned',
                'title' => Yii::t('rbac-admin', 'Remove')
            ]) ?>
        </div>
        <div class="col-sm-5">
            <input class="form-control search" data-target="assigned"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for assigned') ?>">
            <select multiple size="20" class="form-control list" data-target="assigned">
            </select>
        </div>
    </div>
</div>
