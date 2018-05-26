<?php

namespace backend\models;

use Yii;
use common\models\UserExtend;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property int $id ID
 * @property string $module 模块
 * @property string $controller 控制器
 * @property string $action 方法
 * @property string $table_name 数据表
 * @property int $primary_key 记录ID
 * @property string $operation_type 操作
 * @property string $raw_data 原始数据
 * @property string $current_data 真实数据
 * @property int $user_id 执行人ID
 * @property int $created_at 时间
 */
class AdminLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%admin_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module', 'controller', 'action', 'table_name', 'primary_key', 'operation_type', 'created_at'], 'required'],
            [['primary_key', 'user_id', 'created_at'], 'integer'],
            [['raw_data','current_data'], 'string'],
            [['module', 'controller', 'action', 'table_name'], 'string', 'max' => 50],
            [['operation_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module' => '模块',
            'controller' => '控制器',
            'action' => '方法',
            'table_name' => '数据表',
            'primary_key' => '主键',
            'operation_type' => '操作',
            'raw_data' => '原始数据',
            'current_data' => '真实数据',
            'user_id' => '执行人ID',
            'created_at' => '时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserExtend() {
        return $this->hasOne(UserExtend::className(), ['user_id' => 'user_id']);
    }
}
