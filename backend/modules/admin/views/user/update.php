<?php

/* @var $this \yii\web\View */
/* @var $content string */

$this->title = \Yii::t('app', '用户信息');
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?= $directoryAsset ?>/img/user4-128x128.jpg" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $model->username; ?></h3>

            <p class="text-muted text-center">Software Engineer</p>

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

    <!-- About Me Box -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

            <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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