<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ActivityBase */
/* @var $form yii\widgets\ActiveForm */

\backend\assets\AdminLtePluginsDatePickerAsset::register($this);
?>

<div class="col-xs-12">

        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => "{label}<div class=\"col-xs-8\">{input}</div><div class=\"col-xs-2\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
            ],
        ]); ?>

    <div class="row margin">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true,['id'=>'col-xs-4']]) ?>
    </div>

    <div class="row margin">
        <div class="form-group activitybase-date">
            <label class="col-sm-2 control-label" for="activitybase-date">活动周期</label>
            <div class="col-xs-5">
                <input type="text" class="form-control" style="width:150px;display:inline;" name="ActivityBase[start_time]" id="start_date" />--
                <input type="text" class="form-control" style="width:150px;display:inline;" name="ActivityBase[end_time]"   id="end_date" />
            </div>
            <div class="col-xs-2">
                <div class="help-block"></div>
            </div>
        </div>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'status',['labelOptions' => ['label' => '状态'],'template'=>'{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->dropDownList(['1'=>'禁用','2'=>'启用']) ?>
    </div>

    <div class="row margin">
    <?= $form->field($model, 'activity_desc')->textarea(['maxlength' => true,'rows'=>5,'style'=>'resize:none']) ?>
    </div>

    <div class="row margin">
    <?= $form->field($model, 'activity_rules')->textarea(['maxlength' => true,'rows'=>5,'style'=>'resize:none']) ?>
    </div>

    <div class="row margin">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success save-data' : 'btn btn-primary save-data']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

//判断是否有日期
$start_datestap = $model->start_time ? $model->start_time : time();
$end_datestap   = $model->end_time ? $model->end_time : time();

$start_date = date('Y-m-d',$start_datestap);
$end_date   = date('Y-m-d',$end_datestap);
?>
<script>
    //Date picker
    $(function(){

        $('#start_date').datepicker({
            language: "zh-CN",
            autoclose: true,
            format: "yyyy-mm-dd",
        });
        $('#end_date').datepicker({
            language: "zh-CN",
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        $('#start_date').datepicker('setDate','<?php echo $start_date?>');
        $('#end_date').datepicker('setDate','<?php echo $end_date?>');
    });
</script>