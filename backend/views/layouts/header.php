<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><b>E</b>CC</span><span class="logo-lg"><b>LAUAO</b>' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">切换菜单</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs time-clock"></span>
                    </a>
                </li>
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success message-num"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header chat-num-notice"></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu chat-list"></ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"></span>
                    </a>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo isset(yii::$app->user->identity->username) ?yii::$app->user->identity->username :'' ; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php echo isset(yii::$app->user->identity->username) ?yii::$app->user->identity->username :'' ; ?> - PHP
                                <small>The Black Rose shall bloom once more</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Flowers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?=Html::a(
                                    '修改密码',
                                    ['/admin/user/change-password'],
                                    [
                                        'class'       => 'btn btn-default btn-flat passwd-link',
                                        'data-key'    => '',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#passwd-modal',
                                    ]
                                )?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    '退出',
                                    ['/site/default/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php Modal::begin([
    'id'     => 'passwd-modal',
    'header' => '<h5 class="modal-title">  <i class="fa fa-fw fa-warning"></i>修改密码</h5>',
            'size'   => Modal::SIZE_SMALL,
]);?>
<?php Modal::end();?>
<?php
$this->registerJs(
    "
        $(document).on(\"click\",\".passwd-link\",function() {
            $.get($(this).attr(\"href\"),
                function (data) {
                    $('#passwd-modal .modal-body').html(data);
                    $('#passwd-modal').modal();
                }
            );
        });
    "
);
?>
