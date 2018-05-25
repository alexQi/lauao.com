<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\bootstrap\Modal;

use yii\widgets\LinkPager;

$server = $_SERVER;

$this->title                   = \Yii::t('app', '系统信息');
$this->params['breadcrumbs'][] = $this->title;

?>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h6 class="box-title">
                        <i class="glyphicon glyphicon-info-sign"></i>运行环境
                    </h6 class="header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>当前PHP版本</td>
                            <td><?=PHP_VERSION?>/<code>Yii Framework <?=Yii::getVersion();?></code></td>
                        </tr>
                        <tr>
                            <td>操作系统版本</td>
                            <td><?=PHP_OS?></td>
                        </tr>
                        <tr>
                            <td>文件最大上传</td>
                            <td><?=ini_get("upload_max_filesize");?></td>
                        </tr>
                        <tr>
                            <td>工作模式</td>
                            <td><?=$server["SERVER_SOFTWARE"]?>/<?=php_sapi_name();?></td>
                        </tr>
                        <tr>
                            <td>工作路径</td>
                            <td><?=$server["DOCUMENT_ROOT"]?></td>
                        </tr>
                        <tr>
                            <td>程序版本</td>
                            <td><?php
                                exec("git status", $info);
                                exec("du -hs ../", $a);
                                $info[0] = 'v1.0.0';
                                echo $info[0] . '&nbsp;' . '体积:' . str_replace("../", "", $a[0]);
                                ?>

                                <button type="button" class="btn bg-navy btn-flat margin"
                                        onclick="window.location.href='<?=\yii\helpers\Url::to(['/site/default/flush-cache'])?>'">
                                    清除缓存
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

            <?php Pjax::begin(['id' => 'tube-list', 'clientOptions' => ["skipOuterContainers" => true]]); ?>
            <div class="box box-success ">
                <div class="box-header">
                    <h3 class="box-title"><i class="glyphicon glyphicon-fire"></i>MYSQL运行信息</h3>

                    <div class="box-tools">
                        <?php echo LinkPager::widget([
                            'pagination' => $mysqlInfoPage,
                            'options'    => [
                                'class' => 'pagination pagination-sm no-margin pull-right'
                            ]
                        ]); ?>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <?=GridView::widget([
                        'dataProvider' => $mysqlInfo,
                        'layout'       => "{items}{summary}",
                        'summary'      => "<div class='dataTables_info'>当前共有{totalCount}条数据,分为{pageCount}页,当前为第{page}页</div>",
                        'columns'      => [
                            [
                                'attribute' => 'Id',
                                'label'     => 'ID',
                                'format'    => 'raw',
                                'value'     => function ($val) {
                                    return $val['Id'];
                                },
                            ],
                            //                        [
                            //                            'attribute' => 'User',
                            //                            'label'     => '用户',
                            //                        ],
                            [
                                'attribute' => 'Host',
                                'label'     => '地址',
                            ],
                            [
                                'attribute' => 'Command',
                                'label'     => '命令类型',
                            ],
                            [
                                'attribute' => 'Time',
                                'label'     => '用时',
                            ],
                            [
                                'attribute' => 'State',
                                'label'     => '状态',
                            ],
                            [
                                'attribute' => 'Info',
                                'label'     => '命令',
                            ],

                        ],
                    ]);?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <?php Pjax::end(); ?>
            <!-- /.box -->
            <div class="box box-primary box-solid">
                <div class="box-header">
                    <h3 class="box-title"><i class="glyphicon glyphicon-transfer"></i> 队列运行信息</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php Pjax::begin(['id' => 'tube-list', 'clientOptions' => ["skipOuterContainers" => true]]); ?>
                    <?=GridView::widget([
                        'dataProvider' => $dataProvider,
                        'layout'       => "{summary}{pager}{items}",
                        'summary'      => "<div class='dataTables_info'>当前共有{totalCount}条数据,分为{pageCount}页,当前为第{page}页</div>",
                        'columns'      => [
                            [
                                'attribute' => 'name',
                                'label'     => '队列名称',
                                'format'    => 'raw',
                                'value'     => function ($val) {
                                    return Html::a($val->name,
                                        ["/site/beanstalk/channel", "name" => $val->name],
                                        [
                                            'class'       => (int)$val["current-jobs-buried"] > 0 ? 'detail-link btn btn-sm btn-danger' : 'detail-link btn btn-sm btn-success',
                                            'data-pjax'   => "0",
                                            'data-key'    => $val->name,
                                            'data-toggle' => 'modal',
                                            'data-target' => '#activity-modal',
                                        ]);
                                },
                            ],
                            [
                                'attribute' => 'total-jobs',
                                'label'     => '总数',
                            ],
                            [
                                'attribute' => 'current-jobs-ready',
                                'label'     => '准备就绪',
                            ],
                            [
                                'attribute' => 'current-jobs-reserved',
                                'label'     => '接收',
                            ],
                            [
                                'attribute' => 'current-jobs-delayed',
                                'label'     => '延时处理',
                            ],
                            [
                                'attribute' => 'current-jobs-buried',
                                'label'     => '已睡眠',
                            ],

                        ],
                    ]);?>
                    <?php Pjax::end(); ?>
                    <?php Modal::begin([
                        'id'     => 'activity-modal',
                        'header' => '<h4 class="modal-title"><i class="glyphicon glyphicon-transfer"></i> 队列详情</h4>',
                        'footer' => '<a href="#" class="btn bg-olive btn-flat" data-dismiss="modal">关闭</a>',
                        'size'   => Modal::SIZE_LARGE,
                    ]); ?>
                    <?php Modal::end(); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-danger collapsed-box chat">
                <div class="box-header">
                    <h3 class="box-title"><i class="glyphicon glyphicon-tree-conifer"></i>更新日志</h3>
                </div>
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->
                    <?php foreach ($gitLogList as $value): ?>
                        <!-- timeline item -->
                        <?php foreach ($value as $key=>$val): ?>
                            <?php if ($key==0): ?>
                                <li class="time-label">
                          <span class="<?php echo $bgColor[rand(0, 9)]; ?>">
                            <?php echo $val['date']; ?>
                          </span>
                                </li>
                            <?php endif; ?>
                            <li>
                                <i class="fa fa fa-clock-o bg-blue"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $val['time']; ?></span>
                                    <h3 class="timeline-header"><a href="#"><?php echo $val['author']; ?></a></h3>
                                    <div class="timeline-body">
                                        <?php echo '<code>' . $val['hash'] . '</code>：' . $val['desc']; ?>
                                    </div>
                                    <div class="timeline-footer">
                                        <?php echo Html::a('查看详情',
                                            ["/site/default/git-log-detail", "hashCode" => $val['hash']],
                                            [
                                                'class'       => 'btn btn-primary btn-xs git-detail-link',
                                                'data-pjax'   => "0",
                                                'data-key'    => $val['hash'],
                                                'data-toggle' => 'modal',
                                                'data-target' => '#git-detail-modal',
                                            ]); ?>
                                        <a class="btn btn-danger disabled btn-xs">切换至当前版本</a>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php Modal::begin([
    'id'     => 'git-detail-modal',
    'header' => '<h5 class="modal-title"><i class="fa fa-fw fa-git-square"></i> GIT提交日志</h5>',
    'footer' => '<a href="#" class="btn bg-olive btn-flat" data-dismiss="modal">关闭</a>',
    'size'   => Modal::SIZE_LARGE,
]); ?>
<?php Modal::end(); ?>
<?php
$this->registerJs(
    "
        $(document).on(\"click\",\".detail-link\",function() {
            $.get($(this).attr(\"href\"),
                function (data) {
                    $('#activity-modal .modal-body').html(data);
                    $('#activity-modal').modal();
                }
            );
        });
        $(document).on(\"click\",\".git-detail-link\",function() {
            $.get($(this).attr(\"href\"),
                function (data) {
                    $('#git-detail-modal .modal-body').html(data);
                    $('#git-detail-modal').modal();
                }
            );
        });
    "
);
?>