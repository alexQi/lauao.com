<?php

use backend\assets\AdminLtePluginsICheckAsset;
use yii\helpers\StringHelper;
use yii\widgets\LinkPager;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $params */

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
AdminLtePluginsICheckAsset::register($this);
?>
<div class="row">
    <?php echo $this->render('message-menu',['params'=>$params]); ?>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Inbox</h3>

                <div class="box-tools">
                    <div class="has-feedback input-group col-lg-2  pull-right">
                        <!-- /btn-group -->
                        <input type="text" id="mail-keyword" class="form-control input-sm" value="<?php echo isset($params['keyword']) ? $params['keyword'] :''; ?>" placeholder="Search Mail">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-info btn-sm mail-search">搜索</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                        <?php echo LinkPager::widget([
                            'pagination' => $result['page'],
                            'options' => [
                                'class' => 'pagination pagination-sm no-margin'
                            ]
                        ]); ?>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.pull-right -->
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                        <?php if(!empty($result['list'])):?>
                            <?php foreach($result['list'] as $key=>$value):?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td class="mailbox-star">
                                        <a href="#">
                                            <i class="fa fa-star-o text-yellow"></i>
                                        </a>
                                    </td>
                                    <td class="mailbox-name"><a href="javascript:void(0)"><?php echo $value['username']; ?></a></td>
                                    <td class="mailbox-subject">
                                        <?php $value['content'] = preg_replace("/<[^>]+>/", "", $value['content']);?>
                                        <a class="text-muted" href="<?php echo $value['status']!=2 ? Url::to(['update','id'=>$value['id']]):Url::to(['view','id'=>$value['id']]); ?>">
                                            <b><?php echo $value['title']; ?></b> - <?php echo StringHelper::truncate($value['content'],40); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if($value['status']==2):?>
                                            <span class="label label-success">Send</span>
                                        <?php else: ?>
                                            <span class="label label-danger">Fail</span>
                                        <?php endif;?>
                                    </td>
                                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                                    <td class="mailbox-date">
                                        <?php echo date('Y-m-d H:i',$value['updated_at']); ?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">
                                    未查询到记录.....
                                </td>
                            </tr>
                        <?php endif;?>
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                        <?php echo LinkPager::widget([
                            'pagination' => $result['page'],
                            'options' => [
                                'class' => 'pagination pagination-sm no-margin'
                            ]
                        ]); ?>
                        <!-- /.btn-group -->
                    </div>
                    <!-- /.pull-right -->
                </div>
            </div>
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>
<script>
    $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        $('.mail-search').click(function(){
            var keyword = $('#mail-keyword').val();
            var url = "<?php echo Url::to(['index','folder'=>$params['folder']])?>";
            if ($.trim(keyword)){
                url += '&keyword='+$.trim(keyword);
            }
            window.location.href = url;
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
            e.preventDefault();
            //detect type
            var $this = $(this).find("a > i");
            var glyph = $this.hasClass("glyphicon");
            var fa = $this.hasClass("fa");

            //Switch states
            if (glyph) {
                $this.toggleClass("glyphicon-star");
                $this.toggleClass("glyphicon-star-empty");
            }

            if (fa) {
                $this.toggleClass("fa-star");
                $this.toggleClass("fa-star-o");
            }
        });
    });
</script>
