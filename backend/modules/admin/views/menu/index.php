<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\modules\admin\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                <div class="box-tools">
                    <?= Html::a(Yii::t('rbac-admin', 'Create Menu'), ['create'], ['class' => 'btn btn-sm btn-info']) ?>
                </div>
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout'       => "{items}{summary}{pager}",
                    'summary'      => "<span class='dataTables_info'>当前共有{totalCount}条数据,分为{pageCount}页,当前为第{page}页</span>",
                    'options'      => [
                        'class' => 'col-sm-12 no-padding'
                    ],
                    'pager' => [
                        'options'=>[
                            'class' => 'pagination pull-right no-margin',
                        ]
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => '图标',
                            'attribute'     => 'data',
                            'format'        => 'raw',
                            'value'         => function ($model) {
                                $data = json_decode($model->data, true);
                                if (isset($data['icon'])){
                                    $html = '<i class="fa fa-'.$data['icon'].'"></i>';
                                }else{
                                    $html = '<i class="fa fa-circle-o"></i>';
                                }
                                return $html;
                            },
                            "headerOptions" => [
                                "width" => "80",
                                'class' => 'text-center'
                            ],
                            "contentOptions" => [
                                'class' => 'text-center'
                            ]
                        ],
                        [
                            'attribute'     => 'name',
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                        [
                            'attribute' => 'menuParent.name',
                            'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                                'class' => 'form-control', 'id' => null
                            ]),
                            'label' => Yii::t('rbac-admin', 'Parent'),
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                        [
                            'attribute'     => 'route',
                            "headerOptions" => [
                                "width" => "300"
                            ],
                        ],
                        'order',
                        [
                            'class' => 'backend\modules\admin\components\LauaoActionColumn',
                            'template' => '{view} {update} {delete}',
                            "headerOptions" => [
                                "width" => "150"
                            ],
                        ],
                    ],
                ]);
                ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>

