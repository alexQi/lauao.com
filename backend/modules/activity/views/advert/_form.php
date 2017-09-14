<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\ActivityAdvert */
/* @var $form yii\widgets\ActiveForm */
/* @var $activityList common\models\ActivityBase */
/* @var $p1 */
/* @var $p2 */
/* @var $id */

?>

<div class="activity-advert-form col-xs-12">

    <?php $form = ActiveForm::begin([
            'options' => ['class'=>'form-horizontal','enctype' => 'multipart/form-data'],
            'enableAjaxValidation'=>false,

            'fieldConfig' => [
                'template' => "{label}<div class=\"col-xs-8\">{input}</div><div class=\"col-xs-2\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-2'],
            ]
        ]
    );?>
    <div class="row margin">
        <?= $form->field($model, 'advert_title',['labelOptions' => ['label' => '广告名称'],'template'=>'{label}<div class="col-xs-8">{input}</div><div class="col-xs-2">{error}</div>'])->textInput(['maxlength' => true,['id'=>'col-xs-4']]) ?>
    </div>
    <div class="row margin">
        <?= $form->field($model, 'type',['labelOptions' => ['label' => '素材类型'],'template'=>'{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->dropDownList(['1'=>'图片','2'=>'视频']) ?>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'tempFileUrl',['labelOptions' => ['label' => '上传素材'],'template'=>"{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"])->widget(FileInput::classname(), [
            'options' => ['multiple' => true],
            'pluginOptions' => [
                // 需要预览的文件格式
//                'previewFileType' => 'image',
                // 是否展示预览图
                'initialPreview' => $p1,
                // 需要展示的图片设置，比如图片的宽度等
                'initialPreviewConfig' => $p2,
                //上传格式限制
                'allowedFileExtensions' => ['mp4','jpg','jpeg','png','gif'],//接收的文件后缀
                // 是否展示预览图
                'initialPreviewAsData' => true,
                // 异步上传的接口地址设置
                'uploadUrl' => yii\helpers\Url::toRoute(['/ajax/activity/ajax-upload','bucket'=>'advert']),
                // 异步上传需要携带的其他参数，比如id等
                'uploadExtraData' => [
                    'id' => $id,
                ],
                'uploadAsync' => true,
                // 最少上传的文件个数限制
                'minFileCount' => 0,
                // 最多上传的文件个数限制
                'maxFileCount' => 1,
                // 是否显示移除按钮，指input上面的移除按钮，非具体图片上的移除按钮
                'showRemove' => false,
                // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
                'showUpload' => false,
                //是否显示[选择]按钮,指input上面的[选择]按钮,非具体图片上的上传按钮
                'showBrowse' => true,
                // 展示图片区域是否可点击选择多文件
                'browseOnZoneClick' => true,
                // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
                'fileActionSettings' => [
                    // 设置具体图片的查看属性为false,默认为true
                    'showZoom' => false,
                    // 设置具体图片的上传属性为true,默认为true
                    'showUpload' => true,
                    // 设置具体图片的移除属性为true,默认为true
                    'showRemove' => true,
                ],
            ],
            // 一些事件行为
            'pluginEvents' => [
                // 上传成功后的回调方法，需要的可查看data后再做具体操作，一般不需要设置
                "fileuploaded" => "function (event, data, id, index) {
                if(data.response.state==1){
                    $(\"#activityadvert-file_url\").val(data.response.data.file_url);
                }else{
                    showAlert(data.response.message);
                }
            }",
            ],
        ]);?>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'link_url')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row margin">
    <?= $form->field($model, 'activity_id',['labelOptions' => ['label' => '关联活动'],'template'=>'{label}<div class="col-xs-4">{input}</div><div class="col-xs-2">{error}</div>'])->dropDownList(ArrayHelper::map($activityList,'id','title'),['prompt' => '选择关联活动']); ?>
    </div>

    <div class="row margin">
    <?= $form->field($model, 'target',['labelOptions' => ['label' => '链接打开方式'],'template'=>'{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->radioList(['1'=>'本页面','2'=>'新页面'],['prompt'=>'请选择']) ?>
    </div>
    <div class="row margin">
        <?= $form->field($model, 'status',['labelOptions' => ['label' => '状态'],'template'=>'{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->dropDownList(['1'=>'禁用','2'=>'启用'],['prompt'=>'请选择']) ?>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'position',['labelOptions' => ['label' => '位置'],'template'=>'{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->dropDownList(['1'=>'首页','2'=>'介绍页'],['prompt'=>'请选择']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'file_url')->hiddenInput(['maxlength' => true])->label(false) ?>
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success save-data' : 'btn btn-primary save-data']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>