<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class'=>'form-horizontal','enctype' => 'multipart/form-data'],
            'enableAjaxValidation'=>false,
//            'options'=>['enctype'=>'multipart/form-data'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1'],
            ]
        ]
    );?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_id')->dropDownList(ArrayHelper::map($category,'cate_id','cate_name'),['prompt' => '请选择商品分类']); ?>

    <?= $form->field($model, 'price',['template'=>"{label}\n<div class=\"col-lg-1\">{input}</div>\n<div class=\"col-lg-1\">{error}</div>"])->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($uploadModel, 'files[]',['template'=>"{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"])->widget(FileInput::classname(), [
        'options' => ['multiple' => true],
        'pluginOptions' => [
            // 需要预览的文件格式
            'previewFileType' => 'image',
            // 是否展示预览图
            'initialPreview' => $p1,
            // 需要展示的图片设置，比如图片的宽度等
            'initialPreviewConfig' => $p2,
            // 是否展示预览图
            'initialPreviewAsData' => true,
            // 异步上传的接口地址设置
            'uploadUrl' => yii\helpers\Url::toRoute(['/product/default/ajax-upload']),
            // 异步上传需要携带的其他参数，比如商品id等
            'uploadExtraData' => [
                'product_id' => $id,
            ],
            'uploadAsync' => true,
            // 最少上传的文件个数限制
            'minFileCount' => 0,
            // 最多上传的文件个数限制
            'maxFileCount' => 10,
            // 是否显示移除按钮，指input上面的移除按钮，非具体图片上的移除按钮
            'showRemove' => true,
            // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
            'showUpload' => true,
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
                var file_input = \"<input type='hidden' id=\"+data.response[0].key+\" name='Product[files][]' value=\"+data.response[0].file_name+\">\";
                $(\"#w0\").append(file_input);
            }",
        ],
    ]);?>
    <div class="form-group">
        <label class="col-lg-1" for="product-content"></label>
        <?= Html::submitButton($model->isNewRecord ? \Yii::t('app', 'create') : \Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
