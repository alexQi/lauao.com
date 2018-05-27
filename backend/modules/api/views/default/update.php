<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ApiBase */

$this->title                   = '编辑API';
$this->params['breadcrumbs'][] = ['label' => 'API接口列表', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->api_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title . '：' . $model->api_name;
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

            <p>发现问题请点<a href="mailto:514438556@qq.com">我</a>发送邮件，记得截图哟</p>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="nav-tabs-custom">
        <div class="tab-content">
            <?=$this->render('_form', [
                'model' => $model,
            ])?>
        </div>
    </div>
</div>