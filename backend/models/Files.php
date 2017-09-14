<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property integer $file_id
 * @property integer $file_type
 * @property integer $product_id
 * @property string $file_name
 * @property integer $create_time
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%files}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_type', 'product_id', 'create_time'], 'integer'],
            [['product_id', 'file_name', 'create_time'], 'required'],
            [['file_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'file_type' => 'File Type',
            'product_id' => 'Product ID',
            'file_name' => 'File Name',
            'create_time' => 'Create Time',
        ];
    }
}
