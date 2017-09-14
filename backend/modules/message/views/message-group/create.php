<?php

use yii\helpers\Html;
use yii\helpers\Json;
use backend\modules\admin\AnimateAsset;
use yii\web\YiiAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $mailList [] */

$this->title = Yii::t('app', '添加消息组');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '用户组'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'mailList' => $mailList
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cloud"></i></span>
                                <input type="text" name="group_name" class="form-control group-name" placeholder="组名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-comments"></i></span>
                                <select name="type" class="form-control group-type">
                                    <option value="1">邮件(email)</option>
                                    <option value="2">消息(message)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group new-email">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input id="inp-route" type="text" class="form-control" placeholder="新地址">
                                <span class="input-group-btn">
                                <?= Html::a(Yii::t('app', 'create') . $animateIcon, ['/ajax/message/add-new-mail'], [
                                    'class' => 'btn btn-success',
                                    'id' => 'btn-new'
                                ]) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input class="form-control search" data-target="avaliable"
                                   placeholder="Search for avaliable">
                            <span class="input-group-btn">
                                <?= Html::a('<span class="glyphicon glyphicon-refresh"></span>', ['/ajax/message/refresh'], [
                                    'class' => 'btn btn-default btn-flat',
                                    'id' => 'btn-refresh'
                                ]) ?>
                            </span>
                        </div>
                        <select multiple size="20" class="form-control list" data-target="avaliable"></select>
                    </div>
                    <div class="col-sm-1 padding">
                        <div class="margin">
                            <p class="text-center">
                                <?= Html::a('&gt;&gt;' . $animateIcon, ['/ajax/message/assign'], [
                                    'class' => 'btn btn-success btn-assign',
                                    'data-target' => 'avaliable',
                                    'title' => 'Assign'
                                ]) ?>
                            </p>
                            <p class="text-center">
                                <?= Html::a('&lt;&lt;' . $animateIcon, ['/ajax/message/remove'], [
                                    'class' => 'btn btn-danger btn-assign',
                                    'data-target' => 'assigned',
                                    'title' => 'Remove'
                                ]) ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control search" data-target="assigned"
                               placeholder="Search for assigned">
                        <select multiple size="20" class="form-control list" data-target="assigned"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 margin">
                        <div class="btn-group">
                            <input type="button" class="btn btn-default margin btn-flat cancel-create" value="取消并返回">
                            <input type="button" class="btn btn-info margin btn-flat confirm-create"   value="保存用户组">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        //取消提交
        $('.cancel-create').click(function () {
            window.location.href='<?php echo Url::to(['index']);?>';
        });

        //提交数据
        $('.confirm-create').click(function () {
            var groupName = $('.group-name').val().trim();
            var groupType = $('.group-type option:selected').val().trim();

            if (groupName=='')
            {
                showAlert('用户组名称不能为空~');
                return false;
            }

            $.post("<?php echo Url::to(['/ajax/message/deal-message-group'])?>", {groupName: groupName,groupType:groupType}, function (r) {
                if (r.state==1){
                    bootbox.alert({
                        title: '<i class="fa fa-info text-info"></i> 提示',
                        buttons: {
                            ok: {
                                label: '我知道啦~',
                                className: 'btn bg-olive'
                            }
                        },
                        message: r.message,
                        callback: function() {
                            window.location.href = '<?php echo Url::to(['index'])?>';
                        }
                    });
                }else{
                    showAlert(r.message);
                }
            });
        });
    });
</script>
