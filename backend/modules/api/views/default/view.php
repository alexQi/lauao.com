<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ApiBase */

$this->title                   = $model->api_name;
$this->params['breadcrumbs'][] = ['label' => 'Api Bases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-3">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">ABOUT API</h3>
        </div>
        <div class="box-body">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="fa fa-book margin-r-5"></i> 提醒!</h4>
                当前API主要作为查询，及聊天机器人使用，如有其他类型API,将重新改写API模块
            </div>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> 可选请求方式</strong>
            <p class="text-muted">
                <span class="label label-danger">GET</span>
                <span class="label label-success">POST</span>
                <span class="label label-info">PUT</span>
                <span class="label label-warning">DELETE</span>
                <span class="label label-primary">VIEW</span>
            </p>
            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i> 备注</strong>

            <p>有问题请点<a href="mailto:514438556@qq.com">我</a>发送问题截图描述</p>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="nav-tabs-custom">
        <div class="tab-content">
            <?=DetailView::widget([
                'model'      => $model,
                'attributes' => [
                    'id',
                    'api_name',
                    'url:url',
                    'url_path:url',
                    'request_method',
                    'query_string',
                    'invoke_string',
                    'status',
                    'created_at:datetime',
                    [
                        'attribute'=>'is_default',
                        'format' => 'html',
                        'value'=>function ($model) {
                            $string = $model->is_default==1 ? '未设置默认' : '默认';
                            $html   ='<span class="label label-success">'.$string.'</span>';
                            return $html;
                        },
                    ],
                ],
            ])?>
        </div>
    </div>
</div>