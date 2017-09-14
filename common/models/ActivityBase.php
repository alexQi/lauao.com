<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%activity_base}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $activity_desc
 * @property string $activity_rules
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $status
 * @property integer $is_delete
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity_base}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'activity_desc', 'activity_rules', 'start_time', 'end_time', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['status', 'is_delete', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['activity_desc', 'activity_rules'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'title' => '标题',
            'activity_desc' => '活动简介',
            'activity_rules' => '活动规则',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'status' => '状态 1 未开始 2 已开始 3 已结束',
            'is_delete' => '是否删除 1 未删除 2已删除',
            'user_id' => '操作人',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
