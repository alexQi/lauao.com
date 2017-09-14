<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%activity_advert}}".
 *
 * @property integer $id
 * @property string $advert_title
 * @property integer $type
 * @property string $file_url
 * @property integer $activity_id
 * @property string $link_url
 * @property integer $target
 * @property integer $user_id
 * @property integer $status
 * @property integer $position
 * @property integer $created_at
 * @property integer $updated_at
 */
class ActivityAdvert extends \yii\db\ActiveRecord
{
    public $tempFileUrl;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity_advert}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['advert_title', 'file_url', 'activity_id','position','status', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['type', 'activity_id', 'target', 'user_id','position', 'status', 'created_at', 'updated_at'], 'integer'],
            [['advert_title'], 'string', 'max' => 100],
            [['file_url', 'link_url','tempFileUrl'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'advert_title' => '标题',
            'type' => '类型 1 图片 2 视频',
            'file_url' => '素材地址',
            'activity_id' => '关联的活动id',
            'link_url' => '链接地址',
            'target' => '打开方式',//1 本页面 2新开窗口
            'user_id' => '操作人',
            'position' => '位置',
            'status' => '状态 1停用 2启用',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
