<?php
use common\components\gridop\GridopWidget;
use yii\helpers\Url;
use yii\bootstrap\Html;
/* @var $items */
/* @var $queue */
/* @var $lastBuried common\components\yii2beanstalk\Beanstalk */
/* @var $lastDelayed common\components\yii2beanstalk\Beanstalk */
/* @var $lastReady common\components\yii2beanstalk\Beanstalk */
?>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered table-hover">
            <tr>
                <td>队列</td>
                <td>总数</td>
                <td>准备</td>
                <td>延时</td>
                <td>休眠</td>
                <td>操作</td>
            </tr>
            <tr>
                <td><?=$queue->name?></td>
                <td><?=$queue["total-jobs"]?></td>
                <td><?=$queue["current-jobs-ready"]?></td>
                <td><?=$queue["current-jobs-delayed"]?></td>
                <td><?=$queue["current-jobs-buried"]?></td>
                <td>
                    <?php if($lastBuried||$lastDelayed):?>
                        <?=GridopWidget::widget(['items'=>[
                            'title'=>['label'=>'踢回队列','url'=>'javascript:void(0);','class'=>'btn btn-info btn-sm'],
                            'items'=>$items
                        ]]);?>
                    <?php endif;?>
                    <?=GridopWidget::widget(
                        [
                            'items'=>[
                                'title'=>['label'=>'删除休眠','url'=>'javascript:void(0);','class' => 'btn btn-info btn-sm'],
                                'items'=>[
                                    [
                                        'label'=>'删除一条',
                                        'url'=>'javascript:void(0);',
                                        'options'=>[
                                            'class'=>'del_job',
                                            'data-url' => Url::to(['del-job','name'=>$queue->name])
                                        ]
                                    ],
                                    [
                                        'label'=>'删除所有',
                                        'url'=>'javascript:void(0);',
                                        'options'=>[
                                            'class'=>'del_buried',
                                            'data-url' => Url::to(['del-buried','name'=>$queue->name])
                                        ]
                                    ],
                                ]
                            ]
                        ]
                    );?>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php if($lastBuried):?>
            <div class="form-group">
                <label class="control-label">最近休眠任务, ID : <?=$lastBuried->getId();?></label>
                <div class="well"><?php echo json_encode($lastBuried->getData(),JSON_UNESCAPED_UNICODE); ?></div>
            </div>
        <?php endif;?>
        <?php if($lastDelayed):?>
            <div class="form-group">
                <label>最近延时任务, ID : <?=$lastDelayed->getId();?></label>
                <div class="well"><?php echo json_encode($lastDelayed->getData(),JSON_UNESCAPED_UNICODE); ?></div>
            </div>
        <?php endif;?>
        <?php if($lastReady):?>
            <div class="form-group">
                <label>将要执行任务, ID : <?=$lastReady->getId();?></label>
                <div class="well"><?php echo json_encode($lastReady->getData(),JSON_UNESCAPED_UNICODE); ?></div>
            </div>
        <?php endif;?>
    </div>
</div>

<?php
$this->registerJs(
    "    
        $(document).on(\"click\",\".btn_kick\",function() {
            $.get($(this).attr(\"data-url\"),
                function (data) {
                alert('kicked '+data);
                }
            );
        });
        $(document).on(\"click\",\".del_job\",function() {
            if(window.confirm('确定删除Job？')){
                $.get($(this).attr(\"data-url\"),
                    function (data) {
                    if(data==false){
                        alert('fail');
                        return false;
                    }
                    alert('delete job success');
                    }
                );
            }
        });
        $(document).on(\"click\",\".del_buried\",function() {
            if(window.confirm('确定删除All Buried？')){
                $.get($(this).attr(\"data-url\"),
                    function (data) {
                    
                    }
                );
                $('.close').click();
            }
        });
    "
);
?>
