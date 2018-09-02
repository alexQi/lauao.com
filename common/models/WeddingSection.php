<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%wedding_section}}".
 *
 * @property int $section_id 部门ID
 * @property string $section_name 部门名称
 * @property string $desc 描述
 * @property int $user_id 创建用户
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class WeddingSection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wedding_section}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_name', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['section_name'], 'string', 'max' => 100],
            [['desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'section_id' => '部门ID',
            'section_name' => '部门名称',
            'desc' => '描述',
            'user_id' => '创建用户',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
