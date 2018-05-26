<?php

/* @var $this \yii\web\View */
/* @var $content string */

$this->title = \Yii::t('app', '用户信息').':'.$model->username;
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?= $directoryAsset ?>/img/user4-128x128.jpg" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $model->username; ?></h3>

            <p class="text-muted">
                <?php if ($model->id==2): ?>
                <span class="label label-danger">PHP</span>
                <span class="label label-success">Python</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">HTML</span>
                <span class="label label-primary">LINUX</span>
                <?php else: ?>
                    The Black Rose shall bloom once more
                <?php endif; ?>
            </p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">设置</a></li>
        </ul>
        <div class="tab-content">
            <?= $this->render('_update_form', [
                'model' => $model,
            ]) ?>
        </div>
            <!-- /.tab-pane -->
    </div>
        <!-- /.tab-content -->
</div>
    <!-- /.nav-tabs-custom -->