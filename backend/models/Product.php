<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $name
 * @property integer $cate_id
 * @property double $price
 * @property string $content
 * @property integer $create_time
 */
class Product extends \yii\db\ActiveRecord
{
    public $files;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cate_id', 'create_time'], 'required'],
            [['cate_id', 'create_time'], 'integer'],
            [['price'], 'number'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['files'],'safe'],
            //设置图片的验证规则
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => \Yii::t('app', 'product id'),
            'name' => \Yii::t('app', 'name'),
            'cate_id' => \Yii::t('app', 'cate id'),
            'price' => \Yii::t('app', 'price'),
            'content' => \Yii::t('app', 'content'),
            'create_time' => \Yii::t('app', 'create time'),
        ];
    }

    public function getCate(){
        return $this->hasOne(Category::className(),['cate_id'=>'cate_id']);
    }

    public function upload(){
        $res = [];
        if ($this->validate()){ //调用验证方法
            $uploadpath = dirname(dirname(__FILE__)).\Yii::$app->params['uploadPath'];  //取得上传路径
            if (!file_exists($uploadpath)) {
                @mkdir($uploadpath, 0777, true);
            }
            foreach($this->files as $img){
                $ext = $img->getExtension();  //获取文件的扩展名
                $randnums = $this->getrandnums(); //生成一个随机数，为了重命名文件
                $imageName = date("YmdHis").$randnums.'.'.$ext;  // 重命名文件
                $filepath = $uploadpath.$imageName;  // 生成文件的绝对路径
                $res[] = $img->saveAs($filepath);    //上传，并保存结果
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
