<?php

use backend\assets\AdminLtePluginsWysiHtml5Asset;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Message */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Message',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新消息';

AdminLtePluginsWysiHtml5Asset::register($this);
?>
<div class="row">
    <?php echo $this->render('message-menu'); ?>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Modify Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group group-mail-to">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input class="form-control mail-to" placeholder="To:" value="<?php echo $model->to; ?>">
                    </div>
                </div>
                <div class="form-group group-mail-title">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-header"></i></span>
                        <input class="form-control mail-title" placeholder="Subject:" value="<?php echo $model->title; ?>">
                    </div>
                </div>
                <div class="form-group group-mail-content">
                    <textarea id="compose-textarea" class="form-control mail-content" style="height: 300px">
                        <?php echo $model->content; ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> 附件
                        <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 2MB</p>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="pull-right">
                    <button type="button" class="btn btn-default save_mail"><i class="fa fa-pencil"></i> 存草稿</button>
                    <button type="submit" class="btn btn-primary send_mail"><i class="fa fa-envelope-o"></i> 发送</button>
                </div>
                <button type="reset" class="btn btn-default discard"><i class="fa fa-times"></i> 放弃</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();

        $(".discard").click(function(){
            bootbox.confirm(
                {
                    title  : '<i class="fa fa-warning text-red"></i> 提示',
                    message: '所有修改内容将全部丢失，确定放弃？',
                    buttons: {
                        confirm: {
                            label: "确定"
                        },
                        cancel: {
                            label: "取消"
                        }
                    },
                    callback: function (confirmed) {
                        if (confirmed){
                            window.location.href = "<?php echo Url::to(['index'])?>";
                        }
                    }
                }
            );
        });

        $('.save_mail').click(function () {
            var status = 3;
            HandleData(status);
        });

        $('.send_mail').click(function () {
            var status = 2;
            HandleData(status);
        });

        $('.mail-to').focus(function () {
            $('.group-mail-to').removeClass('has-error');
        });
        $('.mail-to').blur(function () {
            var emailReg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            if(!emailReg.test($(this).val()))
            {
                $(this).attr('placeholder','邮箱为空或邮箱格式错误');
                $('.group-mail-to').addClass('has-error');
            }
        });

        $('.mail-title').focus(function () {
            $('.group-mail-title').removeClass('has-error');
        });
        $('.mail-title').blur(function () {
            if($.trim($('.mail-title').val())=='')
            {
                $('.mail-title').attr('placeholder','标题不能为空');
                $('.group-mail-title').addClass('has-error');
            }
        });

        function HandleData(status) {
            var id           = "<?php echo $model->id?>";

            var mail_to_addr = $('.mail-to');
            var mail_to      = mail_to_addr.val();

            var emailReg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            if(!emailReg.test(mail_to))
            {
                mail_to_addr.attr('placeholder','邮箱为空或邮箱格式错误');
                $('.group-mail-to').addClass('has-error');
                return false;
            }

            var mail_title   = $('.mail-title').val();
            var mail_content = $('.mail-content').val();

            if ($.trim(mail_title)=='')
            {
                $('.mail-title').attr('placeholder','标题不能为空');
                $('.group-mail-title').addClass('has-error');
                return false;
            }

            if ($.trim(mail_content)=='')
            {
                showAlert('邮件内容不能为空');
                return false;
            }

            var url = '<?php echo Url::to(['/ajax/message/deal-mail']);?>';
            var param = {id:id,to:mail_to,title:mail_title,content:mail_content,status:status};

            $.post(url,param,function (result) {
                var message = '';
                var url = '<?php echo Url::to(['index'])?>?folder=';
                if (result.state==1){
                    if (result.status==3){
                        message = '邮件已成功存入草稿箱~';
                    }else{
                        message = '邮件已成功进入发送队列，发送中~';
                    }
                    url += 1;
                }else{
                    message = result.message+',请进入草稿箱重新发送~';
                    url += 3;
                }
                bootbox.alert({
                    title: '<i class="fa fa-warning text-info"></i> 提示',
                    buttons: {
                        ok: {
                            label: '我知道啦~',
                            className: 'btn bg-olive'
                        }
                    },
                    message: message,
                    callback: function() {
                        window.location.href = url;
                    }
                });
            },'json');
        }
    });
</script>
