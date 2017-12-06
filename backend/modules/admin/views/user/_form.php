<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\ActivityAdvert */
/* @var $form yii\widgets\ActiveForm */
/* @var $sectionList */
/* @var $p1 */
/* @var $p2 */
/* @var $id */
\backend\assets\AdminLtePluginsDatePickerAsset::register($this);
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
        <?= $form->field($model, 'username',['labelOptions' => ['label' => '用户名'],'template'=>'{label}<div class="col-xs-3">{input}</div><div class="col-xs-2">{error}</div>'])->textInput(['maxlength' => true,['id'=>'col-xs-4']]) ?>
    </div>
    <div class="row margin">
        <?= $form->field($model, 'password',['labelOptions' => ['label' => '密码'],'template'=>'{label}<div class="col-xs-3">{input}</div><div class="col-xs-2">{error}</div>'])->passwordInput(['maxlength' => true,['id'=>'col-xs-4']]) ?>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'tempFileUrl',['labelOptions' => ['label' => '头像'],'template'=>"{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>"])->widget(FileInput::classname(), [
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
                'uploadUrl' => yii\helpers\Url::toRoute(['/ajax/upload-file/upload','fileClass'=>'Signup','bucket'=>'image']),
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
                    $(\"#signup-avatar\").val(data.response.data.file_url);
                }else{
                    showAlert(data.response.message);
                }
            }",
            ],
        ]);?>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'nickName',['labelOptions' => ['label' => '昵称'],'template'=>'{label}<div class="col-xs-3">{input}</div><div class="col-xs-2">{error}</div>'])->textInput(['maxlength' => true,['id'=>'col-xs-4']]) ?>
    </div>
    <div class="row margin">
        <?= $form->field($model, 'realName',['labelOptions' => ['label' => '姓名'],'template'=>'{label}<div class="col-xs-3">{input}</div><div class="col-xs-2">{error}</div>'])->textInput(['maxlength' => true,['id'=>'col-xs-4']]) ?>
    </div>
    <div class="row margin">
        <?= $form->field($model, 'email',['labelOptions' => ['label' => 'Email'],'template'=>'{label}<div class="col-xs-5">{input}</div><div class="col-xs-2">{error}</div>'])->textInput(['maxlength' => true,['id'=>'col-xs-4']]) ?>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'gender',['labelOptions' => ['label' => '性别'],'template'=>'{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->radioList(['1'=>'男','2'=>'女']) ?>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'section',['labelOptions' => ['label' => '部门'],'template'=>'{label}<div class="col-xs-5">{input}</div><div class="col-xs-2">{error}</div>'])->dropDownList(ArrayHelper::map($sectionList,'id','sectionName'),['prompt' => '- 请选择 -']); ?>
    </div>

    <div class="row margin">
        <div></div>
        <?= $form->field($model, 'birthday',['labelOptions' => ['label' => '生日'],'template'=>'{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row margin">
        <?= $form->field($model, 'status',['labelOptions' => ['label' => '状态'],'template'=>'{label}<div class="col-xs-2">{input}</div><div class="col-xs-2">{error}</div>'])->dropDownList(['1'=>'禁用','10'=>'启用']) ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'avatar')->hiddenInput(['maxlength' => true])->label(false)?>
        <?= Html::submitButton('确定', ['class' => 'btn btn-success save-data']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$birthday = date('Y-m-d',time());
?>
<script>
    //Date picker
    $(function(){

        $('#signup-birthday').datepicker({
            language: "zh-CN",
            autoclose: true,
            format: "yyyy-mm-dd",
        });

        $('#start_date').datepicker('setDate','<?php echo $birthday?>');
    });
</script>