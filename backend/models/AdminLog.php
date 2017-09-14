<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_log".
 *
 * @property integer $id
 * @property string $route
 * @property string $table_name
 * @property string $operation_type
 * @property string $description
 * @property integer $created_at
 * @property integer $user_id
 */
class AdminLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route', 'table_name', 'operation_type', 'created_at'], 'required'],
            [['description'], 'string'],
            [['created_at', 'user_id'], 'integer'],
            [['route'], 'string', 'max' => 255],
            [['table_name'], 'string', 'max' => 50],
            [['operation_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => 'Route',
            'table_name' => 'Table Name',
            'operation_type' => 'Operation Type',
            'description' => 'Description',
            'created_at' => 'Created At',
            'user_id' => 'User ID',
        ];
    }
}
