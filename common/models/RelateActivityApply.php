<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%relate_activity_apply}}".
 *
 * @property integer $id
 * @property integer $activity_id
 * @property integer $apply_id
 * @property integer $votes
 * @property integer $created_at
 * @property integer $updated_at
 */
class RelateActivityApply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%relate_activity_apply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'apply_id', 'votes', 'created_at', 'updated_at'], 'required'],
            [['activity_id', 'apply_id', 'votes', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'activity_id' => '活动id',
            'apply_id' => '申请人ID',
            'votes' => '得票数',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
