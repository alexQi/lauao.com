<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_member}}".
 *
 * @property int $id
 * @property string $avatar_url
 * @property string $name
 * @property string $desc
 * @property int $sort
 * @property string $created_at
 */
class VideoMember extends \yii\db\ActiveRecord
{
    public $tempFileUrl;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video_member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['avatar_url', 'name', 'desc', 'created_at'], 'required'],
            [['created_at','sort'], 'safe'],
            [['avatar_url', 'name', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'avatar_url' => '头像',
            'name' => '姓名',
            'desc' => '简介',
            'sort' => '排序',
            'created_at' => '添加时间',
        ];
    }
}
