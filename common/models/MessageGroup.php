<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%message_group}}".
 *
 * @property integer $id
 * @property string $group_name
 * @property string $user_id
 * @property integer $type
 * @property string $members
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class MessageGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_name', 'user_id', 'members'], 'required'],
            [['type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['members'], 'string'],
            [['group_name'], 'string', 'max' => 45],
            [['user_id'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Group Name',
            'user_id' => 'User ID',
            'type' => 'Type',
            'members' => 'Members',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
