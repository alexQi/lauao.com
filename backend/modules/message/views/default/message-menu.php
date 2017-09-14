<?php
use yii\helpers\Url;
$actionId = Yii::$app->controller->action->id;
?>
<div class="col-md-3">
    <a href="<?php echo $actionId=='index'?Url::to(['create']):Url::to(['index']); ?>" class="btn btn-primary btn-block margin-bottom"><?php echo $actionId=='index'?'New Message':'Back to Box'; ?></a>

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">

                <li class="<?php echo isset($params) && $params['folder'] == 1 ? 'active' : ''; ?>">
                    <a href="<?php echo Url::to(['index', 'folder' => 1]); ?>">
                        <i class="fa fa-envelope-o"></i> 发件箱
                    </a>
                </li>
                <li class="<?php echo isset($params) && $params['folder'] == 3 ? 'active' : ''; ?>">
                    <a href="<?php echo Url::to(['index', 'folder' => 3]); ?>">
                        <i class="fa fa-file-text-o"></i> 草稿箱
                    </a>
                </li>
<!--                <li>-->
<!--                    <a href="#">-->
<!--                        <i class="fa fa-filter"></i> 垃圾邮件 <span class="label label-warning pull-right">65</span>-->
<!--                    </a>-->
<!--                </li>-->
                <li class="<?php echo isset($params) && $params['folder'] == 4 ? 'active' : ''; ?>">
                    <a href="<?php echo Url::to(['index', 'folder' => 4]); ?>">
                        <i class="fa fa-trash-o"></i> 回收站
                    </a>
                </li>
                <li class="<?php echo isset($params) && $params['folder'] == 2 ? 'active' : ''; ?>">
                    <a href="<?php echo Url::to(['index', 'folder' => 2]); ?>">
                        <i class="fa fa-inbox"></i> 收件箱
                        <span class="label label-primary pull-right">12</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <div class="box box-solid collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Labels</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>