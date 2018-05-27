<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ApiBase */

$this->title                   = '添加API配置';
$this->params['breadcrumbs'][] = ['label' => 'API接口列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?=Html::encode($this->title)?></h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <td class="text-right" width="120">API名称</td>
                        <td class="text-left"><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-right">调用别名</td>
                        <td class="text-left"><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-right">API地址</td>
                        <td class="text-left"><input type="text" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="text-right">请求方式</td>
                        <td class="text-left"><input type="radio"> GET <input type="radio"> POST</td>
                    </tr>
                    <tr>
                        <td class="text-right">系统参数</td>
                        <td class="text-left">
                            <table class="table table-bordered no-margin">
                                <tr>
                                    <td class="text-right" width="130">APP ID</td>
                                    <td class="text-left"><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td class="text-right">APP KEY</td>
                                    <td class="text-left"><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td class="text-right">APP SECRET</td>
                                    <td class="text-left"><input type="text" class="form-control"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>