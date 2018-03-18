<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_category}}".
 *
 * @property int $id
 * @property int $type
 * @property string $cate_name
 * @property string $created_at
 * @property string $updated_at
 */
class VideoCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['cate_name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['cate_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '类型',
            'cate_name' => '分类名称',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
