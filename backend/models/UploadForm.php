<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $files;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['files'],'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, gif', 'mimeTypes'=>'image/jpeg, image/png, image/gif', 'maxSize'=>1024*1024*10, 'maxFiles'=>2],
            //设置图片的验证规则
        ];
    }

    public function upload(){
        $res = [];
        if ($this->validate()){ //调用验证方法
            $uploadpath = dirname(dirname(__FILE__)).\Yii::$app->params['uploadPath'];  //取得上传路径
            if (!file_exists($uploadpath)) {
                @mkdir($uploadpath, 0777, true);
            }
            foreach($this->files as $key=>$img){
                $ext                    = $img->getExtension();  //获取文件的扩展名
                $randnums               = $this->getrandnums(); //生成一个随机数，为了重命名文件
                $imageName              = date("YmdHis").$randnums.'.'.$ext;  // 重命名文件
                $filepath               = $uploadpath.$imageName;  // 生成文件的绝对路径
                $res[$key]['key']       = $key;
                $res[$key]['state']     = $img->saveAs($filepath);    //上传，并保存结果
                $res[$key]['file_name'] = $imageName;
            }
        }

        return $res; //返回结果
    }

    /**
     * 生成随机数
     * @return string 随机数
     */
    protected function getrandnums()
    {
        $arr = array();
        while (count($arr) < 10) {
            $arr[] = rand(1, 10);
            $arr = array_unique($arr);
        }
        return implode("", $arr);
    }
}

?>


